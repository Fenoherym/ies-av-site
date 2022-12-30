<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IES-AV | @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    @yield('extra-css')
</head>

<body>

    <div class="topbar">
        <div class="info-nav">
            <div class="logo-bloc">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
                <h3>Institut d'Enseignement Supérieur Antsirabe Vakinankaratra</h3>
            </div>
            <div class="info">
                <p><i class="fa fa-envelope"></i> info@gmail.com</p>
                <p><i class="fa fa-phone"></i> 034 32 543 65</p>
                <p><i class="fa fa-map-marker"></i> Vaotofotsy</p>
                <a href="{{ route('accueil') }}#contact" class="contact-btn" style="color: inherit">Contact</a>
            </div>
        </div>
        <div class="navigation">
            <div class="logo-bloc">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
                <h3>IES-AV</h3>
            </div>
            <ul class="menu animate__backInLeft">
                <li><a href="/" class="home @if (Route::currentRouteName() == 'accueil') active @endif"><i
                            class="fa fa-home"></i></a></li>
                <li><a href="{{ route('blog') }}"
                        class="@if (Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'blog.search') active @endif">Actualités</a></li>
                <li class="dropdown">
                    <a href="#">Formations <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <ul>
                        @foreach (filiere_dropdown() as $filiere_category)
                            <li>
                                <a href="#">{{ $filiere_category->name }} <i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></a>
                                <ul>
                                    @foreach ($filiere_category->filieres as $filiere)
                                        <li><a
                                                href="{{ route('filiere.show', $filiere->id) }}">{{ $filiere->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('galery') }}"
                        class="@if (Route::currentRouteName() == 'galery') active @endif">Galérie</a></li>
                <li><a href="{{ route('concours') }}"
                        class="@if (Route::currentRouteName() == 'concours') active @endif">Concours&Seléctions</a></li>
                <li><a href="{{ route('admission') }}"
                        class="@if (Route::currentRouteName() == 'admission') active @endif">Admission</a></li>
                {{-- <li><a href="#">Réinscription</a></li> --}}
                <li><a href="{{ route('a-propos') }}" class="@if (Route::currentRouteName() == 'a-propos') active @endif">A
                        propos</a></li>
                <li><a href="/login" class="nav-btn"><i class="fa fa-user"></i></a></li>
                <li class="item-search">
                <li id="search">
                    <form class="d-flex" method="get" action="{{ route('blog.search') }}">
                        <input type="text" placeholder="recherche" name="q">
                        <button class="btn-search" type="submit">Rechercher</button>
                    </form>
                </li>
                <button class="search"><i class="fa fa-search"></i></button>
                </li>



            </ul>
            <i class="fa fa-bars menu"></i>

        </div>
    </div>

    @yield('hero')


    @yield('content')

    <!-- FOOTER -->

    <footer class="footers">
        <div class="footer-wave-box">
            <div class="footer-wave wave-animation"></div>
        </div>
        <div class="container">
            <div class="main">
                <div class="footer">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="single-footer pe-5">
                                <h4>A propos</h4>
                                <p>IESAV 9ème Etablissement de l'Université d'Antananarivo; *sis à vatofotsy près du
                                    BCMM,route vers l'ACMIL. Système LMD; Diplôme delivrée par l'Etat.</p>
                                <div class="footer-social">
                                    <a href="https://www.facebook.com/IES_AV-Page-Officiel-284823698810679"><i
                                            class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="single-footer">
                                <h4>Formations</h4>
                                <ul>
                                    @foreach (getFiliere(0) as $filiere)
                                        <li><a href="{{ route('filiere.show', $filiere->id) }}"><i
                                                    class="fa fa-chevron-right"></i> {{ $filiere->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="single-footer">
                                <ul>
                                    <li><a href=""><i class="fa fa-chevron-right"></i> Science de l'ingénieur</a></li>
                                    <li><a href=""><i class="fa fa-chevron-right"></i> Science de l'environnement</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-chevron-right"></i> Science de Gestion</a></li>
                                    <li><a href=""><i class="fa fa-chevron-right"></i> Sticom</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-footer col-md-3">
                            <h4>Contacts</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-phone"></i> 034 16 412 49</a></li>
                                <li><a href="mailto:iesavscolarite@gmail.com"><i class="fa fa-envelope"></i>
                                        iesavscolarite@gmail.com</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i> Science de Gestion</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i> Sticom</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p><i class="fa fa-copyright" aria-hidden="true"></i> 2022 copyright: Institut d'Enseignement
                        Supérieur Antsirabe Vakinakaratra</p>
                </div>
            </div>
        </div>

    </footer>


    @yield('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
