<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\ContentType;
use App\Models\Certificate;
use App\Models\SocialUse;
class TestForm extends Component
{
     public $userData = [
        'name' => '',
        'phone' => '',
    ];
    public $paid = false;
    public $contentId;
    public $certificateId;
    public $socialId;
    public $isSubmited=false;
    public $contentTypes = [];
    public $certificates = [];
    public $socialUses = [];

    protected $rules = [
        'userData.name' => 'required|string',
        'userData.phone' => 'required|string',
        'contentId' => 'required|integer',
        'certificateId' => 'required|integer',
        'socialId' => 'required|integer',
    ];
    public function mount()
    {
        // Load data for select options
        $this->contentTypes = ContentType::all();
        $this->certificates = Certificate::all();
        $this->socialUses = SocialUse::all();
    }
     public function submitForm()
    {
            $this->isSubmited=true;
    
        $response = Http::post('http://localhost:8000/meeting/create', [
            'userData' => json_encode($this->userData),
            'paid' => 0,
            'contentId' => $this->contentId,
            'certificateId' => $this->certificateId,
            'socialId' => $this->socialId,
        ]);
      echo $response;
           dd($response);
        if ($response->successful()) {
            session()->flash('message', 'Meeting created successfully.');
            $this->isSubmited=true;
            $this->reset(); // Reset form fields
            return redirect('/info');
        } else {
            session()->flash('error', 'Failed to create meeting.');
        }
    }
    public function render()
    {
        return view('livewire.test-form');
    }
}
