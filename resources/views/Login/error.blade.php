<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <meta http-equiv="refresh" content="3;url=/login">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="container" style="background-color:#ac999f0f">
                        <div class="col-12">
                            <i class="fa fa-exclamation fa-5x d-flex justify-content-center p-3" style="color:red; " aria-hidden="true"></i>
                        </div>
                        <div class="col-12 d-flex justify-content-center p-3">
                            @if(isset($error))
                                {{$error}}
                            @else
                                KAYIT İŞLEMİ BAŞARISIZ !
                            @endif
                        </div>
                        <div class="row">
                            <small>Giriş sayfasına yönlendiriliyorsunuz.</small>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets') }}/admin/js/sb-admin-2.min.js"></script>

</body>

</html>