<!-- header start -->
<header>
    <div class="container p-3">
        <div class="row align-items-center justify-content-md-center">
            <div class="col-sm-3">
                <a class="navbar-brand " style="font-size:2.25rem; font-family: 'Pacifico', cursive; color:white"  href="#">
                    Yemek Diyarı
                </a>
            </div>            
            
            <div class="col-sm-4 pt-2 d-flex">
                <form action="{{ route('getproductlw')}}" method="post">
                    @csrf
                    @livewire('search')
                </form>
            </div>

            <div class="col-sm-4 pt-2 d-flex">
                <form action="{{ route('getrestaurantlw')}}" method="post">
                    @csrf
                    @livewire('search2')
                </form>
                @livewireScripts
            </div>

        </div>
    </div>
</header>
<!-- header end -->