<div class="container-fluid" style="background-color:#eae4e4">
    <div class="row text-center">
        <p class="navbar-brand m-0 p-3">
            Yemek Diyarı'yla yemeğin sadece birkaç tık uzaklıkta! Şehrinizi seçip sipariş verin.
        </p>         
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-16" style="display:contents">
            @foreach($cities as $city)
                <div class="col-1 p-2">
                    <div class="col-12 p-3 d-flex justify-content-center"  style=" background-color:#f6a31c">
                        <a href="/restaurant/{{ $city->name }}/" style="text-decoration:none; color:white; font-weight:bold">
                            <span class="plateNo">{{ $city->id }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>   