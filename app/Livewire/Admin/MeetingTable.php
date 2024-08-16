<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\MeetingForm;

class MeetingTable extends Component
{
    public $tab = 'unpaid';
    public $search = '';
    public $content = '';

    public function mount()
    {
        $this->tab = 'unpaid';
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        $query = MeetingForm::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('userData->name', 'like', '%' . $this->search . '%')
                  ->orWhere('userData->phone', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->content) {
            $query->where('contentId', $this->content);
        }

        $meetings = $query->where('paid', $this->tab === 'paid')->get();

        return view('livewire.admin.meeting-table', [
            'meetings' => $meetings,
            'tab' => $this->tab,
        ]);
    }
}
