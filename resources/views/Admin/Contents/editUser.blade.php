<form method="POST" action="/admin/edit/user">
    @csrf 
    
    <div class="form-group" style="display:none">
        <span>ID</span>
        <input type="text" class="form-control form-control-user" name="id" id="id"
            placeholder="" value="{{ $user->id }}">
    </div>  
    <div class="form-group">
        <span>Name</span>
        <input type="text" class="form-control form-control-user" name="name" id="name"
            placeholder="" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <span>Surname</span>
        <input type="text" class="form-control form-control-user" name="surname" id="surname"
            placeholder="" value="{{ $user->surname }}">
    </div>  
    
    <div class="form-group">
        <span>E-mail</span>
        <input type="email" class="form-control form-control-user" name="email" id="email"
            placeholder="" value="{{ $user->email }}">
    </div>  

    <div class="form-group">
        <span>Role</span>
        <select class="form-control form-control-user" aria-label="Default select example" name="role" id="role">
            <option value="{{ $user->role }}" selected> {{ $user->role }} </option>
            @foreach($roles as $r)
                <option value="{{ $r->name }}">{{ $r->name }}</option>
            @endforeach
        </select>
    </div> 

    <div class="form-group">
        <span>Status</span>
        <select class="form-control form-control-user" aria-label="Default select example" name="status" id="status">
            <option value="{{ $user->status }}" selected>@if($user->status == 0) Pasif @else Aktif @endif</option>
            <option value="1">Aktif</option>
            <option value="0">Pasif</option>
        </select>
    </div> 
    
    <a>
    <button class="btn btn-primary btn-user btn-block" type="submit">UPDATE</button>
    </a>

</form>