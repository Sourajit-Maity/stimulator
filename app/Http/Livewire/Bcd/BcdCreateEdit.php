<?php

namespace App\Http\Livewire\Bcd;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Bcd;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class BcdCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $bcd, $bcd_percentage,$bcd_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($bcd = null)
    {
        if ($bcd) {
            $this->bcd = $bcd;
            $this->fill($this->bcd);
            $this->isEdit = true;
        } else
            $this->bcd = new Bcd;

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
                'bcd_percentage' => ['required', 'max:255'],
                'bcd_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'bcd_percentage' => ['required', 'max:255'],
                'bcd_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->bcd->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Bcd was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('bcd.index');
    }
    public function render()
    {
        return view('livewire.bcd.bcd-create-edit');
    }
}
