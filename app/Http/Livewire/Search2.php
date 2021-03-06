<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Search2 extends Component
{
    public $search2='';

    public function render()
    {
        if(Auth::user())
            $q2 = 'select * from restaurant where title like "%'.$this->search2.'%" and town='.Auth::user()->town;
        else
            $q2 = 'select * from restaurant where title like "%'.$this->search2.'%"';
        $datalist2 = DB::select($q2);
        return view('livewire.Search2',['datalist2'=>$datalist2,'query2'=>$this->search2]);
    }
}
