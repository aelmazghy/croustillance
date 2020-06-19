<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css"/>

    <!-- Add Vue and BootstrapVue scripts just before the closing </body> tag -->
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin/css/demonew.css"/>
    <link rel="stylesheet" href="/assets/admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css"/>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="/assets/admin/js/table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://unpkg.com/vuelidate@0.7.5/dist/vuelidate.min.js"></script>
    <script src="https://unpkg.com/vuelidate@0.7.5/dist/validators.min.js"></script>


    <title>Croustillance - Liste actualités</title>
</head>
<body>
<div class="all">

    @auth()
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/" class="logo">
                <span><img src=" {{ asset('assets/img/logo-croustillance.svg') }} "></span>
                <div class="icon-logo"><img src="#"></div>
            </a>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <!-- <button class="button-menu-mobile open-left">
                             <i class="fas fa-bars"></i>
                         </button> -->
                    </li>

                </ul>
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ asset('assets/img/person.png') }}" alt="user-image" class="rounded-circle">
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" style="">
                            <!-- item-->
                            @auth
                                <a href="/logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout mr-1"></i>
                                    <span>Déconnexion</span>
                                </a>
                            @endauth
                        </div>
                    </li>

                </ul>
            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <div class="left side-menu">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;"><div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 339px;">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                <i class="fas fa-home"></i>
                                <span> Accueil </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news.index') }}" class="waves-effect"><i class="fas fa-newspaper"></i>
                                <span> Actualités </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="waves-effect"><i class="fas fa-user-friends"></i>
                                <span> Utilisateurs </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.index') }}" class="waves-effect"><i class="fas fa-cog"></i>
                                <span> Parametres </span>
                            </a>
                        </li>

                        <!--end li-->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 869px; visibility: visible;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
    </div>
    @endauth
    <div class="content-page"
         @auth
         style="margin-left: 250px;"
         @endauth
    >
        <div class="content">
            <div class="dash-home-page">


                <!--start content-->
            @yield('content')
                <!--end content-->


            </div><!--container dash-home-page-->

        </div>

    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://kit.fontawesome.com/ac1c042d64.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
