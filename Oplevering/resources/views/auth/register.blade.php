@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registreren</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="infix" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                            <div class="col-md-6">
                                <input id="infix" type="text" class="form-control{{ $errors->has('infix') ? ' is-invalid' : '' }}" name="infix" value="{{ old('infix') }}" autocomplete="name">

                                @if ($errors->has('infix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autocomplete="name">

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="name">

                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Woonplaats') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autocomplete="name">

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('Huisnummer') }}</label>

                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}" name="house_number" value="{{ old('house_number') }}" required autocomplete="name">

                                @if ($errors->has('house_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Straat') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required autocomplete="name">

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Geboortedatum') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="name">

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mailadres') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal Wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                {{ Form::radio('role', 'participant', true, array('id'=>'role-0')) }}
                                {{ Form::label('role-0', 'Deelnemer') }}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                {{ Form::radio('role', 'organizer', false, array('id'=>'role-1')) }}
                                {{ Form::label('role-1', 'Organisator') }}
                            </div>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div id="companyGroup" style="@if(!(request()->old('role')=="organizer")) display:none; @endif">
                            <div class="form-group row">
                                <label for="company[name]" class="col-md-4 col-form-label text-md-right">Bedrijfsnaam</label>

                                <div class="col-md-6">
                                    <input id="company[name]" type="text" class="form-control{{ $errors->has('company.name') ? ' is-invalid' : '' }}" name="company[name]" autocomplete="new-password">

                                    @if ($errors->has('company.name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company[email]" class="col-md-4 col-form-label text-md-right">E-mailadres Bedrijf</label>

                                <div class="col-md-6">
                                    <input id="company[email]" type="text" class="form-control{{ $errors->has('company.email') ? ' is-invalid' : '' }}" name="company[email]" autocomplete="new-password">

                                    @if ($errors->has('company.email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company[postal_code]" class="col-md-4 col-form-label text-md-right">Postcode Bedrijf</label>

                                <div class="col-md-6">
                                    <input id="company[postal_code]" type="text" class="form-control{{ $errors->has('company.postal_code') ? ' is-invalid' : '' }}" name="company[postal_code]" autocomplete="new-password">

                                    @if ($errors->has('company.postal_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.postal_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company[house_number]" class="col-md-4 col-form-label text-md-right">Huisnummer Bedrijf</label>

                                <div class="col-md-6">
                                    <input id="company[house_number]" type="text" class="form-control{{ $errors->has('company.house_number') ? ' is-invalid' : '' }}" name="company[house_number]" autocomplete="new-password">

                                    @if ($errors->has('company.house_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.house_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company[city]" class="col-md-4 col-form-label text-md-right">Woonplaats Bedrijf</label>

                                <div class="col-md-6">
                                    <input id="company[city]" type="text" class="form-control{{ $errors->has('company.city') ? ' is-invalid' : '' }}" name="company[city]" autocomplete="new-password">

                                    @if ($errors->has('company.city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company[street]" class="col-md-4 col-form-label text-md-right">Straat Bedrijf</label>

                                <div class="col-md-6">
                                    <input id="company[street]" type="text" class="form-control{{ $errors->has('company.street') ? ' is-invalid' : '' }}" name="company[street]" autocomplete="new-password">

                                    @if ($errors->has('company.street'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company.street') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registreren
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $("#birthdate").flatpickr();
        $('input[type=radio][name=role]').change(function() {
            if (this.value == 'organizer') {
                $("#companyGroup").show();
            }
            else if (this.value == 'participant') {
                $("#companyGroup").hide();
            }
        });
    </script>
@endsection
