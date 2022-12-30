@extends('template.app')

@section('title')
    Actualités
@endsection

@section('content')
    <div class="container mt-2 pt-3">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($blogs as $blog)
                    <div class="article">
                        <div class="article-title">
                            <h3><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <p>Posté le {{ getFormatDate($blog->create_at) }}</p>
                        </div>
                        <div class="article-card mb-5">
                            @if (Storage::url($blog->img_url) !== '')
                                <div class="card-img">
                                    <img src="{{ Storage::url($blog->img_url) }}" class="card-img-top" alt="...">
                                </div>
                            @endif
                            <div class="card-body">
                                <p class="card-text">
                                    {!! $blog->getExcerpt($blog->content, 250) !!}
                                </p>
                                <div class="align-self-center">
                                    <a href="{{ route('blog.show', $blog->id) }}" class="btn">Lire plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                {{ $blogs->links() }}
            </div>
            <div class="col-lg-4">

                <div class="aside p-3 mx-4 animate__animated animate__fadeInTop">
                    <div class="card-body">
                        <h5 class="aside-title">Postes récents</h5>
                        @foreach (getLatestPost(5) as $blog)
                            <div class="d-flex py-2">
                                <img src="{{ Storage::url($blog->img_url) }}" alt="">
                                <div class="ms-3">
                                    <h6 class="fw-bold"><a href="{{ route('blog.show', $blog->id) }}"
                                            class="text-dark" style="opacity: 0.8">{{ $blog->title }}</a></h6>
                                    <p style="opacity: 0.5; font-size:0.7rem;"> {{ getFormatDate($blog->created_at) }}</p>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
