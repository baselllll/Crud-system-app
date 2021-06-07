@extends('userdata::layouts.master')

@section('content')

<div class="container">
    <h1>Add New User</h1>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form action="{{ route('adduser')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="Phone" placeholder="Phone">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-lg-2"></div>

    </div>
</div>
@endsection