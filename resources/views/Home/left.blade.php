<!-- Left Side Start-->


<div class="left-side">

    <div class="container">
        
        @if (!Auth::check())
            @include('Home.LeftSide.loginForm')        
        @else
            <a href="/logout">log out</a>
        @endif      
        <!-- Cart -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="cart">
                    <div class="text text-white p-2 " style="font-weight:bold;background-color:#fa0050">                
                        SEPET
                    </div>
                    <div class="text p-2" style="background-color:#efefef">
                        İlçe 
                    </div>
                    <div class="d-flex p-3 bg-light border align-items-center">
                        <i class="fa fa-shopping-basket fa-3x" style="color:gray; margin-right:10px" aria-hidden="true"></i>
                        Sepetiniz henüz boş.
                    </div>

                </div>
            </div>
        </div>
        
        <!-- Cart End -->

    </div>
   
</div>


<!-- Left Side End-->

