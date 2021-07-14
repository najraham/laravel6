@extends('layouts.app')

@section('content')
    <!-- ======= Add Blog Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Add user</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('create_user') }}">
                                @csrf

                                <div class="form-group row mt-3">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name'): '' }}"  autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>

                                    <div class="col-md-8">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email'): '' }}" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="is_admin" class="col-md-3 col-form-label text-md-right">User Type</label>

                                    <div class="col-md-8">
                                        <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                                            <option value="0" selected>Normal user</option>
                                            <option value="1">Admin</option>
                                        </select>

                                        @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                                    <div class="col-md-8">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') ? old('password'): '' }}" autocomplete="password" autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password_confirmation" class="col-md-3 col-form-label text-md-right">Confirm password</label>

                                    <div class="col-md-8">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password') ? old('password'): '' }}" autocomplete="password" autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-3 justify-content-end">
                                    <div class="col-3 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create User
                                        </button>
                                        <a href="{{ route('users_index') }}" class="btn btn-danger">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
