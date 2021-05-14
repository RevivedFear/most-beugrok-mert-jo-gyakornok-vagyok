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
            @foreach ($realEstatesList as $realestate)
            <h2> {{$realestate->name}} </h2>

            @endforeach

        </div>
    </div>
@endsection
