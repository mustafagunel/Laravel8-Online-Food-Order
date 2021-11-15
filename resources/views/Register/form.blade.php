<form method="POST" action="/register">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Şifre</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Şifre Tekrar</label>
        <input type="password" class="form-control" id="password2"  name="password2">
    </div>
    <button type="submit" class="btn btn-primary">Kayıt</button>

</form>