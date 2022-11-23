<?php

namespace App\Http\Livewire\Sws;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Sws;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class SwsCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $sws, $sws_percentage,$sws_actual,$active;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($sws = null)
    {
        if ($sws) {
            $this->sws = $sws;
            $this->fill($this->sws);
            $this->isEdit = true;
        } else
            $this->sws = new Sws;

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
                'sws_percentage' => ['required', 'max:255'],
                'sws_actual' => ['required'],
                'active' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'sws_percentage' => ['required', 'max:255'],
                'sws_actual' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $this->sws->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Sws was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('sws.index');
    }
    public function render()
    {
        return view('livewire.sws.sws-create-edit');
    }
}
