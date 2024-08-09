<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Required;

class MeetingFormController extends Component
{
    public $meetingId;
    public $userData = '';
    public $paid = false;
    public $contentId = null;
    public $certificateId = null;
    public $socialId = null;
    public $error = '';

    // Define validation rules
    protected function rules()
    {
        return [
           'userData' => ['required', 'json'],
            'paid' => ['required', 'boolean'],
            'contentId' => ['required', 'integer'],
            'certificateId' => ['required', 'integer'],
            'socialId' => ['required', 'integer'],
        ];
    }

    public function postMeeting()
    {
        // Validate the input data
        $this->validate();

        // Make an API request to create the post
        $response = Http::post('http://localhost:8000/meeting', [
            'userData' => $this->userData,
            'paid' =>$this->paid,
            'contentId' => $this->contentId,
            'certificateId' =>$this->certificateId ,
            'socialId' => $this->socialId,
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Redirect on success
            return redirect('/info');
        } else {
            // Handle errors, if any
            $this->addError('api', 'ببوورە هەڵەیەک ڕوویدا لە ناردنی فۆڕمەکە');
        }
    }

    public function render()
    {
        return view('livewire.input-form');
    }
}
