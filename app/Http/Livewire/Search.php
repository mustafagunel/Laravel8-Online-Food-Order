<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Search extends Component
{
    public $search='';
    public function render()
    {
        $q = 'select * from product where title like "%'.$this->search.'%"';
        $datalist = DB::select($q);
        return view('livewire.Search',['datalist'=>$datalist,'query'=>$this->search]);
    }
}
