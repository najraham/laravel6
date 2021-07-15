@extends('layouts.app')

@section('content')
    <!-- ======= Add Blog Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Add new blog</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('create_blog') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mt-3">
                                    <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                                    <div class="col-md-8">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title'): '' }}"  autocomplete="title" autofocus>

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                                    <div class="col-md-8">
                                        <textarea id="description" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="title" autofocus>{{ old('description') ? old('description'): '' }}</textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="picture" class="col-md-3 col-form-label text-md-right">Picture</label>

                                    <div class="col-md-8">
                                        <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') ? old('picture'): '' }}"  autocomplete="picture" autofocus>

                                        @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="tags" class="col-md-3 col-form-label text-md-right">Tags</label>

                                    <div class="col-md-8">
                                        <select name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-3 justify-content-end">
                                    <div class="col-3 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>
                                        <a href="{{ route('blogs_index') }}" class="btn btn-danger">
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
