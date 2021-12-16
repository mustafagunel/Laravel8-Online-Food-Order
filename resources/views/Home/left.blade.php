<!-- Left Side Start-->


<div class="left-side">

    <div class="container">
        
        @if (!Auth::check())
            @include('Home.LeftSide.loginForm')        
        @else
            <div class="col-sm-12 p-2" style="background-color:#f4eaea;">
                <div class="row">
                    <div class="col-3">
                        <img src="https://profile.yemeksepeti.com/fb/2280/14E969DC83E10C7BCD2D00D108FB6D5C.png" style="width:auto; height:50px">
                    </div>
                    <div class="col offset-1">
                        <div class="row" style="color:#fa0050">
                            {{Auth::user()->name." ".Auth::user()->surname}}
                        </div>
                        <div class="row">
                            2,263 Toplam Puan
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <a href="/logout"><button type="button" class="btn btn-danger">Çıkış Yap</button></a>
            </div>
        @endif      
        <!-- Cart -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="cart-border">
                    <div class="text text-white p-2 " style="font-weight:bold;background-color:#fa0050">                
                        SEPET
                    </div>
                    <div class="col-12" id="error-body" style="display:none;">
                        <div class="alert alert-danger" role="alert">
                            <strong>Hata.</strong> <span id="error-text"> </span>
                        </div>
                    </div>
                    <div class="d-flex p-3 bg-light border align-items-center" id="cart">
                        <p>
                            <i class="d-flex fa fa-shopping-basket fa-3x" style="color:gray; margin-right:10px" aria-hidden="true"></i>
                            <p class="text-start">Sepetiniz henüz boş.</p>
                        </p>
                        <div class="container p-0">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- Cart End -->

    </div>
   
</div>


<!-- Left Side End-->

