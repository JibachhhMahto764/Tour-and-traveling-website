<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use Auth;
use Illuminate\Http\Request;
use App\Models\Reservation\Reservation;
use Redirect;
use Session;

class TravelingController extends Controller
{
    public function about($id){
        $cities = City::select()->orderBy('id','desc')->take(5)
        ->where('country_id',$id)->get();

        $country = Country::find($id);

        $citiesCount = City::select()->where('country_id',$id)->count();

        return view('traveling.about',compact('cities','country','citiesCount'));
    }

    public function makeReservations($id){
       
        $city = City::find($id);

        return view('traveling.reservation',compact('city',));
    }
   
    public function storeReservations(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',           // Name is required, should be a string with a max of 255 characters
        'phone_number' => 'required|string|max:15',    // Phone number is required, string, max 15 characters
        'num_guests' => 'required|integer|min:1',      // num_guests is required, should be an integer, and at least 1
        'check_in_date' => 'required|date|after:today',// Check-in date is required, must be a valid date, and should be after today
        'destination' => 'required|string|max:255',    // Destination is required, should be a string with a max of 255 characters
    ]);

    $city = City::find($id);

    if ($request->check_in_date > date("Y-m-d")) {

        $totalPrice = (int)$city->price * (int)$request->num_guests;

        $storeReservations = Reservation::create([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "num_guests" => $request->num_guests,
            "check_in_date" => $request->check_in_date,
            "destination" => $request->destination,
            "price" => $totalPrice,
            "user_id" => $request->user_id,
        ]);

        if ($storeReservations) {
          Session::put('price', $city->price * $request->num_guests);  // Store value in session
            $newPrice = Session::get('price');  // Retrieve value from session

            // Display success message
            return Redirect::route('traveling.pay');
        }

    } else {
        echo "invalid date, you need to choose a date in the future.";
    }
}

public function payWithPaypal(){
       
    

    return view('traveling.pay');
}

public function success(){
       
    Session::forget('price');
    return view('traveling.success');

   
}

public function deals(){
       
    
    $cities = City::select()->orderBy('id','desc')->take(4)->get();
    $countries = Country::all();
    return view('traveling.deals',compact('cities','countries'));


}

public function searchDeals(Request $request){
       
    $country_id = $request->get('country_id');
    $price = $request->get('price');


    $searches = City::where('country_id',$country_id)->where('price','<=' ,$price)->orderBy('id','desc')->take(4)->get();
    $countries = Country::all();
    return view('traveling.searchdeals',compact('searches','countries'));


}


}