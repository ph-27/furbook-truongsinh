<?php

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
    /**
     * Test get query log
     */
    //DB::enableQueryLog();
    //$breed = Furbook\Breed::find(1);
    //dd(DB::getQueryLog());
    //$cat = Furbook\Cat::find(1);
    
    /**
     * Test data relation
     */
    //dd($breed->cats);
    //dd($cat->breed); 
    return redirect('cats');
});
//show list cats
Route::get('/cats', function () {
    $cats = Furbook\Cat::all();
    return view('cats.index')->with('cats',$cats);
})->name('cat.index');

//show list cats belong to breed
Route::get('/cats/breeds/{name}', function ($name) {
    return 'Show list cats belong to breed'. $name;
})->name('cat.breed');

//show detail of cat
Route::get('/cats/{id}', function ($id) {
    return 'Show detail of cat #' .$id;
})->name('cat.show')->where('id', '[0-9]+');

//show form create cat
Route::get('/cats/create', function () {
    return 'Show form create cat';
})->name('cat.create');

//Insert new cat
Route::post('/cats', function () {
    return 'Insert new cat';
})->name('cat.store');

//Show form edit cat
Route::get('/cats/{id}/edit', function ($id) {
    return 'Show form edit cat #'.$id;
})->name('cat.edit');

//Update cat
Route::put('/cats/{id}/update', function ($id) {
    return 'Show form edit cat #'.$id;
})->name('cat.update');

//Delete cat
Route::delete('/cats/{id}', function ($id) {
    return 'Delete cat #'.$id;
})->name('cat.destroy');

