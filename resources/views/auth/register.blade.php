@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:20px">
            <div class="card">
                <div class="card-header">Employee Registration</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/user/register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">ID Number:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="company_id" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Job Title:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="position" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Company:</label>

                            <div class="col-md-6">
                               <select class="form-control" name="branch_id">
                                    <option value="1">GMCI</option>
                                    <option value="2">Mantrade Development Corp.</option>
                                    <option value="3">Autowelt</option>
                                    <option value="4">Puerto Gateway</option>
                                    <option value="5">MG Gateway South</option>
                                    <option value="6">MG Gateway Mantrade</option>
                               </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Branch:</label>

                            <div class="col-md-6">
                               <select class="form-control" name="branch_id">
                                    <option value="1">Nissan Mantrade</option>
                                    <option value="2">Nissan Otis</option>
                                    <option value="3">Nissan Pasay</option>
                                    <option value="4">Nissan Talisay</option>
                                    <option value="5">Nissan VRama</option>
                                    <option value="6">Nissan Tagum</option>
                                    <option value="7">Nissan Matina</option>
                                    <option value="8">KIA Mandaue</option>
                                    <option value="9">KIA Talisay</option>
                                    <option value="10">Foton Talisay</option>
                                    <option value="11">Autowelt</option>
                                    <option value="12">Autowelt - Motorrad</option>
                               </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Email Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight:normal"> Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-weight:normal">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                <button type="submit" class="btn btn-secondary">
                                    Clear Form
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
