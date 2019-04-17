@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categorie toevoegen<a class="btn btn-sm btn-success float-right"
                                                                     href="{{url()->previous()}}">Terug</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::model(null, array('route' => array('categories.insert')))}}
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('category', 'Categorie*:') }}
                                {{ Form::text('category', null, array('class' => 'form-control '.($errors->has('category') ? ' is-invalid' : ''),'required','autofocus')) }}
                                @if ($errors->has('category'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('slug', 'Bijnaam*:') }}
                                {{ Form::text('slug', null, array('class' => 'form-control '.($errors->has('slug') ? ' is-invalid' : ''))) }}
                                @if ($errors->has('slug'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
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
        $("#birthdate").flatpickr();
    </script>
@endsection
