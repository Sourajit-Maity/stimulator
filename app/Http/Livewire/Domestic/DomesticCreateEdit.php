<?php

namespace App\Http\Livewire\Domestic;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\OverallSales;
use App\Models\DutyDomestic;
use App\Models\Bcd;
use App\Models\Cgst;
use App\Models\Igst;
use App\Models\Sgst;
use App\Models\Sws;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class DomesticCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $domestic,$igstList,$sgstList,$cgstList,$overall_sale_id,$customs_duty, $type,$subtype,  $value,$sgst_rate,$sgst_amount,$cgst_rate, $cgst_amount, $igst_rate, $igst_amount, $compensation_cess,$blankArr;
    public $isEdit = false;
    public $saleList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($domestic = null)
    {
        if ($domestic) {
            $this->domestic = $domestic;
            $this->fill($this->domestic);
            $this->isEdit = true;
        } else
            $this->domestic = new DutyDomestic;

      
        $this->blankArr = [
            "value"=> "", "text"=> "== Select One =="
        ];
        $this->saleList = OverallSales::get();
        $this->cgstList = Cgst::get();
        $this->sgstList = Sgst::get();
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
                'cgst_rate' => ['required'],
                'cgst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'sgst_rate' => ['required'],
                'sgst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'igst_rate' => ['required'],
                'igst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'compensation_cess' => ['required'],
                'customs_duty' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'overall_sale_id' => ['required', 'max:255'],
                'type' => ['required'],
                'subtype' => ['required'],
                'value' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'cgst_rate' => ['required'],
                'cgst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'sgst_rate' => ['required'],
                'sgst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'igst_rate' => ['required'],
                'igst_amount' => ['required','regex:/^([0-9\s+\(\)]*)$/', 'min:2', 'max:8'],
                'compensation_cess' => ['required'],
                'customs_duty' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {


        $this->domestic->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        

        $msgAction = 'Domestic Duty was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('domestic.index');
    }
    public function render()
    {
        return view('livewire.domestic.domestic-create-edit');
    }
}
