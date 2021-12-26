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
                                <h1 class="h4 text-gray-900 mb-4">Restaurant Talep Et</h1>
                                <small>Talebiniz YemekDiyarı yöneticileri tarafından incelenecektir. Talebiniz kabul edilirse mevcut kullanıcı
                                    hesabınız Restaurant Kullanıcısına dönüşecek ve bundan sonraki restaurant işlemlerinizi bu hesapla
                                    gerçekleştireceksiniz. 
                                </small>
                            </div>
                            
                            <form class="user" action="/application-restaurant" enctype="multipart/form-data" method="POST">
                                @csrf   
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="title" id="title"
                                        placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keywords" id=""
                                        placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="description" id=""
                                        placeholder="Description">
                                </div>

                                <div class="form-group">
                                    <span>Upload Restaurant Logo</span>
                                    <input type="file" class="form-control form-control-user" name="image" id="image"
                                        placeholder="image" >
                                </div>
                                <div class="form-group">
                                        <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        <select class="form-select" name="city" id="city" onchange="changeTown()">
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
                                    <select class="form-select" id="town" name="town">
                                        <option selected>Seç</option>
                                    </select>
                                </div>                                
                                <a>
                                <button class="btn btn-primary btn-user btn-block" type="submit">Restaurant Talep Et</button>
                                </a>

                            </form>



                            
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

</html>




