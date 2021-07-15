@extends('layouts.app')

@section('content')
    <!-- ======= Add Blog Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Edit user</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('update_user', $user->id) }}">
                                @csrf

                                <div class="form-group row mt-3">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name'): $user->name }}"  autocomplete="name" autofocus>

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
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email'): $user->email }}" autocomplete="email" autofocus>

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
                                            <option value="0" @if($user->is_admin == 0) selected @endif>Normal user</option>
                                            <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
                                        </select>

                                        @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-3 justify-content-end">
                                    <div class="col-3 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Edit User
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
