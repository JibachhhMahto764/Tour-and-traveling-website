@extends('layouts.admin')

@section('content')



<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            @if(session()->has('update'))
                <div class="alert alert-success">
                    {{session()->get('update')}}
                </div>
                @endif

                @if(session()->has('delete'))
                <div class="alert alert-success">
                    {{session()->get('delete')}}
                </div>
                @endif
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">num_of_guests</th>
                    <th scope="col">check_in_date</th>
                    <th scope="col">destination</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">change status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                    <th scope="row">{{ $booking->id }}</th>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->phone_number }}</td>
                    <td>{{ $booking->num_guests }}</td>
                    <td>{{ $booking->check_in_date}}</td>
                    <td>{{ $booking->destination}}</td>
                    <td>{{ $booking->status}}</td>
                    <td>Rs.{{ $booking->price}}</td>
                   <td><a href = "{{route('edit.bookings',$booking->id)}}" class="btn btn-warning text-white text-center"> change status</a>     </td>
                     <td><a href="{{route('delete.bookings',$booking->id)}}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                    @endforeach
                  
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
  @endsection