<spna>[!] Restaurant güncelleme işlemi sonrası restaurant talebinde bulunan kullanıcının rolü 'restaurant' olarak güncellenir.    </span>
<hr>
<form method="POST" action="/admin/update/restaurant">
    @csrf 
    
    <div class="form-group" style="display:none">
        <span>ID</span>
        <input type="text" class="form-control form-control-user" name="id" id="id"
            placeholder="ID" value="{{ $restaurant->id }}">
    </div>  
    <div class="form-group">
        <span>Title</span>
        <input type="text" class="form-control form-control-user" name="title" id="title"
            placeholder="Title" value="{{ $restaurant->title }}">
    </div>  
    <div class="form-group">
        <span>Keywords</span>
        <input type="text" class="form-control form-control-user" name="keywords" id=""
            placeholder="Keywords" value="{{ $restaurant->keywords }}">
    </div>
    <div class="form-group">
        <span>Description</span>
        <input type="text" class="form-control form-control-user" name="description" id=""
            placeholder="Description" value="{{ $restaurant->description }}">
    </div>
    <div class="form-group">
        <span>Status</span>
        <small>active, pending, passive, closed</small>
        <input type="text" class="form-control form-control-user" name="status" id=""
            placeholder="Status" value="{{ $restaurant->status }}">
    </div>
    

    <a>
    <button class="btn btn-primary btn-user btn-block" type="submit">UPDATE</button>
    </a>

</form>