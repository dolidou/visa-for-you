<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    /* Dans votre fichier styles.css */
    .background-image {
        background-image: url('img/bckgd2.jpg');
        background-size: cover;
        /* Ajuste la taille de l'image pour remplir complètement le conteneur */
        background-position: center;
        /* Centre l'image dans le conteneur */
        background-repeat: no-repeat;
        /* Empêche la répétition de l'image */
    }

    .bg-custom1 {
        background: linear-gradient(135deg, #000000, #5333cd);
        /* background-color: #a73f7d; */

    }

    .bg-custom2 {
        background: linear-gradient(135deg, #832eff, #fe4ff2);
        /* background-color: #a73f7d; */

    }

    .marquee {
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
    }

    .marquee span {
        display: inline-block;
        padding-right: 100%;
        animation: marquee 20s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(-100%, 0);
        }
    }

    .country-name {
        margin-left: 5px;
        /* Ajoutez la quantité d'espace souhaitée */
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-custom1 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <div class="sidebar-brand-text mx-3">H-travel </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - RDV Visa -->
            <li class="nav-item">
                <a class="nav-link" href="/rdv">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>RDV Visa</span></a>
            </li>

            @if (Auth::user())
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Type de Visa -->
                <li class="nav-item">
                    <a class="nav-link" href="/typevisas">
                        <i class="fas fa-fw fa-passport"></i>
                        <span>Type de Visa</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pays">
                        <i class="fas fa-fw fa-globe"></i>
                        <span>Pays</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/listerdv">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Liste RDV</span></a>
                </li>
            @else
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Contact -->
            <li class="nav-item">
                <a class="nav-link" href="/contact">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Contact</span></a>
            </li>

        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="background-image">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow bg-custom1">
                    <marquee behavior="scroll" direction="left" class="text-white">
                        <span>Nous proposons divers RDV de visa normal pour les pays suivants : </span>
                        <span><i class="flag-icon flag-icon-fr"></i> <span class="country-name">France</span></span>
                        <span><i class="flag-icon flag-icon-it"></i> <span class="country-name">Italie</span></span>
                        <span><i class="flag-icon flag-icon-be"></i> <span class="country-name">Belgique</span></span>
                        <span><i class="flag-icon flag-icon-at"></i> <span class="country-name">Autriche</span></span>
                        <span><i class="flag-icon flag-icon-de"></i> <span class="country-name">Allemagne</span></span>
                        <span><i class="flag-icon flag-icon-gr"></i> <span class="country-name">Grèce</span></span>
                        <span><i class="flag-icon flag-icon-mt"></i> <span class="country-name">Malte</span></span>
                        <span><i class="flag-icon flag-icon-ch"></i> <span class="country-name">Suisse</span></span>
                        <span>et RDV électronique pour les pays suivants : </span>
                        <span><i class="flag-icon flag-icon-eg"></i> <span class="country-name">Égypte</span></span>
                        <span><i class="flag-icon flag-icon-tr"></i> <span class="country-name">Turquie</span></span>
                        <span><i class="flag-icon flag-icon-id"></i> <span class="country-name">Indonésie</span></span>
                        <span><i class="flag-icon flag-icon-sg"></i> <span class="country-name">Singapour</span></span>
                        <span><i class="flag-icon flag-icon-ru"></i> <span class="country-name">Russie</span></span>
                        <span><i class="flag-icon flag-icon-cn"></i> <span class="country-name">Chine</span></span>
                        <span><i class="flag-icon flag-icon-qa"></i> <span class="country-name">Qatar</span></span>
                        <span><i class="flag-icon flag-icon-lb"></i> <span class="country-name">Liban</span></span>
                        <span><i class="flag-icon flag-icon-az"></i> <span
                                class="country-name">Azerbaïdjan</span></span>
                        <span><i class="flag-icon flag-icon-tz"></i> <span class="country-name">Tanzanie</span></span>
                        <span><i class="flag-icon flag-icon-uz"></i> <span
                                class="country-name">Ouzbékistan</span></span>
                        <span><i class="flag-icon flag-icon-ke"></i> <span class="country-name">Kenya</span></span>
                        <span><i class="flag-icon flag-icon-et"></i> <span class="country-name">Éthiopie</span></span>
                        <span><i class="flag-icon flag-icon-vn"></i> <span class="country-name">Vietnam</span></span>
                        <span><i class="flag-icon flag-icon-dj"></i> <span class="country-name">Djibouti</span></span>
                        <span><i class="flag-icon flag-icon-lk"></i> <span class="country-name">Sri
                                Lanka</span></span>
                        <span><i class="flag-icon flag-icon-kh"></i> <span class="country-name">Cambodge</span></span>

                    </marquee>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        @if (Auth::user())
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline font-weight-bold text-white-600 small">
                                        {{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                        @endif

                    </ul>

                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">



                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-custom1">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Doli 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @yield('script')
    <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    {{-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>>

</body>

</html>
