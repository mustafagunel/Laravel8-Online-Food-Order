<div>
<input wire:model="search" class="form-control" name="search" type="text" list="mylist" placeholder="Yemek arayın.."/>

@if(!empty($query))
    <datalist id="mylist" class="input-group-append" style="display:contents">
        @foreach($datalist as $rs)
            <option class="lwSearchItem"  value="{{$rs->id}}">{{$rs->title}}</option>
        @endforeach
    </datalist>
@endif

</div>
