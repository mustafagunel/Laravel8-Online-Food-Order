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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    @section('right')
                    @show
                </div>

            </div>
        </div>
        
        <div class="content">
            @include('Home.footer')
        </div>

    </body>

    <script>

        $('.form-check-input').click(function(){
            if($('#flexRadioDefault1').is(':checked')) { 
                $('.online-credit-cart').show();
                $('.cash-cart').hide();
            }else{ 
                $('.online-credit-cart').hide();
                $('.cash-cart').show();
            }
        });


        $('.add-to-cart').click(function() {
            var self = $(this);
            var sb = self.parent().siblings();
            
            var quantity = sb.eq(0).children("input");
            sb.eq(2).css({"color": "red", "border": "2px solid red"});
            var productId = quantity.attr( "data-product-id" );

            $.ajax({
                url : '/add/add-to-cart',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "quantity": quantity.val(),
                    "productId": productId
                    },
                type: 'post',
                success: function( result )
                {

                    if(result['error'] != undefined){
                        $( "#error-body" ).show();
                        $("#error-text").text(result['error']   );

                    }else{
                        $("#cart").children("p").remove();
                        $("#cart").children("div").empty();
                        
                        var textH = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "><div class="col-4">Ürün</div><div class="col-4">Adet</div><div class="col-3">Fiyat</div></div></div>';
                        $("#cart").children("div").append(textH); 
                        $.each( result, function( key, value ) {
                            if( result[key] != undefined){
                                $("#cart").children("p").remove();
                            }
                            var text = '<div class="row mb-2" style="padding:5px 0; background-color:#d9aebc26;"><div class="col-12 d-flex"><div class="col-6">'+result[key].name+'</div><div class="col-1">'+result[key].quantity+'</div><div class="col-3 offset-1">'+result[key].price+'</div><div class="col-1"><button class="remove-item" onclick="removeItem('+key+')" style="background-color: #f4eef1; border:0"> <i class="fa fa-times" aria-hidden="true"></i></div> </div></div></div>';                            $("#cart").children("div").append(text); 
                        });
                        var textB = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "></div><a href="/cart"><button class="btn-success"> Satın Al </button></a></div>';
                        $("#cart").children("div").append(textB); 
                        
                    }                    
                },
                error: function()
                {
                    alert('error...');
                }
            });

        });

        function removeItem(id){
            $.ajax({
                url : '/remove/item',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                    },
                type: 'post',
                success: function( result )
                {

                    if(result['error'] != undefined){
                        $( "#error-body" ).show();
                        $("#error-text").text(result['error']   );

                    }else{
                        $("#cart").children("p").remove();
                        $("#cart").children("div").empty();
                        
                        var textH = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "><div class="col-4">Ürün</div><div class="col-4">Adet</div><div class="col-3">Fiyat</div></div></div>';
                        $("#cart").children("div").append(textH); 
                        $.each( result, function( key, value ) {
                            if( result[key] != undefined){
                                $("#cart").children("p").remove();
                            }
                            var text = '<div class="row mb-2" style="padding:5px 0; background-color:#d9aebc26;"><div class="col-12 d-flex"><div class="col-6">'+result[key].name+'</div><div class="col-1">'+result[key].quantity+'</div><div class="col-3 offset-1">'+result[key].price+'</div><div class="col-1"><button class="remove-item" onclick="removeItem('+key+')" style="background-color: #f4eef1; border:0"> <i class="fa fa-times" aria-hidden="true"></i></div> </div></div></div>';                            $("#cart").children("div").append(text); 
                        });
                        var textB = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "></div><a href="/cart"><button class="btn-success"> Satın Al </button></a></div>';
                        $("#cart").children("div").append(textB);
                    }                    
                },
                error: function()
                {
                    alert('error...');
                }
            });
        }




        $( document ).ready(function() {

            $.ajax({
                url : '/get/get-cart',
                data: {
                    "_token": "{{ csrf_token() }}"
                    },
                type: 'post',
                success: function( result )
                {
                    if(!jQuery.isEmptyObject(result)){
                        var textH = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "><div class="col-4">Ürün</div><div class="col-4">Adet</div><div class="col-3">Fiyat</div></div></div>';
                        $("#cart").children("div").append(textH);
                       
                        $.each( result, function( key, value ) {
                            if( result[key] != undefined){
                                $("#cart").children("p").remove();
                            }
                            var text = '<div class="row mb-2" style="padding:5px 0; background-color:#d9aebc26;"><div class="col-12 d-flex"><div class="col-6">'+result[key].name+'</div><div class="col-1">'+result[key].quantity+'</div><div class="col-3 offset-1">'+result[key].price+'</div><div class="col-1"><button class="remove-item" onclick="removeItem('+key+')" style="background-color: #f4eef1; border:0"> <i class="fa fa-times" aria-hidden="true"></i></div> </div></div></div>';
    
                            //var text = '<div class="row mb-2" style="padding:5px 0; background-color:#d9aebc26;"><div class="col-12 d-flex"><div class="col-6">'+result[key].name+'</div><div class="col-1">'+result[key].quantity+'</div><div class="col-3 offset-1">'+result[key].price+'</div><div class="col-1"><a href="/remove/item/'+key+'" ><i class="fa fa-times" aria-hidden="true"></i> </a> </div></div></div>';

                            $("#cart").children("div").append(text); 
                        });
                        var textB = '<div class="row mb-2" style="padding:5px 0; text-align: center; font-weight:bold;background-color:#d9aebc26;"><div class="col-12 d-flex "></div><a href="/cart"><button class="btn-success"> Satın Al </button></a></div>';
                        $("#cart").children("div").append(textB); 
                    }
                },
                error: function()
                {
                    alert('error...');
                }
            });
        });

        
    </script>
    
</html> 