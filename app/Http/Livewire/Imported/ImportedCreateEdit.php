<?php

namespace App\Http\Livewire\Imported;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\OverallSales;
use App\Models\DutyImported;
use App\Models\Bcd;
use App\Models\Cgst;
use App\Models\Igst;
use App\Models\Sgst;
use App\Models\Sws;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class ImportedCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $perPageList = [];
    public $imported,$overall_sale_id,$customs_duty, $type,$subtype,  $value,$bcd_rate,$bcd_amount,$sws_rate, $sws_amount, $igst_rate, $igst_amount, 
    $compensation_cess,$blankArr,$bcdList,$swsList,$igstList, $safeguard_duty,$antidumping_duty, $addl_duty_1,  $addl_duty_3, $addl_duty_5, $nccd;
    public $address;
    public $isEdit = false;
    public $saleList = [];
    public $photo;
    public $photos = [];
    public $inputs = [];
    public $model_image, $imgId, $model_documents;
    public $i = 1;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($imported = null)
    {
        if ($imported) {
            $this->imported = $imported;
            $this->fill($this->imported);
            $this->isEdit = true;
        } else
            $this->imported = new DutyImported;

      
        $this->blankArr = [
            "value"=> "", "text"=> "== Select One =="
        ];
        $this->saleList = OverallSales::get();
        $this->bcdList = Bcd::get();
        $this->swsList = Sws::get();
        $this->igstList = Igst::get();

        
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'overall_sale_id' => ['required', 'max:255'],
                'type' => ['required'],
                'subtype' => ['required'],
                'value' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'bcd_rate' => ['required'],
                'bcd_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'sws_rate' => ['required'],
                'sws_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'igst_rate' => ['required'],
                'igst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'compensation_cess' => ['required'],
                'safeguard_duty' => ['required'],
                'antidumping_duty' => ['required'],
                'addl_duty_1' => ['required'],
                'addl_duty_3' => ['required'],
                'addl_duty_5' => ['required'],
                'customs_duty' => ['required'],
                'nccd' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'overall_sale_id' => ['required', 'max:255'],
                'type' => ['required'],
                'subtype' => ['required'],
                'value' => ['required'],
                'bcd_rate' => ['required'],
                'bcd_amount' => ['required'],
                'sws_rate' => ['required'],
                'sws_amount' => ['required'],
                'igst_rate' => ['required'],
                'igst_amount' => ['required'],
                'compensation_cess' => ['required'],
                'safeguard_duty' => ['required'],
                'antidumping_duty' => ['required'],
                'addl_duty_1' => ['required'],
                'addl_duty_3' => ['required'],
                'addl_duty_5' => ['required'],
                'customs_duty' => ['required'],
                'nccd' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
       
       $this->imported->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        

        $msgAction = 'Imported Duty was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('imported.index');
    }

    public function render()
    {
        return view('livewire.imported.imported-create-edit');
    }

    
}
