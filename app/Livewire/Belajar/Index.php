<?php

namespace App\Livewire\Belajar;

use Livewire\Component;

class Index extends Component
{
    public $proses;
    public $hobi;
    public $cita;



    public function render()
    {
        $this->proses[] = 'Sedang di render';
        return view('livewire.belajar.index');
    }
}
