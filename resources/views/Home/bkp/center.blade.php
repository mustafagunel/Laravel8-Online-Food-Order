<div class="center-content">
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" style="background-color: red;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" style="background-color: red;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" style="background-color: red;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        
        @foreach($tenProductAndRestaurant as $tp)
            @if($loop->iteration > 3)
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
                            {{ $tp->title }} - {{ $tp->price }}
                        </div>
                        <div class="row">
                            {{ $tp->description }}
                        </div>
                        <div class="row">
                            {{ $tp->rtitle }} 
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
    
</div>
