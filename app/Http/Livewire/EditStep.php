<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Step;

class EditStep extends Component
{
    public $steps = [];

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
        // dd($steps);
    }
    public function inc() // 1 2 3 
    {
        $this->steps[] = count($this->steps);  
    }
    public function remove($key){
        $step = $this->steps[$key];
        if(isset($step['id'])){
            Step::find($step['id'])->delete() ;
        } 
        unset($this->steps[$key]);   
        
    }
    public function render()
    {
        return view('livewire.edit-step');
    }
}
