<div>
    <input wire:model="search2" class="form-control" name="search2" type="text" list="mylist2" placeholder="Restaurant arayın.."/>


    @if(!empty($query2))
        <datalist id="mylist2" class="input-group-append" style="display:contents">
            @foreach($datalist2 as $rs2)
            <a href="/restaurant/d/{{ $rs2->id }}" style="text-decoration:none">
                <option class="lwSearchItem"  value="{{$rs2->id}}">{{$rs2->title}}</option>
            </a>
            @endforeach
        </datalist>
    @endif

</div>
