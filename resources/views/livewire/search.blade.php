<div>
<input wire:model="search" class="form-control" name="search" type="text" list="mylist" autocomplete="off" placeholder="Yemek arayın.."/>

@if(!empty($query))
    <datalist id="mylist" class="input-group-append" style="display:block; position:absolute;z-index:10">
        @foreach($datalist as $rs)
        <a href="/restaurant/d/{{ $rs->rID }}" style="text-decoration:none">
            <option class="lwSearchItem"  value="{{$rs->id}}">{{$rs->title}}</option>
        </a>
        @endforeach
    </datalist>
@endif

</div>
