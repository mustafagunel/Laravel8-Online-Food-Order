<div class="col-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Siparişlerim</button>
        </li>
    </ul>

</div>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="home-tab">
        <form class="user p-3">
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
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>

            <div class="input-group m-2">
                <a href="login.html" class="btn btn-primary">
                    Güncelle
                </a>
            </div>
        </form>
    </div>
  <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">.b.</div>
</div>

