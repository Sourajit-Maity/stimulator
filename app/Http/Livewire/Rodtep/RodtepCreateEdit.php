<?php

namespace App\Http\Livewire\Rodtep;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Rodtep;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class RodtepCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $rodtep, $rodtep_percentage,$rodtep_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($rodtep = null)
    {
        if ($rodtep) {
            $this->rodtep = $rodtep;
            $this->fill($this->rodtep);
            $this->isEdit = true;
        } else
            $this->rodtep = new Rodtep;

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
                'rodtep_percentage' => ['required', 'max:255'],
                'rodtep_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'rodtep_percentage' => ['required', 'max:255'],
                'rodtep_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->rodtep->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Air was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('rodtep.index');
    }

    public function render()
    {
        return view('livewire.rodtep.rodtep-create-edit');
    }
}
