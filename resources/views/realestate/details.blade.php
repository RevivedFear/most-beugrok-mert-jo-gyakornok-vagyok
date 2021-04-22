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
                <div class="row">
                    <div class="col-md-7">
                        <div class="project-info-box mt-0">
                            <h2>{{$realEstate->name}}</h2>
                            <p><b>Leírás:</b></p> <p class="mb-0">{{ $realEstate->description }}</p>
                        </div><!-- / project-info-box -->

                        <div class="project-info-box">
                            <br>
                            <p><b>Ár: </b>{{$realEstate->price}}</p>
                            <p><b>Cím: </b>{{$realEstate->address}}</p>
                            <p><b>Típus: </b>{{$realEstate->type}}</p>
                        </div><!-- / project-info-box -->


                    </div><!-- / column -->

                    <div class="col-md-5">
                        <img src="{{ $realEstate->img_uri }}" alt="project-image" class="rounded">
                    </div><!-- / column -->
                </div>
        @else
            <h1>Nem található ingatlan</h1>
        @endif
        <a href="{{ URL::to('/')}}" class="btn btn-primary">{{__('Ingatlanok listája')}}</a>
    </div>
@endsection
