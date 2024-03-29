@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profiel pagina</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            {{Form::model($user, array('route' => array('profile.update', $user->id)))}}
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    {{ Form::label('firstname', 'Voornaam*:') }}
                                    {{ Form::text('firstname', null, array('class' => 'form-control '.($errors->has('firstname') ? ' is-invalid' : ''),'required','autofocus')) }}
                                    @if ($errors->has('firstname'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </small>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    {{ Form::label('infix', 'Tussenvoegsel:') }}
                                    {{ Form::text('infix', null, array('class' => 'form-control '.($errors->has('infix') ? ' is-invalid' : ''))) }}
                                    @if ($errors->has('infix'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('infix') }}</strong>
                                        </small>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    {{ Form::label('lastname', 'Achternaam*:') }}
                                    {{ Form::text('lastname', null, array('class' => 'form-control '.($errors->has('lastname') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('lastname'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    {{ Form::label('birthdate', 'Geboortedatum*:') }}
                                    {{ Form::text('birthdate', null, array('class' => 'form-control '.($errors->has('birthdate') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('birthdate'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </small>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    {{ Form::label('postal_code', 'Postcode*:') }}
                                    {{ Form::text('postal_code', null, array('class' => 'form-control '.($errors->has('postal_code') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('postal_code'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('house_number', 'Huisnummer*:') }}
                                    {{ Form::text('house_number', null, array('class' => 'form-control '.($errors->has('house_number') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('house_number'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('house_number') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::label('city', 'Woonplaats*:') }}
                                    {{ Form::text('city', null, array('class' => 'form-control '.($errors->has('city') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('city'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('street', 'Straat*:') }}
                                    {{ Form::text('street', null, array('class' => 'form-control '.($errors->has('street') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('street'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    {{ Form::label('category', 'Favoriete Categorie*:') }}
                                    {!! Form::select('category', $categories, $favorite_category?$favorite_category->id:0, ['class' => 'form-control','required']) !!}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('email', 'E-mailadres*:') }}
                                    {{ Form::text('email', null, array('class' => 'form-control '.($errors->has('email') ? ' is-invalid' : ''),'required')) }}
                                    @if ($errors->has('email'))
                                        <small class="text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Opslaan</button>
                            {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#birthdate").flatpickr();
    </script>
@endsection
