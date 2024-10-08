<?php

namespace App\Livewire;

use App\Models\MeetingForm;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\ContentType;
use App\Models\Certificate;
use App\Models\SocialUse;
use Livewire\Attributes\Rule;

class TestForm extends Component
{
    // #[Rule('required', message: 'The name field is required.')]
      public $userData = [
        'name' => '',
        'phone' => '',
    ];
    public $paid = false;
      #[Rule('required', message: 'The name field is required.')]
    public $contentId;
      #[Rule('required', message: 'The name field is required.')]
    public $certificateId;
      #[Rule('required', message: 'The name field is required.')]
    public $socialId;

    public $contentTypes = [];
    public $certificates = [];
    public $socialUses = [];

    public function mount()
    {
        // Load data for select options
        $this->contentTypes = ContentType::all();
        $this->certificates = Certificate::all();
        $this->socialUses = SocialUse::all();
    }

    public function save(){
        $this->validate();
        MeetingForm::create([
            'userData' =>$this->userData,
            'contentId' => $this->contentId,
            'paid'=> false,
            'certificateId' => $this->certificateId,
            'socialId' => $this->socialId,
        ]);


    }
    public function render()
    {
        return view('livewire.test-form');
    }
}
