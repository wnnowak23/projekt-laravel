@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edycja użytkownika: {{ $user->email }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row" style="margin-bottom:16px">
                            <label for="city" class="col-md-4 col-form-label text-md-end">Miasto</label>

                            <div class="col-md-6">
                                <input id="city" type="text" maxlength="255" class="form-control @error('city') is-invalid @enderror" name="address[city]" value="{{ $user?->address?->city }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:16px">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">Kod pocztowy</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" maxlength="6" class="form-control @error('zip_code') is-invalid @enderror" name="address[zip_code]" value="{{ $user?->address?->zip_code }}" required autocomplete="zip_code" autofocus>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:16px">
                            <label for="street" class="col-md-4 col-form-label text-md-end">Ulica</label>

                            <div class="col-md-6">
                                <input id="street" type="text" maxlength="255" class="form-control @error('street') is-invalid @enderror" name="address[street]" value="{{ $user?->address?->street }}" required autocomplete="street" autofocus>

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:16px">
                            <label for="street_no" class="col-md-4 col-form-label text-md-end">Numer ulicy</label>

                            <div class="col-md-6">
                                <input id="street_no" type="text" maxlength="5" class="form-control @error('street_no') is-invalid @enderror" name="address[street_no]" value="{{ $user?->address?->street_no }}" required autocomplete="street_no" autofocus>

                                @error('street_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:16px">
                            <label for="home_no" class="col-md-4 col-form-label text-md-end">Numer domu</label>

                            <div class="col-md-6">
                                <input id="home_no" type="text" maxlength="5" class="form-control @error('home_no') is-invalid @enderror" name="address[home_no]" value="{{ $user?->address?->home_no }}" required autocomplete="home_no" autofocus>

                                @error('home_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6" style="width:100%">
                            <button type="submit" class="btn btn-md btn-block btn-secondary mt-3" id="filter-button" style="margin:auto; text-align:center; display:block;" >
                                {{ __('shop.button.save')}}
                                    
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection




