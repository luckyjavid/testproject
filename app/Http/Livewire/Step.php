<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;

class Step extends Component
{
    public $steps = []; 
    public function inc() // 1 2 3 
    {
        $this->steps[] = count($this->steps);  
    }
    public function remove($key){
        unset($this->steps[$key]);   
    }
    public function ddd()
    {
        dd($this->steps);
    }
    public function render()
    {
        return view('livewire.step');
    }
}
