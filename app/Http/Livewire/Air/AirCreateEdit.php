<?php

namespace App\Http\Livewire\Air;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Air;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class AirCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $air, $air_percentage,$air_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($air = null)
    {
        if ($air) {
            $this->air = $air;
            $this->fill($this->air);
            $this->isEdit = true;
        } else
            $this->air = new Air;

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
                'air_percentage' => ['required', 'max:255'],
                'air_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'air_percentage' => ['required', 'max:255'],
                'air_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->air->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Air was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('air.index');
    }

    public function render()
    {
        return view('livewire.air.air-create-edit');
    }
}
