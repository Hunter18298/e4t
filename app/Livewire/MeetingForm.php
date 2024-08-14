<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\ContentType;
use App\Models\Certificate;
use App\Models\SocialUse;

class MeetingForm extends Component
{
    public $userData = [
        'name' => '',
        'phone' => '',
    ];
    public $paid = false;
    public $contentId;
    public $certificateId;
    public $socialId;

    public $contentTypes = [];
    public $certificates = [];
    public $socialUses = [];

    public function mount()
    {
        // Load data for select options
        // $this->contentTypes = ContentType::all();
        $this->certificates = Certificate::all();
        $this->socialUses = SocialUse::all();
    }

    public function submitForm()
    {
        $response = Http::post('http://localhost:8000/meeting', [
            'userData' => json_encode($this->userData),
            'paid' => $this->paid,
            'contentId' => $this->contentId,
            'certificateId' => $this->certificateId,
            'socialId' => $this->socialId,
        ]);

        if ($response->successful()) {
            session()->flash('message', 'Meeting created successfully.');
            $this->reset(); // Reset form fields
        } else {
            session()->flash('error', 'Failed to create meeting.');
        }
    }

    public function render()
    {
        return view('livewire.meeting-form');
    }
}
