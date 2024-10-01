@extends('layouts.admin')

@section('content')



<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Booking status</h5>
              <p>Current Status <b>{{$bookings->status}}</b></p>
          <form method="POST" action="{{route('update.bookings',$bookings->id)}}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
               
                <div class="form-outline mb-4 mt-4">

                  <select name="status" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Status</option>
                   
                    <option value="Processing">Processing</option>
                    <option value="Booked Successfully">Booked Successfully</option>
                   
                    
                   
                  </select>
                </div>
                @if($errors->has('status'))
                <p class="alert alert-danger">{{ $errors->first('status') }}</p>
                @endif
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      @endsection