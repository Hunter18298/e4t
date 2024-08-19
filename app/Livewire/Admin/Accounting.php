<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AcceptForm;
use Illuminate\Support\Facades\Http;

class Accounting extends Component
{
    public $acceptForms = [];
    public $paidData = [];
    public $isDeleteModalOpen=false;
    public $tab = 'unpaid';
    public $unpaidData = [];
    public $totalPaid = 0;
    public $totalParticipants = 0;
    public $totalPaidThisMonth = 0;
    public $totalParticipantsThisMonth = 0;
    public $searchTerm = '';

    public $selectedForm;
    public function mount()
    {
        $this->fetchAcceptForms();

               $this->tab = 'meeting';
              $paidData = array_filter($this->acceptForms, fn($form) => $form['paid']);
        $unpaidData = array_filter($this->acceptForms, fn($form) => !$form['paid']);

        $totalPaid = array_reduce($paidData, fn($sum, $form) => $sum + $form['paidAmount'], 0);
        $totalParticipants = count($this->acceptForms);
        $totalPaidThisMonth = count(array_filter($paidData, fn($form) => date('m', strtotime($form['createdAt'])) === date('m')));
        $totalParticipantsThisMonth = count(array_filter($this->acceptForms, fn($form) => date('m', strtotime($form['createdAt'])) === date('m')));
    }

    public function fetchAcceptForms()
    {
        try {
            $this->acceptForms = AcceptForm::all()->toArray();
        } catch (\Exception $e) {
            $this->emit('toast', ['title' => 'Error', 'description' => 'Error fetching accept form data.', 'variant' => 'error']);
        }
    }

    public function openDeleteModal($formId)
    {
        $this->selectedForm = AcceptForm::find($formId);
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
        $this->selectedForm = null;
    }

    public function handleDelete()
    {
        try {
            if ($this->selectedForm) {
                $this->selectedForm->delete();
                $this->fetchAcceptForms();
                $this->emit('toast', ['title' => 'Success', 'description' => 'Entry deleted successfully!', 'variant' => 'success']);
            }
        } catch (\Exception $e) {
            $this->emit('toast', ['title' => 'Error', 'description' => 'Error deleting entry.', 'variant' => 'error']);
        }
        $this->closeDeleteModal();
    }

    public function updatedSearchTerm()
    {
        $this->acceptForms = AcceptForm::where('userData->name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('userData->phone', 'like', '%' . $this->searchTerm . '%')
            ->get()
            ->toArray();
    }

  
    public function render()
    {
    

        return view('livewire.admin.accounting');
    }
}
