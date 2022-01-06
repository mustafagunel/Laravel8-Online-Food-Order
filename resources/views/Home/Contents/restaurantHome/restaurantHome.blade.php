<div class="restaurant col-12" >
    <div class="restaurant container p-1 mb-2 border" >
        <div class="row" >
            <div class="col-3 d-grid align-content-center ">
                <img src="/images/restaurants-logo/{{ $restaurant->image }}" style="width:100%; height:auto">
            </div>
            <div class="col-9 d-grid align-items-center">
                <div class="row" >
                    <div class="col-3 ">
                        <p style="text-align:center;background-color:#29cc81; color:white"> {{ number_format($restaurant->point, 1, ',', '.') }} </p>

                    </div>
                    <div class="col-9">{{ $restaurant->title }} / {{ $restaurant->town_name }} </div>
                </div>
                <div class="row d-flex align-items-center pt-3">
                    <div class="col-4 d-flex align-items-center">
                        <div class="col-4" style="padding:0">
                            <img src="https://www.yemeksepeti.com/assets/images/medium-min-price-icon.png" style="width:75%;height:auto">
                        </div>
                        <div class="col-8">{{ $restaurant->min_cart }}</div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="col-4" style="padding:0">
                            <img src="https://www.yemeksepeti.com//assets/images/medium-time-icon.png" style="width:75%;height:auto">
                        </div>
                        <div class="col-8">{{ $restaurant->serve_time }} - {{ $restaurant->serve_time+10 }} dk.</div>
                    </div>
                    

                    <div class="col-4 d-flex align-items-center">
                        <div class="col-4" style="padding:0">
                            <img src="https://www.yemeksepeti.com//assets/images/medium-delivery-icon.png" style="width:75%;height:auto">
                        </div>
                        <div class="col-8">{{ $restaurant->serve_price }}TL</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="true">Menü</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Bilgiler</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment" type="button" role="tab" aria-controls="comment" aria-selected="false">Yorumlar</button>
    </li>
    </ul>

</div>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="home-tab">
        @foreach($categories as $category)
            <div class="col-12 category-header pt-2">
                <div class="row">
                    <h3> {{ $category->category_name }} </h3>
                </div>
            </div>
            @foreach($products as $product)
                @if($product->category_name == $category->category_name)
                    <div class="product col-12 mb-2 p-2 border" >
                        <div class="row d-flex align-items-center">
                            <div class="col-2 col-sm-1 price" >
                                <input data-product-id="{{ $product->id }}" type="text" style="width:100%; text-align:center" value="1"> 
                            </div>
                            <div class="col-2 col-sm-1" >
                                <button class="btn-success add-to-cart" 
                                    aria-label="Sepete Ekle"  
                                    data-product-id="{{ $product->id }}" 
                                     > 
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="col-6 col-sm-8" >
                                <div class="row fw-bold">{{ $product->title }}</div>
                                <div class="row">{{ $product->description }}</div>
                            </div>
                            <div class="col-2 col-sm-2 fw-bold" >{{ $product->price }} TL</div>
                        </div>
                    </div>

                @endif
            @endforeach   
        @endforeach   

        
    
    </div>
  <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
      <ul style="list-style:none; padding-top:30px">
        <li><span class="fw-bold">Açıklama:</span> {{ $restaurant->description }}</li>
        <li><span class="fw-bold">Restaurant Puanı:</span> {{ $restaurant->point }}</li>
        <li><span class="fw-bold">Min. Sepet Tutarı: </span>{{ $restaurant->min_cart }} tl</li>
        <li><span class="fw-bold">Paket Servis Ücreti: </span>{{ $restaurant->serve_price }} tl</li>
        <li><span class="fw-bold">Ortalama Servis Zamanı:</span> {{ $restaurant->serve_time }} dk</li>
    </ul>
  
    </div>
  <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
      Eklenecek
  </div>
</div>

