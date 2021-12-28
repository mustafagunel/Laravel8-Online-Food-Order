<div class="col-12" >
    <div class="container pb-5">
        <div class="row pb-3">
            <div class="col-12">
            Siparişleriniz ile ilgili destek hattımıza hemen ulaşmak için web ve uygulamalar üzerinde yer alan canlı yardım butonuna tıklayabilirsiniz. Görüşleriniz için info@yemekdiyari.com adresine email gönderebilir veya 444 0 000 numaralı telefondan bize ulaşabilirsiniz.
            </div>
        </div><hr>
        <div class="row">
            <div class="col-5 fw-normal">
                Şirket Unvanı
            </div>
            <div class="col-7 fw-bold">
                Yemek Diyarı Elektronik İletişim Perakende Gıda Lojistik A.Ş.
            </div>
            <div class="col-5">
                Sorumlu Kişiler
            </div>
            <div class="col-7 fw-bold">
                <span>Yunus Elmas</span>
            </div>
            <div class="col-5">
            Ticaret Sicil No
            </div>
            <div class="col-7 fw-bold">
                <span>400003</span>
            </div>
            <div class="col-5">
            Merkezin Bulunduğu Yer
            </div>
            <div class="col-7 fw-bold">
                <span>TÜRKİYE / İSTANBUL / ŞİŞLİ / ESENTEPE</span>
            </div>
            
            <div class="col-5">
            Telefon No
            </div>
            <div class="col-7 fw-bold">
                <span>+90 212 000 00 00</span>
            </div>
            <div class="col-5">
            Denetim Mercii
            </div>
            <div class="col-7 fw-bold">
                <span>KPMG Bağımsız Denetim ve Serbest Muhasebeci Mali Müşavirlik A.Ş.</span>
            </div>
            <div class="col-5">
            Mersis No
            </div>
            <div class="col-7 fw-bold">
                <span>000000000000015</span>
            </div>
            <div class="col-5">
            Tescilli Marka adı
            </div>
            <div class="col-7 fw-bold">
                <span>Yemekdiyarı</span>
            </div>
        </div><hr>
    </div>

    <form action="/send-message" method="POST" style="border-color: #e6c4c4; border-style: solid; padding: 10px; border-width: thin;">
        <h2>İletişim Formu</h2>
        @csrf
        <br>    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mesaj</label>
            <div class="form-floating">
                <textarea class="form-control" name="msg" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>