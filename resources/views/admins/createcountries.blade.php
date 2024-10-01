@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            @if(session()->has('create'))
                <div class="alert alert-success">
                    {{session()->get('create')}}
                </div>
                @endif
              <h5 class="card-title mb-5 d-inline">Create Countries</h5>
          <form method="POST" action="{{route('create.countries')}}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                @if($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div> 
                @if($errors->has('image'))
                <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                @endif 

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" />
                 
                </div> 
                @if($errors->has('continent'))
                <p class="alert alert-danger">{{ $errors->first('continent') }}</p>
                @endif 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
                 
                </div>  
                @if($errors->has('population'))
                <p class="alert alert-danger">{{ $errors->first('population') }}</p>
                @endif 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
                 
                </div> 
                @if($errors->has('territory'))
                <p class="alert alert-danger">{{ $errors->first('territory') }}</p>
                @endif 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="avg_price" id="form2Example1" class="form-control" placeholder="avg_price" />
                 
                </div>
                @if($errors->has('avg_price'))
                <p class="alert alert-danger">{{ $errors->first('avg_price') }}</p>
                @endif 
                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                @if($errors->has('description'))
                <p class="alert alert-danger">{{ $errors->first('description') }}</p>
                @endif 
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      @endsection