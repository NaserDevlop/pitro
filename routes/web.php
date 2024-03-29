<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\EventsControllers;

use App\Http\Controllers\Admin\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('maincover');
});
Route::get('/home', [App\Http\Controllers\EventsControllers::class, 'home'])->name('home');


    // Route::group(['middleware' => 'auth'], function () {
    //     Route::get('/admin', function () {
    //         return view('admin');
    //     })->name('admin');

    // });

/*
 Route::get('editable', function () {
   return view('editable');
 })->name('editable');
*/
//_--_-_-_--_-_-_-_-_-_-_-_-_--_
// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

//     Route::group(['middleware' => 'auth'], function () {
//         Route::get('/admin', function () {
//             return view('admin');
//         })->name('admin');

//     });
// });

//_-_-_--_-_-_-_--_-_-_-_-_--_--

// Route::get('admins', function () {
//     return view('admin/maincover');
// });


//   Route::group(['middleware' => 'auth'], function () {


// Route::get('admin/change/{month}', [App\Http\Controllers\EventsController::class, 'changemonth'])->name('change');


Route::get('month', [App\Http\Controllers\EventsController::class, 'MonthEvents'])->name('MonthEvents');
// Route::get('admin/show', [App\Http\Controllers\ShowController::class, 'show']);
// Route::get('admin/edite-personal/{email}', [App\Http\Controllers\ShowController::class, 'edite']);

// Route::get('admin/addevents', [App\Http\Controllers\EventsController::class, 'index']);
// Route::post('admin/createnew', [App\Http\Controllers\EventsController::class, 'createnew'])->name('create');

// Route::get('admin/showevents', [App\Http\Controllers\EventsController::class, 'showevents']);
// Route::get('admin/update-events/{serial}', [App\Http\Controllers\EventsController::class, 'update_form']);
// Route::post('admin/update-event/{serial}', [App\Http\Controllers\EventsController::class, 'update_event'])->name('create_update');
// Route::get('admin/delete-event/{serial}', [App\Http\Controllers\EventsController::class, 'delete_event'])->name('delete-event');
//  });
Auth::routes();




//-----------------------------------------------------------------




//--------------------------------------------------------------
