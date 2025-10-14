<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/hello',function (){
    $webvar="sawsan";
    $val=3;
    $users=[
    ['id' => 1, 'name' => 'user1'],
    ['id' => 2, 'name' => 'user2'],
    ['id' => 3, 'name' => 'user3']
];
    return view('hello')-> with('bladeVar', $webvar)->with('value',$val)->with('users',$users);
});
Route::get('/myBookings/{name}', [BookingController::class, 'myBookings']);