@extends('layouts.master')
 @section('title') 
 CHIKATA 
 @endsection 
 @section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Sign Up</h3>
        <form method="post" action="{{route('signup')}}">
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
             {{csrf_field()}}
        </form>
    </div>
    <div class="col-md-6">
        <h3>Sign In</h3>
        <form method="post" action="">
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection 