<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>StokKu | Register</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <!-- Sign Up Section -->
                        <div class="bg-white">
                            <div class="content content-full">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                        <!-- Header -->
                                        <div class="text-center">
                                            <p class="mb-2">
                                                <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                            </p>
                                            <h1 class="h4  mb-1">
                                                Registrasi Akun
                                            </h1>
                                        </div>
                                        <!-- END Header -->

                                        <!-- Sign Up Form --> 
                                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        {{-- Alert --}}
                                        @if (Session::has('status'))
                                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                                {{ Session::get('pesan') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        {{-- End Alert --}}

                                        <form class="js-validation-signup" action="/register-proses" method="POST">
                                            @csrf
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-lg form-control-alt" name="username" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-lg form-control-alt" name="email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-lg form-control-alt" name="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center mb-0">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn btn-block btn-success">
                                                        <i class="fa fa-fw fa-plus mr-1"></i> Daftar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Sign Up Form -->

                                        {{-- Link login --}}
                                        <p class="text-center mt-3"><a href="/login">Halaman login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Sign Up Section -->

                        <!-- Footer -->
                        <div class="font-size-sm text-center text-muted py-3">
                            <strong>StokKu</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <script src="assets/js/oneui.core.min.js"></script>
        <script src="assets/js/oneui.app.min.js"></script>
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/js/pages/op_auth_signin.min.js"></script>
    </body>
</html>