<div class="col-12" >
    <div class="container pb-5">
        <div class="row ">
            <div class="col-12">
            Siparişleriniz ile ilgili destek hattımıza hemen ulaşmak için web ve uygulamalar üzerinde yer alan canlı yardım butonuna tıklayabilirsiniz. Görüşleriniz için info@yemekdiyari.com adresine email gönderebilir veya 444 0 000 numaralı telefondan bize ulaşabilirsiniz.
            </div>
        </div>
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