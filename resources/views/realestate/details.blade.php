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
            <h3 class="text-center">Ingatlan részletek</h3>
        </div>
        @if($realEstate)
                <div class="col-12">
                    Azonosító:{{ $realEstate->id }}<br></br>
                    Cím:{{ $realEstate->address }}<br></br>
                    Ár:{{ $realEstate->price }}<br></br>
                    Jelleg:{{ $realEstate->type }}<br></br>
                    <img src="{{ $realEstate->img_uri }}" alt="{{ $realEstate->name }}">
                    <br></br>
                </div>
        @else
            <h1>Nem található ingatlan</h1>
        @endif
    </div>
@endsection
