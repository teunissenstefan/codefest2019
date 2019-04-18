@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Evenement Afsluiten</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::model($event, array('route' => array('events.finalize', 'event'=>$event)))}}
                        @method('POST')
                        @csrf

                        @php($i=1)
                        @foreach($event->participating_users as $user)
                            <div class="row mb-1">
                                <div class="col-1">
                                    {{$i}}
                                </div>
                                <select class="js-select2 col-11" name="{{$i}}">
                                    <option></option>
                                    @foreach($event->participating_users as $user)
                                        <option value="{{$user->id}}">{{$user->firstname}} {{$user->infix}} {{$user->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php($i++)
                        @endforeach

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            $('.js-select2').select2({
                placeholder: "Selecteer een deelnemer"
            });
        };
    </script>
@endsection
