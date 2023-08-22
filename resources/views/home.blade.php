@extends('layout.master')
@section('style')
<style>

    .card{
        background-color: white;
        border: 0px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    .date{
        font-family: "Poppins:ital",sans-serif;
        font-weight: 500;
        font-size: 14px


    }
</style>
@endsection
@section('nav')
    @if ($role == 1)
        <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('admin.home') }}">Admin</a>
        </li>
    @endif
@endsection
@section('body')
    <div class="container">
        <div class="row p-3 d-flex  justify-content-center">
            @foreach($users as $user)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 ">
                <div  class="card  mb-3" style="max-width: 18rem; margin-left:auto;margin-right:auto;">
                    <h5 class="card-header">{{$user->name}}</h5>
                    <div class="card-body">
                        <p class="card-title">Blood Group : {{$user->blood_group}}</p>
                        <p class="card-title">Quantity  : {{$user->quantity}} Mi</p>
                        <p class="card-title text-end date">Date  : {{$user->date}}</p>

                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection
