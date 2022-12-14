<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/laracasts/users/create',function(){
    return Inertia::render('Laracasts/Create');
})->name('laracasts.users.create')->can('create', 'App\Models\User');
Route::post('/laracasts/users',function(){

    $attr=Request::validate([
       'name'=>['string','unique:users'],
       'email'=>['email','unique:users'],
       'password'=>['min:4'],
    ]);
    User::create($attr);
    return redirect('/laracasts/users');
})->name('laracasts.users.create.submit')->can('create', 'App\Models\User');;




Route::get('/laracasts', function () {
    return Inertia::render('Laracasts/Index');
})->name('laracasts');
Route::get('/laracasts/users', function () {
    return Inertia::render('Laracasts/Users', [
        'users'=>User::query()->when(Request::input('search'),function($query,$search){
            $query->where('name','like', "%{$search}%");
        })->paginate(5)->withQueryString()->through(function ($user) {
            return ['name'=>$user->name,
                    'id'=>$user->id,
                'age'=>$user->age,
                'status'=>$user->status,
                'birthdate'=>$user->birthdate
                ];}),'filters'=>Request::only('search')]);
})->name('laracasts.users');

Route::get('/laracasts/time', function () {
    return Inertia::render('Laracasts/Time',[
        'time'=>now()->setTimezone('Europe/Brussels')->toTimeString()
    ]);
})->name('laracasts.time');
Route::get('/laracasts/settings', function () {
    return Inertia::render('Laracasts/Settings');
})->name('laracasts.settings');

Route::post('/laracasts/logout', function () {
    dd(request('comingFromALinkAttribute'));
})->name('laracasts.logout');

/*Below -> Made by Laravel Breeze*/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
