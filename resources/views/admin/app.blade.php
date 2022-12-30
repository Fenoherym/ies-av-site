<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IES-AV | Administration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
</head>

<body>


    <div class="ctnair">
        <section class="side-bar animate__animated animate__fadeInLeft">
            <div class="logo">
                <h3>IES-AV</h3>
            </div>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="@if (Route::currentRouteName() == 'admin.dashboard') active @endif"><i
                            class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.etudiants.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.etudiants.index') active @endif"><i class="fa fa-graduation-cap"
                            aria-hidden="true"></i> Etudiants
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.enseignant.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.enseignant.index') active @endif"><i class="fa fa-user"
                            aria-hidden="true"></i> Enseingnants
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.filiere.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.filiere.index') active @endif"><i class="fa fa-flag"
                            aria-hidden="true"></i> Mentions
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.filiere.category.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.filiere.category.index') active @endif"><i class="fa fa-flag"
                            aria-hidden="true"></i> Mention Categorie
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.blogs.index') active @endif"><i class="fa fa-newspaper-o"
                            aria-hidden="true"></i> Actualités
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galery.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.galery.index') active @endif"><i class="fa fa-picture-o"
                            aria-hidden="true"></i> Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.personnel.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.personnel.index') active @endif"><i class="fa fa-users"
                            aria-hidden="true"></i> Personnel Administratif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.admission.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.admission.index') active @endif"><i class="fa fa-tag"
                            aria-hidden="true"></i> Admission
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.concours.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.concours.index') active @endif"><i class="fa fa-pencil"
                            aria-hidden="true"></i> Concours$sélection
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.partenariat.index') }}"
                        class="@if (Route::currentRouteName() == 'admin.partenariat.index') active @endif"> <i class="fa fa-handshake-o"
                            aria-hidden="true"></i>
                        Partenariat
                    </a>
                </li>
            </ul>
        </section>
        <div class="content w-100">
            <div class="container">
                <nav class="navbar navbar-light bg-light">
                    <button class="menu btn text-dark"><i class="fa fa-bars"></i> Menu</button>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('admin.contact.index') }}" class="nav-link"><i
                                    class="fa fa-comments" aria-hidden="true"></i>
                                Messages({{ getMessageCount() }})
                            </a>
                        </li>
                    </ul>
                    <li class="nav-item">
                        @yield('form-search')
                    </li>

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                 document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>

                </nav>

                <div class="animate__animated animate__slideInUp">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var menu = document.querySelector('.menu');
        var sidebar = document.querySelector('.side-bar');

        menu.addEventListener('click', function() {
            if (sidebar.style.display === "block") {
                sidebar.classList.add('animate__backOutLeft');
                sidebar.style.display = "none";
            } else {
                sidebar.style.display = "block";
                sidebar.classList.remove('animate__backOutLeft');
            }
        })
    </script>
    @yield('extra-js')
</body>

</html>
