@extends('template.app')

@section('title')
    Accueil
@endsection

@section('hero')
<div class="hero">
    <div class="hero-content">
        <div class="title">
            <h3>Institut d'Enseignement Supérieur Antsirabe Vakinankaratra</h3>
            <p>Annee universitaire 2021-2022</p>
            <div>
                <a class="apropos" href="#">A-propos</a>
            </div>
        </div>
        <div class="carousel slide actu" data-bs-ride="carousel" style="width:30%;">
            <div class="carousel-inner">
                @php
                    //compteur
                    $i = 0
                @endphp
                @foreach (getLatestPost(5) as $post)

                <div class="carousel-item @if($i==1) active @endif">
                    <div class="card" style="width: 20rem;">
                        <h3><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h3>
                    </div>
                </div>
                @php
                    $i++
                @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section class="about" id="about">
    <div class="container">
        <div class="title">
            <h2>Courte présentation de l'IES-AV</h2>
        </div>
        <div class="about-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Dolore quam earum tempora voluptatem illum odit, ipsa sed,
                            consequatur culpa delectus quibusdam quisquam nam ex eligendi
                            corporis eius voluptatibus vel? Dolorum ut fugiat veniam ab vitae
                            fuga placeat consequuntur vel itaque, libero, exercitationem tenetur!
                            Velit dolor voluptas similique, at aut illo ipsam! Dicta eligendi,
                            architecto repudiandae earum similique assumenda ea adipisci aspernatur
                            delectus magni labore doloremque, totam ab dignissimos tenetur voluptas
                            commodi blanditiis consequatur ratione cupiditate consectetur inventore dolores. <br><br>
                            Impedit magni exercitationem enim a, accusamus, quae temporibus provident sint
                            animi debitis dolor asperiores architecto, ipsam mollitia molestiae tempore
                            tenetur magnam sapiente ex nisi commodi? Maiores tempora eligendi excepturi
                            possimus asperiores libero nisi, deserunt corrupti maxime, doloremque inventore
                            voluptatum id ab illum ducimus sint.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div class="about-img">
                            <img src="{{ asset('images/slide-2.jpg') }}" alt="cover">
                        </div>
                   </div>
                </div>
                <div class="content">
                    <p>
                        Commodi autem animi ad adipisci molestiae molestias
                        magni minus consectetur ipsam hic quos cumque, minima corrupti at soluta odio consequatur
                        aliquid laboriosam, reiciendis accusamus aut nesciunt, laborum eaque. Sint, aperiam nam.
                        Doloremque ab debitis distinctio quasi deserunt, enim eos officiis sapiente, laboriosam
                        corrupti harum sequi dicta, aperiam quaerat numquam voluptatibus sed voluptatum ullam
                        ipsam sint voluptate rerum sunt repellendus. Pariatur hic non eos quae asperiores,
                        veritatis necessitatibus, harum laborum incidunt autem consequatur libero alias
                        praesentium sint omnis quam, quasi placeat facere voluptatem? Sapiente, repellat
                        nemo ipsam soluta ex, a, nam enim rem similique aliquid suscipit. Ipsa repellendus
                        deleniti facilis et quod modi incidunt, non, doloremque unde consectetur sed enim blanditiis
                        error sunt veritatis nisi hic quibusdam accusamus perferendis ab tenetur quasi reprehenderit
                        impedit! Soluta, laboriosam quibusdam. Alias, esse.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="post" id="post" data-aos="fade-right">
    <div class="container">
        <div class="title">
            <h2>Actualités</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus,
                atque vitae perspiciatis quisquam mollitia unde magnam voluptas dicta
                ex accusantium molestias minima consectetur, dolores eum.</p>
        </div>
        <div class="body-card">
            <div class="card-container">
                @foreach (getLatestPost(3) as $post)
                <div class="mycard">
                   <div class="imgBx">
                        <img src="{{ Storage::url($post->img_url) }}" class="card-img-top" alt="" height="300px">
                   </div>
                   <div class="card-content">
                       <h5><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h5>
                       <p>{!! $post-> getExcerpt($post->content, 200) !!}</p>
                       <h5>{{ $post->category->name }}</h5>
                   </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- <section class="nbr_etudiant p-5" style="background: rgb(161, 161, 161)">
    nombre d'etudiants
</section> --}}
<section class="personnel" id="personnel">
    <div class="container">
        <div class="title">
            <h2>Nos Personnels Administratifs</h2>
        </div>

        <div class="content">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @for ($i=0; $i<count($data); $i++)
                    <div class="carousel-item @if($i==0) active @endif" data-bs-interval="10000">
                        <div class="row">
                            @foreach ($data[$i] as $personnel)
                                <div class="col-md-4">
                                    <div class="personnel-card">
                                        <div class="card-content" id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                            <div class="img">
                                                @if ($personnel->photoUrl != null)
                                                <img src="{{ $personnel->photoUrl }}" alt="">
                                                @else
                                                <img src="{{ asset('img/personnel/user.png') }}" alt="">
                                                @endif

                                            </div>
                                            <div class="name-personnel">
                                                <span class="role">{{ $personnel->role }}</span>
                                                <span class="name">{{ $personnel->name }} </span>
                                                <span class="grade">P{{ $personnel->grade }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endfor
                </div>
                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev" style="z-index: 1000">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next" style="z-index: 1000">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button> --}}
              </div>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <div class="container">
        <div class="title">
            <h2>Contactez-nous</h2>
        </div>
        <div class="shadow-sm p-5 mb-5 bg-body roundedc-content mt-3">
            <form method="post" action="{{ route('contact.store') }}" id="send">
                @csrf
                <div class="row px-5">
                  <div class="col-md-6">
                    <input type="text" class="form-control form-control-md" id="name" name="name" placeholder="Votre nom" required="required">
                  </div>
                  <div class="col-md-6">
                    <input type="email" required="required" id="email" class="form-control form-control-md" name="email" placeholder="Votre email">
                  </div>
                </div>
                <div class="mt-3 px-5">
                    <textarea class="form-control" id="message" rows="5" name="message" required="required" placeholder="Votre message"></textarea>
                </div>
                <div class="d-flex  justify-content-center">
                    <button class="btn btn-success mt-3" type="submit">Envoyer votre message</button>
                  </div>
              </form>

        </div>
    </div>
</section>



@endsection

@section('extra-js')
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
           let form = '#send'
           $(form).on('submit', function(event){
               event.preventDefault();
               var url = $(this).attr('action');
               $.ajax({
                    url: url,
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                        $(form).trigger("reset");
                        alert(response.success)
                    },
                    error: function(response) {
                    }
                });
           })
        });
    </script>
@endsection
