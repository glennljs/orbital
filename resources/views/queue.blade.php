@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">Queue</h1>
            @if (count($queue) == 0)
                <h5 class="subtitle">Nobody currently in queue for a Frinner.</h5>
            @endif
            <ol>
                @foreach ($queue as $item)
                    <li>
                        {{ $item->user->name }} requested a frinner at 
                        {{ \Carbon\Carbon::parse($item->created_at)
                            ->timezone('Asia/Singapore')
                            ->format('h:m A') 
                        }}
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>

@endsection