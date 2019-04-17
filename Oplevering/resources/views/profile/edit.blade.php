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
                        <form>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="firstname">Voornaam</label>
                                    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Voornaam">
                                </div>
                                <div class="form-group col-2">
                                    <label for="infix">Tussenvoegsel</label>
                                    <input type="text" class="form-control" id="infix" placeholder="Tussenvoegsel">
                                </div>
                                <div class="form-group col-6">
                                    <label for="lastname">Achternaam</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Achternaam">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="postalcode">Postcode</label>
                                    <input type="text" class="form-control" id="postalcode" aria-describedby="emailHelp" placeholder="Postcode">
                                </div>
                                <div class="form-group col-6">
                                    <label for="number">Huisnummer</label>
                                    <input type="text" class="form-control" id="number" placeholder="Huisnummer">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="residence">Woonplaats</label>
                                    <input type="text" class="form-control" id="residence" aria-describedby="emailHelp" placeholder="Woonplaats">
                                </div>
                                <div class="form-group col-6">
                                    <label for="street">Straat</label>
                                    <input type="text" class="form-control" id="street" placeholder="Straat">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="category">Favoriete categorie</label>
                                    <select class="form-control" id="category">
                                        <option value="">Selecteer een categorie</option>
                                        <option value="2">Stefan</option>
                                        <option value="3">Nino</option>
                                        <option value="4">Levi</option>
                                        <option value="5">Thomas</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">E-mailadres</label>
                                    <input type="email" class="form-control" id="email" placeholder="E-mailadres">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Opslaan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
