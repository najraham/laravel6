@extends('layouts.app')

@section('content')
    <!-- ======= Edit Blog Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Edit blog</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('update_blog', $blog->id) }}">
                                @csrf

                                <div class="form-group row mt-3">
                                    <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                                    <div class="col-md-8">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title'): $blog->title }}"  autocomplete="title" autofocus>

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
                                        <textarea id="description" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="title" autofocus>{{ old('description') ? old('description'): $blog->description }}</textarea>

                                        @error('description')
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
                                                @if($blog->tags->contains('id', $tag->id))
                                                    <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                                @else
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endif
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
                                            Update
                                        </button>
                                        <a href="{{ route('show_blog', $blog->id) }}" class="btn btn-danger">
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
