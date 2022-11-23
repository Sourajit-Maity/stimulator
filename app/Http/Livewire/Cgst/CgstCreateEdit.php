<?php

namespace App\Http\Livewire\Cgst;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cgst;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class CgstCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $cgst, $cgst_percentage,$cgst_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($cgst = null)
    {
        if ($cgst) {
            $this->cgst = $cgst;
            $this->fill($this->cgst);
            $this->isEdit = true;
        } else
            $this->cgst = new Cgst;

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
                'cgst_percentage' => ['required', 'max:255'],
                'cgst_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'cgst_percentage' => ['required', 'max:255'],
                'cgst_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->cgst->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Cgst was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('cgst.index');
    }
    public function render()
    {
        return view('livewire.cgst.cgst-create-edit');
    }
}
