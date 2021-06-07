@extends('userdata::layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5  bg-danger w-50" style="margin-left: 300px;border: solid 10px red">Laravel And Angular Project</h1>
        <div class="row">
            <div class="col-2">
                @if(Session::has('message'))
                    <script>
                        setTimeout(function(){
                            alert("{{ session('message') }}")
                        },1000)
                    </script>
                @endif
            </div>
            <div class="col-10">
                <table id="table" class="mt-5 table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th><a href="{{ route('userform') }}" class="btn btn-lg btn-success w-100">Add</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $us->name }}</td>
                            <td>{{ $us->email }}</td>
                            <td>{{ $us->password }}</td>
                            <td>{{ $us->phone }}</td>
                            <td class="d-flex justify-content-sm-around">
                                <a href="{{route('deleteuser',['id'=>$us->id])}}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('edituser', ['id'=>$us->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
