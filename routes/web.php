<?php

use App\Http\Controllers\AdminUserController;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('admin/contact', function(){
    return view('admin.contact');
});

Route::get('admin/about', function(){
    return view('admin.about');
});

Route::get('/admin/{id}/{name}', function($id, $mark){

    return "this is $id and $mark";

});

//This is adding parameters to your url and your code. If you add parameter and want it to be 
// hidden on your browser, you should write it this way Route::get({name?}) , function($mark=null)





//ASSIGNMENT
//create a controller name postcontroller and create a method inside it to 
//return h1 tag of waooo my controller is working

Route::get('/mark1', [post::class, 'mark1']);

Route::resource('/post', AdminUserController::class);



Route::get('/Users/{id}/{name}/{admin}/{user}', [AdminUserController::class, 'Userid'])->name('name');



//>where(['name' => '[a-z]+']); and name('string') does the same work in addign more parameter to the URL

// CRUD with Eloquent
// 1. create
Route::get('/create', function () {
    // MultiImage::create([
    //     'name' => 'mark',
    //     'type' => 'mark.png',
    // ]);

    // $multimage = new MultiImage;

    // $multimage->name = "adams";
    // $multimage->type = "adams.jpg";
    // $multimage->save();

    MultiImage::insert([
        'name' => 'mark',
        'type' => 'mark.png',
        'created_at' => Carbon::now()
    ]);


    return "successfully";
});

// 2. read all

Route::get('/read_all', function() {
    $images = MultiImage::all();

    foreach ($images as $image) {
        # code...
        echo $image->name . '<br>';
        echo $image->type . '<br>';
    }
});

Route::get('/read_one/{id}', function($id) {
    $images = MultiImage::findOrFail($id);

    return $images->name;

    
});

Route::get('/update', function () {
  
    // $multimage = MultiImage::findOrFail(1);

    // $multimage->name = "lagos";
    // $multimage->type = "lagos.jpg";
    // $multimage->save();
 
    // $multimage->update([
    //     'name' => 'mark',
    //     'type' => 'mark.png',
    // ]);

    MultiImage::where('id', 2)->update([
        'name' => 'tunde',
        'type' => 'tunde.png',
    ]);


    return "successfully";
});




 