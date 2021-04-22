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
                    <div class='col-12 p-2 col-md-4'>
                        <div class="card" >
                            <img class="card-img-top" src="{{ $realEstate->img_uri }}" alt="{{ $realEstate->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $realEstate->name }}</h5>
                                <p class="card-text">{{ $realEstate->description }}</p>
                                <a href="{{ URL::to('/get-real-estate/'.$realEstate->id) }}" class="btn btn-primary">{{__('Részletek')}}</a>
                                <a href="{{ URL::to('/update-real-estate/'.$realEstate->id) }}" class="btn btn-warning">{{__('Szerkesztés')}}</a>
                            </div>
                        </div>
                    </div>
        @endforeach
        @endif
        </div>
    </div>
@endsection
