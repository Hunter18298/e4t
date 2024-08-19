<?php

namespace App\Livewire\Admin;
use Livewire\Component;
use App\Models\MeetingForm;

class MeetingTable extends Component
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
public function delete(MeetingForm $meetingForm ){

    $meetingForm->delete();
    
}
    public function render()
    {
        // $query = MeetingForm::query();

        // if ($this->search) {
        //     $query->where(function ($q) {
        //         $q->where('userData->name', 'like', '%' . $this->search . '%')
        //           ->orWhere('userData->phone', 'like', '%' . $this->search . '%');
        //     });
        // }

        // if ($this->contents) {
        //     $query->where('contentsId', $this->contents);
        // }

        // $meetings = $query->where('paid', $this->tab === 'paid')->get();

        return view('livewire.admin.meeting-table',['meetings' => MeetingForm::all()]);
    }
}
