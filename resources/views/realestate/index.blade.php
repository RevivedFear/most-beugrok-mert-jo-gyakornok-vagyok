{{--
most-beugrok-mert-jo-gyakornok-vagyok
___________________
Developer: vinczej
Created at: 2021.03.24.
--}}
@extends('layouts.app')
@section('content')
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fas fa-home"></i>
                Ingatlanosthing
            </a>
        </nav>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Ingatlanok listája</h1>
                    <p class="lead text-muted">A jelenleg elérhető ingatlanok itt megtekinthetőek.</p>
                    <p>
                        <a href="#" class="btn btn-primary my-2"> ingatlan regisztrálása</a>

                    </p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($realEstatesList as $realestate)
                        <div class="col-md-4 d-flex">

                            <div class="card mb-4 shadow-sm flex-fill">
                                <img class="card-img-top " src="{{$realestate->img_uri}}" alt="Card image cap" style="width:100%; height: 10rem;">

                                <div class="card-body">
                                    <h5 class="card-title"> {{$realestate->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted"> {{$realestate->address}}</h6>

                                    <p class="card-text">
                                        {{$realestate->description}}

                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-bold"><h6>Ár: {{$realestate->price}} </h6></li>
                                </ul>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondaryr" href="/get-real-estate/{{$realestate->id}}" role="button"> Bővebben</a>
                                        <a class="btn btn-sm btn-danger" href="/delete-real-estate/{{$realestate->id}}" role="button">Törlés</a>
                                    </div>
                                    <small class="text-muted"> {{$realestate->created_at}}</small>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1">@ingatlanosthing</p>
        </div>
    </footer>
@endsection


