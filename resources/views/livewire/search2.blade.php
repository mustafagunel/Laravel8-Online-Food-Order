<div>
    <input wire:model="search2" class="form-control" name="search2" type="text" list="mylist2" placeholder="Restaurant arayın.."/>


    @if(!empty($query2))
        <datalist id="mylist2" class="input-group-append" style="display:contents">
            @foreach($datalist2 as $rs2)
                <option class="lwSearchItem"  value="{{$rs2->id}}">{{$rs2->title}}</option>
            @endforeach
        </datalist>
    @else
        <datalist id="mylist2" class="input-group-append" style="display:contents">
        </datalist>
    @endif

</div>
