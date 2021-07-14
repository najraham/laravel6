@extends('layouts.app')

@section('content')
    <!-- ======= Blogs Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ $blog->title }}</h2>
            </div>

            <div class="row">
                <div class="row justify-content-end">
                    <a href="{{ route('edit_blog', $blog->id) }}" class="btn btn-warning col-md-2 m-3">Edit Blog</a>
                    <form class=" col-md-2 m-3" action="{{ route('delete_blog', $blog->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger form-control">Delete Blog</button>
                    </form>

                </div>
                <div class="pt-4 pt-lg-0 content">
                    Tags:
                    @foreach($blog->tags as $tag)
                        <span class="badge bg-{{$tag->color}} mb-1">{{$tag->name}}</span>
                    @endforeach
                    <p class="fst-italic text-center mt-3">
                        {{ $blog->description }}
                    </p>
                    <div class="row">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
