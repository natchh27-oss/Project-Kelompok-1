<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'comment' => 'nullable|min:1|max:1000',
            'media'   => 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('comments', 'public');
        }

        Comment::create([
            'user_id'   => auth()->id(),
            'menu_id'   => $request->menu_id,
            'comment'   => $request->comment,
            'media'     => $mediaPath,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }


    public function destroy(Comment $comment)
    {
        if ($comment->user_id != auth()->id()) abort(403);

        if ($comment->media) {
            Storage::disk('public')->delete($comment->media);
        }

        $comment->delete();
        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}
