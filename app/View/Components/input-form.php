<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MeetingFormController extends Component
{
    public $userData = [
        'name' => '',
        'phone' => '',
        'address' => '',
    ];
    public $paid = false;
    public $contentId = null;
    public $certificateId = null;
    public $socialId = null;
    public $submitted = false;
    public $error = '';
    public $courseOptions = [];
    public $socialOptions = [];
    public $certificateOptions = [];

    public function mount()
    {
        $this->fetchCourseOptions();
        $this->fetchSocialOptions();
        $this->fetchCertificateOptions();
    }

    protected function rules()
    {
        return [
            'userData.name' => 'required|string|max:255',
            'userData.phone' => 'required|string|max:11',
            'userData.address' => 'nullable|string|max:255',
            'contentId' => 'required|integer',
            'certificateId' => 'required|integer',
            'socialId' => 'required|integer',
        ];
    }

    public function postMeeting()
    {
        $this->validate();

        $response = Http::post('https://api.streamzone.krd:4002/meeting', [
            'userData' => $this->userData,
            'paid' => $this->paid,
            'contentId' => $this->contentId,
            'certificateId' => $this->certificateId,
            'socialId' => $this->socialId,
        ]);

        if ($response->successful()) {
            $this->submitted = true;
            $this->resetForm();
            return redirect('/info');
        } else {
            $this->error = 'ببوورە هەڵەیەک ڕوویدا لە ناردنی فۆڕمەکە';
        }
    }

    public function resetForm()
    {
        $this->userData = [
            'name' => '',
            'phone' => '',
            'address' => '',
        ];
        $this->contentId = null;
        $this->certificateId = null;
        $this->socialId = null;
        $this->error = '';
    }

    private function fetchCourseOptions()
    {
        $response = Http::get('https://api.streamzone.krd:4002/contentTypes');
        $this->courseOptions = $response->json();
    }

    private function fetchSocialOptions()
    {
        $response = Http::get('https://api.streamzone.krd:4002/socialUses');
        $this->socialOptions = $response->json();
    }

    private function fetchCertificateOptions()
    {
        $response = Http::get('https://api.streamzone.krd:4002/certificatess');
        $this->certificateOptions = $response->json();
    }

    public function render()
    {
        return view('livewire.input-form', [
            'courseOptions' => $this->formatOptions($this->courseOptions),
            'socialOptions' => $this->formatOptions($this->socialOptions),
            'certificateOptions' => $this->formatOptions($this->certificateOptions),
        ]);
    }

    private function formatOptions($options)
    {
        return collect($options)->map(function ($option) {
            return [
                'value' => (string)$option['id'], // Assuming 'id' is a common key for these options
                'label' => $option['name'] . (isset($option['amount']) ? " {$option['amount']}$" : ''),
            ];
        })->toArray();
    }
}
