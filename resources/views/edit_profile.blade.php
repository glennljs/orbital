@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Edit Profile</h1>
            <form action="/store_new_profile" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputName">Name: </label>
                    <input type="text" name="inputName" class="form-control" id="inputName" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="inputMatricNo">Name: </label>
                    <input type="text" name="inputMatricNo" class="form-control" id="inputMatricNo" value="{{ $user->matricNo }}">
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username: </label>
                    <input type="text" name="inputUsername" class="form-control" id="inputUsername" value="{{ $user->username }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection