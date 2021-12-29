
@if ($total < $min->min_cart)
    <div class="alert alert-warning" role="alert" >
        Toplam sepet tutarınız restoranın belirlediği minimum sepet tutarını karşılamıyor.
    </div>
@endif

@if(isset($alert))
    <div class="alert alert-warning" role="alert" >
        {{$alert}}
    </div>
@endif

<div class="container-fluid" >
    <div class="row p-2" style="background-color:#fa0050; color:white;" >
        <div class="col-6">
            Yemek
        </div>
        <div class="col-2">
            Fiyat
        </div>
        <div class="col-2">
            Adet
        </div>
        <div class="col-2">
            Tutar
        </div>
    </div>
    @php 
    $total = 0;
    foreach($cart as $c){
        $total =$total+ $c['price']*$c['quantity']; 
        $x = '<div class="row p-2">
            <div class="col-6">
                '.$c['name'].'
            </div>
            <div class="col-2">
                '.$c['price'].'
            </div>
            <div class="col-2">
                '.$c['quantity'].'
            </div>
            <div class="col-2">
                '.$c['price']*$c['quantity'].'
            </div>
        </div>';
        print_r($x);
    }
    @endphp

    <div class="row p-1" style="background-color:#f4e2f4; color:black;" >
       
        <div class="col-10 d-flex justify-content-end" >
            Toplam : 
        </div>
        <div class="col-2">
        {{ $total }}
        </div>
    </div>

    <div class="row p-1" >
       
        <div class="col-12" >
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Online / Kredi Kartı
                </label>
                <div class="online-credit-cart">
                    <form class="mt-3" method="POST" action="/pay/online-credit-cart">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">Kart Numarası: </span>
                            <input type="text" aria-label="Last name" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Geçerlilik Tarihi: </span>
                            <input type="text" aria-label="First name" class="form-control" required>
                            <input type="text" aria-label="Last name" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Güvenlik (CVC2) Kodu: </span>
                            <input type="text" aria-label="Last name" class="form-control" required>
                        </div>

                        <div class="mb-3 form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">3D Secure ile öde </label>
                        </div>
                        <button type="submit" class="btn btn-primary payment">Sipariş Ver</button>
                    </form>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Kapıda Ödeme
                </label>
                <div class="cash-cart"  style="display:none":>
                    <form class="mt-3" method="POST" action="/pay/cash">
                        @csrf
                        <button type="submit" class="btn btn-primary payment">Sipariş Ver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
