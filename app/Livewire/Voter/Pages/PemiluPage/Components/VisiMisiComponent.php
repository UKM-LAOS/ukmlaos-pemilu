<?php

namespace App\Livewire\Voter\Pages\PemiluPage\Components;

use App\Models\Caketum;
use Livewire\Component;

class VisiMisiComponent extends Component
{
    
    public $caketum;

    public function mount($caketum)
    {
        $this->caketum = Caketum::find($caketum);
    }

    public function render()
    {
        return view('livewire.voter.pages.pemilu-page.components.visi-misi-component');
    }

}
