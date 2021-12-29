<!DOCTYPE html>
<html>
    <head>
        <title> Şehir Seç </title>
    
        <meta charset="UTF-8">
        <meta name="description" content="Server Side Programming Project">
        <meta name="keywords" content="online food order, order food">
        <meta name="author" content="Mustafa Günel">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link href="{{ asset('assets') }}/css/main.css" rel="stylesheet">        
        

        <link href="{{ asset('assets') }}/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">        
        <link href="{{ asset('assets') }}/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="{{ asset('assets') }}/bootstrap-5.1.3/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <!-- header start -->
        <header>
            <div class="container p-3">
                <div class="row align-items-center justify-content-md-center">
                    <div class="col-sm-3">
                        <a class="navbar-brand " style="font-size:2.25rem; font-family: 'Pacifico', cursive; color:white"  href="#">
                            Yemek Diyarı
                        </a>
                    </div>            
                </div>
            </div>
        </header>
        <!-- header end -->
        <div class="container-fluid" style="background-color:#eae4e4">
            <div class="row text-center">
                <p class="navbar-brand m-0 p-3">
                    Yemek Diyarı'yla yemeğin sadece birkaç tık uzaklıkta! Şehrinizi seçip sipariş verin.
                </p>         
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-16" style="display:contents">
                    @foreach($cities as $city)
                        <div class="col-1 p-2">
                            <div class="col-12 p-3 d-flex justify-content-center"  style=" background-color:#f6a31c">
                                <a href="/restaurant/{{ $city->name }}/" style="text-decoration:none; color:white; font-weight:bold">
                                    <span class="plateNo">{{ $city->id }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>    
       
    </body>

</html> 