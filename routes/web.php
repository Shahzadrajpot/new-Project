<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Models\Product;
use Illuminate\Auth\Events\Login;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', function () {
    return view('home');
})->middleware(Authenticate::class);
 Route::get('/dashboard', [ProductController::class, 'dashboard']);



// admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/clients', [ProductController::class, 'clients']);

});

Route::middleware(['auth', 'role:user'])->group(function () {           // Middleware for user role

    Route::get('/talents', [ProductController::class, 'index'])->name('talents.index');
    Route::get('/feed', [ProductController::class, 'feed']);
    Route::get('/tasks', [ProductController::class, 'tasks']);
    Route::get('/skill', [ProductController::class, 'skill']);
    Route::get('/languages', [ProductController::class, 'languages']);
    Route::get('/cities', [ProductController::class, 'cities']);
    Route::get('/contact-us', [ProductController::class, 'contact_us']);
    Route::get('/test', [ProductController::class, 'test']);


    //1.1 post

});



//  login Logout route
Route::get('/register', [ProductController::class, 'register']); //1.1 get
Route::get('/login', [ProductController::class, 'login'])->name('login');
Route::post('/logout', [ProductController::class, 'logout'])->name('logout');
Route::post('/loginUser', [ProductController::class, 'loginUser']);
Route::post('/registerUser', [ProductController::class, 'registerUser']);

//  routes for deleting function
Route::delete('/clients/{id}', [ProductController::class, 'destroy'])->name('client.destroy');
// delete talent route
Route::delete('/talents/{id}', [ProductController::class, 'destroy_talent'])->name('talent.destroy');
Route::delete('/feeds/{id}', [ProductController::class, 'destroy_feed'])->name('feed.destroy');
Route::delete('/tasks/{id}', [ProductController::class, 'destroy_task'])->name('task.destroy');
Route::delete('/skills/{id}', [ProductController::class, 'destroy_skill'])->name('skill.destroy');
Route::delete('/languages/{id}', [ProductController::class, 'destroy_language'])->name('language.destroy');
Route::delete('/cities/{id}', [ProductController::class, 'destroy_city'])->name('city.destroy');
Route::delete('/contacts/{id}', [ProductController::class, 'destroy_contact'])->name('contact.destroy');

// routes for getting single data for view
Route::get('/tasks/{task}', [ProductController::class, 'show_task'])->name('task.view');
Route::get('/clients/{client}', [ProductController::class, 'show_client'])->name('client.view');
Route::get('/talents/{talent}', [ProductController::class, 'show_talent'])->name('talent.view');
Route::get('/feeds/{feed}', [ProductController::class, 'show_feed'])->name('feed.view');
Route::get('/skills/{skill}', [ProductController::class, 'show_skill'])->name('skill.view');
Route::get('/languages/{language}', [ProductController::class, 'show_language'])->name('language.view');
Route::get('/cities/{city}', [ProductController::class, 'show_city'])->name('city.view');
Route::get('/contacts/{contact}', [ProductController::class, 'show_contact'])->name('contact.view');

// for creating data
Route::get('/create_talent', [ProductController::class, 'create_talent'])->name('talent.create');

// for adding new data
Route::post('/talent', [ProductController::class, 'store_talent'])->name('talent.store');

// for adding new Clients
Route::get('/new_clients', [ProductController::class, 'create_client'])->name('client.create');
Route::post('/clients', [ProductController::class, 'store_client'])->name('client.store');
