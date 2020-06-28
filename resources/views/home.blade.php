@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-between px-3">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#give_frinner">
                        Give Frinner
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#take_frinner">
                        Take Frinner
                    </button>
                </div>
                <div class="pt-1">
                    @if ($numFrinners > 0)
                        Available Frinners: {{ $numFrinners }}
                    @else
                        Currently In Queue: {{ $numQueue }}
                    @endif
                </div>     
            </div>
            @isset($result)
                <div class="alert alert-{{ $result }} mt-3">
                    {{ $message }}
                </div>
            @endisset
            <div class="card mt-3">
                <div class="card-header">Given Frinners</div>
                <div class="card-body">
                    @include('extensions.frinners_table', ['frinners' => $given_frinners, 'get_matric' => false])
                    <div class="d-flex flex-row-reverse">
                        {{ $given_frinners->appends(['taken' => $taken_frinners->currentPage()])->links() }}
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Taken Frinners</div>
                <div class="card-body">
                    @include('extensions.frinners_table', ['frinners' => $taken_frinners, 'get_matric' => true])
                    <div class="d-flex flex-row-reverse">
                        {{ $taken_frinners->appends(['given' => $given_frinners->currentPage()])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('extensions.modal', [
    'modal_ID' => 'give_frinner',
    'title' => "Give Frinner",
    'body' => "Are you sure you want to give frinner?",
    'primary_button' => "Yes",
    'secondary_button' => "No",
    'submit_action' => '/give_frinner'
])

@include('extensions.modal', [
    'modal_ID' => 'take_frinner',
    'title' => 'Take Frinner',
    'body' => 'Are you sure you want to request a Frinner?',
    'primary_button' => 'Yes',
    'secondary_button' => 'No',
    'submit_action' => '/take_frinner'
])

@endsection