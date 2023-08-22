@extends('layout.master')
@section('nav')
<li class="nav-item">
    <a class="nav-link active text-light" aria-current="page" href="{{route('admin.home')}}">Home</a>
  </li>
<li class="nav-item">
    <a class="nav-link active text-light" aria-current="page" href="{{route('add.user')}}">Add Blood Group</a>
</li>
<li class="nav-item">
    <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">Exit</a>
</li>
@endsection
@section('body')
<h3 class="text-center p-4">Blood Provider</h3>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Quantity</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($user as  $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td >{{$data->date}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->blood_group}}</td>
                    <td>{{$data->quantity}}</td>
                    <td><a href="{{route('edit.user',['id'=>encrypt($data->id)])}}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{route('delete.user',['id'=>encrypt($data->id)])}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                @endforeach


            </tbody>
          </table>
    </div>
</div>
@endsection
