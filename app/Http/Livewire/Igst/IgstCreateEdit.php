<?php

namespace App\Http\Livewire\Igst;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Igst;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class IgstCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $igst, $igst_percentage,$igst_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($igst = null)
    {
        if ($igst) {
            $this->igst = $igst;
            $this->fill($this->igst);
            $this->isEdit = true;
        } else
            $this->igst = new Igst;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
      
        
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'igst_percentage' => ['required', 'max:255'],
                'igst_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'igst_percentage' => ['required', 'max:255'],
                'igst_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->igst->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Igst was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('igst.index');
    }
    public function render()
    {
        return view('livewire.igst.igst-create-edit');
    }
}
