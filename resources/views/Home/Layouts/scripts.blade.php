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