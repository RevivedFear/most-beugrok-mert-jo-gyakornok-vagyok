{{--
most-beugrok-mert-jo-gyakornok-vagyok
___________________
Developer: vinczej
Created at: 2021.03.24.
--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">Ingatlanok listája</h3>
        </div>
        <div class="row">
        @if($realEstatesList)
            @foreach($realEstatesList as $realEstate)
                <div class="col-12">
                    Azonosító:{{ $realEstate->id }}<br></br>
                    Cím:{{ $realEstate->address }}<br></br>
                    Ár:{{ $realEstate->price }}<br></br>
                    Jelleg:{{ $realEstate->type }}<br></br>
                    <img src="{{ $realEstate->img_uri }}" alt="{{ $realEstate->name }}">
                    <br></br>
                </div>
            @endforeach
        @endif
        </div>
    </div>
@endsection
