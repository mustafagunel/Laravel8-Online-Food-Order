<div>
    <input wire:model="search2" class="form-control" name="search2" type="text" autocomplete="off" list="mylist2" placeholder="Restaurant arayın.."/>


    @if(!empty($query2))
        <datalist id="mylist2" class="input-group-append" style="display:block; position:absolute;z-index:10">
            @foreach($datalist2 as $rs2)
            <a href="/restaurant/d/{{ $rs2->id }}" style="text-decoration:none">
                <option class="lwSearchItem form-control"  value="{{$rs2->id}}">{{$rs2->title}}</option>
            </a>
            @endforeach
        </datalist>
    @endif

</div>
