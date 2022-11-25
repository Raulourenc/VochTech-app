@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="msg-all">
                    @if(session('msg'))
                    <div class="alert alert-dark" >
                        <p>{{session('msg')}}</p>
                    </div>
                    @endif
                </div>
                <div class="row-form">
                @if(isset($id))
                    <h2>Alterar Pessoa</h2>
                    <form action="{{ Route('home.update', $id)}}" method="POST">
                    <input name="id" type="hidden" value="{{$id}}">
                    @method('PUT')
                @else
                    <h2>Cadastro de Pessoas</h2>
                    <form action="{{ Route('home.store')}}" method="POST">
                @endif
                    @csrf
                        <div class="input-group mb-3">
                        <input type="text" value="{{$people->name ?? old('name')}}" name="name" class="form-control" placeholder="Pessoa" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        @if($errors->has('name'))
                            {{$errors->first('name')}}
                        @endif
                        
                        <div class="input-group mb-3">
                        <input type="text" value="{{$people->age ?? old('age')}}" name="age" class="form-control" placeholder="Idade" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        @if($errors->has('age'))
                            {{$errors->first('age')}}
                        @endif
                       
                    <div class="button-sub">
                        <button class="btn btn-secondary" type="submit">Enviar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
