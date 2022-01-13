<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profil</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Siparişlerim</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form>
            <div class="form-group row p-2">
                @csrf   
                <div class="input-group  m-2">
                    <span class="input-group-text col-2">Ad</span>
                    <input type="text" class="form-control form-control-user" id=""
                            placeholder="First Name" value="{{ Auth::user()->name }}">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-text col-2">Soyad</span>
                    <input type="text" class="form-control form-control-user" id=""
                            placeholder="Last Name" value="{{ Auth::user()->surname }}">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-text col-2">Email</span>
                    <input type="email" class="form-control form-control-user" id=""
                        placeholder="Email Address" value="{{ Auth::user()->email }}">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-text col-2">Adres</span>
                    <textarea class="form-control" aria-label="With textarea">{{ Auth::user()->address }}</textarea>
                </div>

                <div class="input-group m-2">
                    <a href="login.html" class="btn btn-primary">
                        Güncelle
                    </a>
                </div>
            </div>
        </form>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
    <div class="container" style="border-width:thin;border-style: solid;border-color: #fa005045;">       
        <div class="row p-2">
            <div class="col-12 p-1 d-flex justify-content-between" style="font-weight: bold;">
                <div class="col-1">
                    ID
                </div>
                <div class="col-5">
                    Restaurant
                </div>
                <div class="col-3">  
                    <div class="row">
                        Durum
                    </div>           
                </div>
                <div class="col-2 d-flex justify-content-end">
                    Oluşturma Tarihi
                </div>
            </div>
        </div> 
    </div>
      @foreach($orders as $order)
        <div class="container" style="border-width:thin;border-style: solid;border-color: #fa005045;">   
            <div class="row p-2">
                <div class="col-12 p-1 d-flex justify-content-between">
                    <div class="col-1">
                        {{ $order->id }}
                    </div>
                    <div class="col-5">
                        {{ $order->rname }}
                    </div>
                    <div class="col-3">  
                        <div class="row">
                            @if ($order->status == "preparing")
                                Hazırlanıyor
                            @elseif ($order->status == "canceled")
                                İptal Edildi
                            @endif
                        </div>                      
                        <div class="row">
                            {{ $order->total }} tl - 
                            @if($order->payment_type == "credit-cart")
                                Kredi Kartı
                            @elseif($order->payment_type == "cash")
                                Nakit
                            @endif
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <small>{{ $order->created_at }}</small>
                    </div>
                </div>
            </div>    
        
        </div>

      @endforeach
  </div>
</div>