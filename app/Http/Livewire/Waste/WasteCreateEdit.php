<?php

namespace App\Http\Livewire\Waste;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\WasteScrap;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class WasteCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $waste, $waste_scrap_percentage,$waste_scrap_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($waste = null)
    {
        if ($waste) {
            $this->waste = $waste;
            $this->fill($this->waste);
            $this->isEdit = true;
        } else
            $this->waste = new WasteScrap;

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
                'waste_scrap_percentage' => ['required', 'max:255'],
                'waste_scrap_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'waste_scrap_percentage' => ['required', 'max:255'],
                'waste_scrap_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->waste->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Waste Scrap was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('waste-scrap.index');
    }
    public function render()
    {
        return view('livewire.waste.waste-create-edit');
    }
}
