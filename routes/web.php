<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Auth route
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showDirectForm'])
    ->name('password.request');

Route::post('/forgot-password/update', [ForgotPasswordController::class, 'updatePasswordDirect'])
    ->name('password.direct.update');

//route profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/menu/{menu}/favorite', [FavoriteController::class, 'toggle'])->name('menu.favorite');
});

// ADMIN AREA
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/account', function () {
    $users = \App\Models\User::all();
    $totalUsers = $users->count();
    return view('admin.account', [
        'user' => auth()->user(),
        'users' => $users,
        'totalUsers' => $totalUsers
    ]);
    })->name('account');

    Route::get('/messages', function() {
        $comments = \App\Models\Comment::with('user')->latest()->get();
        $contacts = \App\Models\Contact::latest()->get(); // pastikan model Contact ada

        return view('admin.messages', compact('comments', 'contacts'));
    })->name('messages');
    Route::delete('/contact/{id}', [\App\Http\Controllers\ContactController::class, 'destroy'])
         ->name('contact.destroy');

    Route::resource('/menus', AdminMenuController::class)->names([
        'index'=>'menus.index',
        'create'=>'menus.create',
        'store'=>'menus.store',
        'edit'=>'menus.edit',
        'update'=>'menus.update',
        'destroy'=>'menus.destroy',
    ]);
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations/{reservation}/status', [AdminReservationController::class, 'updateStatus'])->name('reservations.status');
    Route::resource('/events', AdminEventController::class);
    Route::get('/profile', [AdminSettingController::class, 'profile'])->name('settings.profile');
    Route::put('/profile', [AdminSettingController::class, 'updateProfile'])->name('profile.update');
    Route::get('/password', [AdminSettingController::class, 'password'])->name('settings.password');
    Route::put('/password', [AdminSettingController::class, 'updatePassword'])->name('password.update');

});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{name}', [MenuController::class, 'show'])->name('menu.show')
    ->where('name', '.*');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/testimonials', function () {
    $comments = \App\Models\Comment::latest()->take(12)->get();
    return view('pages.home', compact('comments'));
});


// Reservasi
Route::get('/reservasi', [ReservationController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservasi.store');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments/{id}/like', [CommentController::class, 'like'])
    ->middleware('auth')
    ->name('comments.like');
