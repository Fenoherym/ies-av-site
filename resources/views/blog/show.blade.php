@extends('template.app')

@section('title')
    {{ $blog->title }}
@endsection

@section('content')
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-8">
                        <div class="article">
                            <div class="card mb-5">
                                @if ($blog->img_url !== "")
                                    <img src="{{ Storage::url($blog->img_url) }}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h3>{{ $blog->title }}</h3>
                                  <p class="card-text">
                                       {!!  $blog->content !!}
                                  </p>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-lg-4">

                    <div class="aside p-3 mx-4 animate__animated animate__fadeInTop">
                        <div class="card-body">
                            <h5 class="aside-title">Postes récents</h5>
                             @foreach (getLatestPost(5) as $blog)
                               <div class="d-flex py-2">
                                    <img src="{{ Storage::url( $blog->img_url) }}" alt="">
                                    <div class="ms-3">
                                        <h6 class="fw-bold"><a href="{{ route('blog.show', $blog->id) }}" class="text-dark" style="opacity: 0.8">{{ $blog->title }}</a></h6>
                                        <p style="opacity: 0.5; font-size:0.7rem;"> {{ getFormatDate($blog->created_at)}}</p>
                                    </div>

                               </div>
                             @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection


