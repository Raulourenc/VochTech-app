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
                    <h2>Alterar de Endereço</h2>
                    <form action="{{ Route('home.update', $id)}}" method="POST">
                    <input name="id" type="hidden" value="{{$id}}">
                    @method('PUT')
                @else
                    <h2>Cadastro de Endereço</h2>
                    <form action="{{ Route('home.store')}}" method="POST">
                @endif
                    @csrf
                        <div class="input-group mb-3">
                        <input type="text" value="{{$address->address ?? old('address')}}" name="address" class="form-control" placeholder="Endereço" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        @if($errors->has('address'))
                            {{$errors->first('address')}}
                        @endif
                        
                        <div class="input-group mb-3">
                        <input type="text" value="{{$address->number ?? old('number')}}" name="number" class="form-control" placeholder="número" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        @if($errors->has('number'))
                            {{$errors->first('number')}}
                        @endif

                        <div class="input-group mb-3">
                        <input type="text" value="{{ $address->city ?? old('city')}}" name="city" class="form-control" placeholder="Cidade" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        @if($errors->has('city'))
                            {{$errors->first('city')}}
                        @endif
                    
                        <div class="input-group mb-3">
                            <select class="form-select"  name="state" aria-label="Disabled select example" >
                                <option selected>Estado</option>
                                @foreach($states as $state)
                                <option  value="{{$state->states}}" {{ old('state') == $state->states ? 'selected' : ''}}>{{$state->states}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('state'))
                            {{$errors->first('state')}}
                        @endif
                    
                    <div class="button-sub">
                        <button class="btn btn-secondary" type="submit">Cadastrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
