@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    The only reason for calling an Exit() as the last line of the Main method is if there might be other foreground threads running.
                    They would stay running if execution just fell off the end of Main.<br>
                    Even in this case, it would usually be a better idea either to put in some explicit graceful termination into the other threads 
                    or make them background threads to start with.<br>
                    If you ever want to return a different exit code from Main, the simpler way to achieve that is to declare it to return int.
                    <br>
                    In short, I don't think you need Environment.Exit().
                    <br>
                    <br>
                    still after reading comments like this me and my group think its the best solution againt attacks from all kind of animals that are on earth.
                    <img style="float: right;" src="{{asset('IMG/EnvironmentExitlogo.jpeg')}}" alt="environmentexitlogo" width="200" height="100">
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
