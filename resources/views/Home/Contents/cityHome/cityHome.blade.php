<div class="center-content">
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($tenProductAndRestaurant as $tp)

                @if($loop->iteration > 5)  <!-- show max 5 slide item -->
                    @break
                @endif
                @if($loop->iteration == 1)
                    <button type="button" style="background-color: red;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @else
                <button type="button" style="background-color: red;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ ($loop->iteration-1) }}" aria-label="Slide {{ ($loop->iteration-1) }}"></button>
            
                @endif
        @endforeach
    </div>
    <div class="carousel-inner">
        
        @foreach($tenProductAndRestaurant as $tp)
            @if($loop->iteration > 5) <!-- show max 5 slide item -->
                @break
            @endif
            @if($loop->iteration == 1)
                <div class="carousel-item active" style="background-color:#eae2e230">
            @else
                <div class="carousel-item" style="background-color:#eae2e230">
            @endif
                <a href="/restaurant/d/{{ $tp->rid }}" style="text-decoration:none">
                <div class="slideItem d-flex" style="height:200px;">
                    <div class="col-4">
                        <img src="/images/products/{{ $tp->image }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="col-7 offset-1">
                        <div class="row">
                            <p style="color:#fa0050; "><span style="font-weight:bold;">{{ $tp->title }}</span><hr>
                            {{ $tp->description }}</p>
                            
                        </div>
                        <div class="row">
                            <p style="color:green">Fiyat: {{ $tp->price }}TL</p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden" >Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- SLIDER END-->

    <div class="products col-12" >
        <hr>
        @foreach($restaurants as $r)
            <div class="product container p-1 mb-2 border" >
                <div class="row" >
                    <div class="col-2 d-grid align-content-center ">
                        <img src="/images/restaurants-logo/{{ $r->image }}" style="width:100%; height:auto">
                    </div>
                    <div class="col-10 d-grid align-items-center">
                        <div class="row" >
                            <div class="col-lg-1 col-2 col-xm-2" style="background-color:#29cc81; color:white">{{ number_format($r->point, 1, ',', '.') }}</div>
                            <div class="col-lg-10 col-9 col-xm-9"><a href="/restaurant/d/{{ $r->id }}" style="text-decoration:none; color:black" >{{ $r->title }} </a></div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-1" style="padding:0">
                                <img src="https://www.yemeksepeti.com/assets/images/medium-min-price-icon.png" style="width:100%;height:auto">
                            </div>
                            <div class="col-2">{{ $r->min_cart }} tl</div>
                            <div class="col-1" style="padding:0">
                                <img src="https://www.yemeksepeti.com//assets/images/medium-time-icon.png" style="width:100%;height:auto">
                            </div>
                            <div class="col-3">{{ $r->serve_time }}-{{ $r->serve_time+10 }} dk.</div>
                            <div class="col-1" style="padding:0">
                                <img src="https://www.yemeksepeti.com//assets/images/medium-delivery-icon.png" style="width:100%;height:auto">
                            </div>
                            <div class="col-2">{{ $r->serve_price }}TL</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
    </div>
    
</div>


