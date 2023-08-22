@extends('layout.master')
@section('nav')

<li class="nav-item">
    <a class="nav-link active text-light" aria-current="page" href="{{route('admin.home')}}">Home</a>
  </li>
    <li class="nav-item">
        <a class="nav-link active text-light" aria-current="page" href="{{ route('add.user') }}">Add Blood Group</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">Exit</a>
    </li>
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12  d-flex justify-content-center">
                <form method="post" action="{{route('save.edit',['id'=>encrypt($provider->id)])}}" class="form-group m-5 w-50 ">
                    @csrf
                    <h4 class="text-center">Add Donator</h4>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"  class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{$provider->name}}" name="name" id="exampleFormControlInput1"
                            placeholder="Donor Name">
                        @error('name')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Blood Group</label>
                        <select class="form-select form-select-sm" name="blood_group" aria-label="Small select example">
                            <option value="" >Open this select menu</option>
                            <option @if($provider->blood_group == 'A+') selected @endif value="A+">A positive (A+)</option>
                            <option @if($provider->blood_group == 'A-') selected @endif value="A-">A negative (A-)</option>
                            <option @if($provider->blood_group == 'B+') selected @endif value="B+">B positive (B+)</option>
                            <option @if($provider->blood_group == 'B-') selected @endif value="B-">B negative (B-)</option>
                            <option @if($provider->blood_group == 'AB+') selected @endif value="AB+">AB positive (AB+)</option>
                            <option @if($provider->blood_group == 'AB-') selected @endif value="AB-">AB positive (AB-)</option>
                            <option @if($provider->blood_group == 'O+') selected @endif value="O+">O positive (O+)</option>
                            <option @if($provider->blood_group == 'O-') selected @endif value="O-">O positive (O-)</option>
                          </select>
                          @error('blood_group')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"  class="form-label">Date</label>
                        <input type="date" class="form-control" value="{{$provider->date}}" name="date" id="exampleFormControlInput1"
                    >

                    @error('date')
                        <p>{{$message}}</p>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"  class="form-label">Quantity</label>
                        <input type="text" class="form-control" value="{{$provider->quantity}}" placeholder="quantity in ml" name="quantity" id="exampleFormControlInput1" value="">
                        @error('quantity')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">

                        <input type="submit" class="form-control" style="background-color: #009CFF"  id="exampleFormControlInput1"
                    >
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
