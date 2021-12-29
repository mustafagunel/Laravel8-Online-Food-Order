<!-- Login Form -->
<div class="row">
    <div class="col-12">
        
        <form method="POST" action="/login" class="border p-3">
            
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1" style="font-weight:bold" >Kullanıcı Adı / E-Posta</label>
                <input type="email" class="form-control mt-1" id="email" name="email" aria-describedby="emailHelp" placeholder="Kullanıcı Adı">
            </div>
            
            <div class="form-group mt-2">
                <label for="exampleInputPassword1" style="font-weight:bold">Şifre</label>
                <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Şifre">
                
                <div class="d-flex justify-content-between">
                    <div class="col-6">
                        <a href="#" style="font-size:11px">Şifremi Unuttum</a>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="form-check-input" style="margin-right:5px" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><small style="font-size:11px">Beni Hatırla</small></label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn w-100 btn-success mt-2">ÜYE GİRİŞİ</button>
            
        </form>
        <div class="d-flex align-items-center justify-content-center p-3" style="background-color:#efefef">
            Üyeliğiniz yok mu? <a style="margin-left:10px" href="/register">Yeni Üyelik!</a>
        </div>
    </div>
</div>
<!-- Login Form end -->