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

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="/register" method="POST"
                            oninput='rpassword.setCustomValidity(rpassword.value != password.value ? "Passwords do not match." : "")'
                            >
                                <div class="form-group row">
                                @csrf   
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="surname"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email Address" required>
                                </div>

                                <div class="form-group">
                                        <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        <select class="form-select" name="city" id="city" onchange="changeTown()" require>
                                                <option selected>Seç</option>
                                                @php
                                                    foreach($cities as $city){
                                                        print_r('<option value="'.$city->id.'">'.$city->name.'</option>');
                                                    }
                                                @endphp
                                            
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Town</label>
                                    <select class="form-select" id="town" name="town" require>
                                        <option selected>Seç</option>
                                    </select>
                                </div>      

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Address" name="address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="rpassword" placeholder="Repeat Password"  required>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit"> Kayıt ol</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('login') }}">Already have an account? Login!</a>
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



    <script>
        function changeTown() {
                
                $("#town").empty();
                var city = document.getElementById("city").value;
                var sel = document.getElementById('town');

                $.ajax({
                    url : '/get/town',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "city": city
                        },
                    type: 'post',
                    success: function( result )
                    {
                        result.forEach(town => {
                            var opt = document.createElement('option');
                            opt.value = town.id;
                            opt.innerHTML = town.name;
                            sel.appendChild(opt);
                        });

                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            }
       

        
    </script>

</body>

</html>