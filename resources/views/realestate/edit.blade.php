@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">Ingatlanok listája</h3>
        </div>
        @if(!empty($errors))
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
        <div class="row">
            @if($realEstate)
                <div class="col-12">
                <form method="post" action="{{ URL::to("update-real-estate/".$realEstate->id) }}" >
                    @csrf
                    <div class="form-group">
                        <label>{{__("Név:")}}</label>
                        <input type="text" class="form-control" name="name" value="{{$realEstate->name}}">
                    </div>
                    <div class="form-group">
                        <label>{{__("Ár:")}}</label>
                        <input type="number" class="form-control" name="price" value="{{$realEstate->price}}">
                    </div>
                    <div class="form-group">
                        <label>{{__("Cím:")}}</label>
                        <input type="text" class="form-control" name="address" value="{{$realEstate->address}}">
                    </div>
                    <div class="form-group">
                        <label>{{__("Tipus:")}}</label>
                        <input type="text" class="form-control" name="type" value="{{$realEstate->type}}">
                    </div>
                    <div class="form-group">
                        <label>{{__("Leírás:")}}</label>
                        <textarea class="form-control" name="description">{{$realEstate->description}}</textarea>
                    </div>
                    <button type="submit" value="mentes" class="btn btn-primary">Mentés</button>
                    <a href="{{ URL::to('/')}}" class="btn btn-primary">{{__('Mégse')}}</a>
                </form>
                </div>
            @endif
        </div>
    </div>
@endsection
