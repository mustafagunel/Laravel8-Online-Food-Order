<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
    
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

    </head>
    <body>
        
        @include('Home.header')
        
        <div class="content mt-4">
            <div class="row offset-sm-1">
                <div class="col-xl-3">
                    @section('left-filter')
                    @show
                    
                    @include('Home.left')
                    
                </div>
                <div class="col-xl-6">
                    @section('content')
                    @show
                </div>
                <div class="col-xl-2">
                    @include('Home.right')
                </div>

            </div>
        </div>
        
        <div class="content">
            @include('Home.footer')
        </div>

    </body>
    
</html> 