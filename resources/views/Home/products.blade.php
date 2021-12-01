<div class="products col-12" >
    
    @php
        foreach($restaurants as $restaurant){
            print_r('
                <div class="product container p-1 mb-2 border" >
                    <div class="row" >
                        <div class="col-2 d-grid align-content-center ">
                            <img src="/images/restaurants-logo/'.$restaurant->image.'" style="width:100%; height:auto">
                        </div>
                        <div class="col-10 d-grid align-items-center">
                            <div class="row" >
                                <div class="col-1 " style="background-color:#29cc81; color:white">'.$restaurant->point.'</div>
                                <div class="col-10"><a href="/restaurant/d/'.$restaurant->id.'" style="text-decoration:none; color:black" >'.$restaurant->title.' </a></div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-1" style="padding:0">
                                    <img src="https://www.yemeksepeti.com/assets/images/medium-min-price-icon.png" style="width:100%;height:auto">
                                </div>
                                <div class="col-2">'.$restaurant->min_cart.' tl</div>
                                <div class="col-1" style="padding:0">
                                    <img src="https://www.yemeksepeti.com//assets/images/medium-time-icon.png" style="width:100%;height:auto">
                                </div>
                                <div class="col-3">'.$restaurant->serve_time.'-'.($restaurant->serve_time+10).' dk.</div>
                                <div class="col-1" style="padding:0">
                                    <img src="https://www.yemeksepeti.com//assets/images/medium-delivery-icon.png" style="width:100%;height:auto">
                                </div>
                                <div class="col-2">'.$restaurant->serve_price.'TL</div>
                            </div>
                        </div>
                    </div>
                </div>
            
            ');
        }
        
    @endphp
    
    
</div>