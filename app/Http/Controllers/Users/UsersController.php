<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
public function bookings(){

    $bookings = Reservation::where('user_id', Auth::user()->id)
    ->orderBy('id','desc') ->get();
    return view('users.bookings',compact('bookings'));
}


}
