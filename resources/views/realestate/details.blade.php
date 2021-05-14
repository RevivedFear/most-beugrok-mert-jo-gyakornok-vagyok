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
            <a class="navbar-brand" href="/">
                <i class="fas fa-home"></i>
                Ingatlanosdi
            </a>
        </nav>
    </header>
    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex">

                        <div class="card mb-4 shadow-sm flex-fill">
                            <img class="card-img-top " src="{{$realEstateById->img_uri}}" alt="Card image cap" style="width:100%; height: 10rem;">

                            <div class="card-body">
                                <h5 class="card-title">Ingatlan név: {{$realEstateById->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Ingatlan címe: {{$realEstateById->address}}</h6>

                                <p class="card-text">
                                    {{$realEstateById->description}}

                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-bold"><h6>Ingatlan ára: {{ number_format($realEstateById->price, 0, ',', ' ') }} ft </h6></li>
                                <li class="list-group-item text-bold"><h6>Ingatlan Tipusa: {{$realEstateById->Types->name}}</h6></li>
                                <li class="list-group-item text-bold"><h6>Feladva: {{$realEstateById->created_at}}</h6></li>
                            </ul>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button"   class="btn btn-lg btn-outline-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i> módosítás</button>
                                    <a class="btn btn-lg btn-danger" href="/delete-real-estate/{{$realEstateById->id}}" role="button"><i class="far fa-trash-alt"></i> Törlés</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingatlan módosítása</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/update-real-estate">
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
                            <input type="text" class="form-control" id="ingatlannev" name="ingatlannev" value="{{$realEstateById->name}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ingatlan ID</label>
                            <input type="text" class="form-control" id="ingatlanid" name="ingatlanid" value="{{$realEstateById->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ingatlan címe</label>
                            <input type="text" class="form-control" id="ingatlancim" name="ingatlancim" value="{{$realEstateById->address}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Leírás</label>
                            <input type="text" class="form-control" id="ingatlanleiras" name="ingatlanleiras" value="{{$realEstateById->description}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ár</label>
                            <input type="text" class="form-control" id="ingatlanar" name="ingatlanar" value="{{ round($realEstateById->price, 0) }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">kép</label>
                            <input type="text" class="form-control" id="ingatlankep" name="ingatlankep" value="{{$realEstateById->img_uri}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tipus</label><br>

                            <input type="radio"  name="ingatlantip" value="1" @if($realEstateById->type==1) checked @else @endif>
                            <label>Családi ház</label><br>
                            <input type="radio"  name="ingatlantip" value="2" @if($realEstateById->type==2) checked @else @endif>
                            <label>Ingatlan</label><br>
                            <input type="radio" name="ingatlantip" value="3" @if($realEstateById->type==3) checked @else @endif>
                            <label>Garázs</label>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                        <button type="submit" class="btn btn-primary">Ingatlan módosítása</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </p>
    </div>
    </div>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1">Ingatlanosthing</p>
        </div>
    </footer>
@endsection
