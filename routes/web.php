<?php
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', function(Request $request) {
    $files = $request->pics;
    
    //$fileName = $file->getClientOriginalName();
    //$file->storeAs('uploads', $fileName);

    foreach ($files as $file) {
        //$file->store('uploads');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName);
    }
    return response(['status'=>'success'], 200);
}); 

;
