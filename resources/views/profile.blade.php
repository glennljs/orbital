@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">Profile</h1>
            <div class="row">
                <div class="col-4">
                    Name:
                </div>
                <div class="col-8">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    Matric Card Number:
                </div>
                <div class="col-8">
                    {{ $user->matricNo }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    Username:
                </div>
                <div class="col-8">
                    {{ $user->username }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    Number of Given Frinners:
                </div>
                <div class="col-8">
                    {{ $given_frinners }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    Number of Taken Frinners:
                </div>
                <div class="col-8">
                    {{ $taken_frinners }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection