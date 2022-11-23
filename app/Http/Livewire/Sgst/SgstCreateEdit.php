<?php

namespace App\Http\Livewire\Sgst;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Sgst;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class SgstCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $sgst, $sgst_percentage,$sgst_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($sgst = null)
    {
        if ($sgst) {
            $this->sgst = $sgst;
            $this->fill($this->sgst);
            $this->isEdit = true;
        } else
            $this->sgst = new Sgst;

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
                'sgst_percentage' => ['required', 'max:255'],
                'sgst_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'sgst_percentage' => ['required', 'max:255'],
                'sgst_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->sgst->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Sgst was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('sgst.index');
    }
    public function render()
    {
        return view('livewire.sgst.sgst-create-edit');
    }
}
