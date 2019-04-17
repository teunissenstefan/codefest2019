@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categorie Toevoegen <a class="btn btn-sm btn-success float-right"
                                                                      href="{{url()->previous()}}">Terug</a></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            {{Form::model($category, array('route' => array('categories.update', $category->id)))}}
                            @method('PATCH')
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::label('category', 'Categorie*:') }}
                                        {{ Form::text('category', null, array('class' => 'form-control '.($errors->has('category') ? ' is-invalid' : ''))) }}
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
