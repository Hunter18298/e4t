<?php

namespace App\Livewire\Admin;

use App\Models\OnlineForm;
use Livewire\Component;

class Onlinetable extends Component
{
     public $tab = 'unpaid';
    public $search = '';
    public $closeModal= true;
    public $openModal=false;
    public $modal = true;
    public $contents = '';
    public function closeModal(){
        $this->openModal = false;
    }
    public function openModal(){
        $this->openModal = true;
    }
    // public function mount()
    // {
    //     $this->tab = 'unpaid';
    // }

    // public function setTab($tab)
    // {
    //     $this->tab = $tab;
    // }
public function delete(OnlineForm $onlineForm ){

    $onlineForm->delete();
    

    $this->redirect('/admin/online', 200);
    
}
    public function render()
    {
        return view('livewire.admin.onlinetable',['onlines' => OnlineForm::all()]);
    }
}
