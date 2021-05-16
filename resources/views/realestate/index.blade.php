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
                        <a href="#" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModal"><i class="far fa-plus-square"></i> ingatlan regisztrálása</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Új ingatlan regisztrálása</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="/create-real-estate">
                                        @csrf
                                        <div class="form-group">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <label for="formGroupExampleInput">Ingatlan neve</label>
                                            <input type="text" class="form-control" id="ingatlannev" name="ingatlannev" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Ingatlan címe</label>
                                            <input type="text" class="form-control" id="ingatlancim" name="ingatlancim" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Leírás</label>
                                            <input type="text" class="form-control" id="ingatlanleiras" name="ingatlanleiras" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Ár</label>
                                            <input type="text" class="form-control" id="ingatlanar" name="ingatlanar" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">kép</label>
                                            <input type="text" class="form-control" id="ingatlankep" name="ingatlankep" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Típus</label><br>
                                            <input type="radio"  name="ingatlantip" value="1" >
                                            <label>Családi ház</label><br>
                                            <input type="radio"  name="ingatlantip" value="2" >
                                            <label>Ingatlan</label><br>
                                            <input type="radio" name="ingatlantip" value="3" >
                                            <label>Garázs</label>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                                        <button type="submit" class="btn btn-primary">Ingatlan felvétele</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> {{$realestate->address}}</h6>

                                    <p class="card-text">
                                        {{$realestate->description}}

                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-bold"><h6> <i class="fas fa-coins"></i> {{ number_format($realestate->price, 0, ',', ' ') }} ft</h6></li>
                                </ul>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondaryr" href="/get-real-estate/{{$realestate->id}}" role="button"> <i class="far fa-eye"></i> Bővebben</a>
                                        <a class="btn btn-sm btn-danger" href="/delete-real-estate/{{$realestate->id}}" role="button"><i class="far fa-trash-alt"></i> Törlés</a>
                                    </div>
                                    <small class="text-muted"> <i class="far fa-clock"></i> {{$realestate->created_at}}</small>


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


