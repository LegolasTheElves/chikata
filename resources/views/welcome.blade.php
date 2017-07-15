@extends('layouts.master')
 @section('title') 
 CHIKATA 
 @endsection 
 @section('content')
 @include('include.message-block')
<div class="row">
    <div class="col-md-6">
        <h3>Sign Up</h3>
        <form method="post" action="{{route('signup')}}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-mail Address</label>
                <input type="text" name="email" id="email" class="form-control" value="{!! old('email') !!}">
            </div>
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{Request::old('first_name')}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
             {{csrf_field()}}
        </form>
    </div>
    <div class="col-md-6">
        <h3>Sign In</h3>
        <form method="post" action="{{route('signin')}}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-mail Address</label>
                <input type="text" name="email" id="email" class="form-control" value="{!! old('email') !!}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
             {{csrf_field()}}
        </form>
    </div>
</div>
@endsection 