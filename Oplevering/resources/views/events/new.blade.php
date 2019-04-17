@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event Toevoegen <a class="btn btn-sm btn-success float-right"
                                                                     href="{{url()->previous()}}">Terug</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::model(null, array('route' => array('event.add')))}}
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('name', 'Naam:') }}
                                {{ Form::text('name', null, array('class' => 'form-control '.($errors->has('name') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('name'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('description', 'Beschrijving:') }}
                                {{ Form::text('description', null, array('class' => 'form-control '.($errors->has('description') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('description'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{ Form::label('category', 'Favoriete Categorie*:') }}
                                {!! Form::select('category', $categories, null, ['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('date', 'Datum*:') }}
                                {{ Form::text('date', null, array('class' => 'form-control '.($errors->has('date') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('date'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('postal_number', 'Postcode:') }}
                                {{ Form::text('postal_number', null, array('class' => 'form-control '.($errors->has('postal_number') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('postal_number'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('postal_number') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('street', 'Straat:') }}
                                {{ Form::text('street', null, array('class' => 'form-control '.($errors->has('street') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('street'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('house_number', 'Huisnummer:') }}
                                {{ Form::number('house_number', null, array('class' => 'form-control '.($errors->has('house_number') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('house_number'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('max_signed_up', 'Maximaal aantal deelnemers:') }}
                                {{ Form::number('max_signed_up', null, array('class' => 'form-control '.($errors->has('max_signed_up') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('max_signed_up'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('max_signed_up') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary">Voeg Toe</button>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#date").flatpickr();
    </script>
@endsection
