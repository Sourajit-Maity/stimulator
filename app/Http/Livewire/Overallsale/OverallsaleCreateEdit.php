<?php

namespace App\Http\Livewire\Overallsale;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\OverallSales;
use App\Models\Rodtep;
use App\Models\Air;
use App\Models\WasteScrap;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class OverallsaleCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $overallsale,$rodtepList, $wasteList,$aitList,  $product_name,$description,$hsn,$export_value, $sez_unit, $dta, $deemed_export, 
    $taxability_under_gst,$blankArr, $air,$sale_value_of_scrap, $waste_scrap,  $rodtep, $air_receivable,   $air_turnaround, $brand_rate, $air_amount,  $waste_scrap_amount, $rodtep_amount;
    public $address;
    public $isEdit = false;
    public $taxabilityList = [];
    public $airreceiveList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($overallsale = null)
    {
        if ($overallsale) {
            $this->overallsale = $overallsale;
            $this->fill($this->overallsale);
            $this->isEdit = true;
        } else
            $this->overallsale = new OverallSales;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->taxabilityList = [
            ['value' => 0, 'text' => "Choose Taxability under GST"],
            ['value' => 1, 'text' => "Taxable"],
            ['value' => 0, 'text' => "Exempt"]
        ];
        $this->airreceiveList = [
            ['value' => 0, 'text' => "Choose AIR receivable"],
            ['value' => 1, 'text' => "Yes"],
            ['value' => 0, 'text' => "No"]
        ];
        $this->blankArr = [
            "value"=> "", "text"=> "== Select One =="
        ];
        $this->rodtepList = Rodtep::get();
        $this->wasteList = WasteScrap::get();
        $this->aitList = Air::get();
        
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'product_name' => ['required', 'max:255'],
                'description' => ['required'],
                'hsn' => ['required'],
                'export_value' => ['required'],
                'sez_unit' => ['required'],
                'dta' => ['required'],
                'deemed_export' => ['required'],
                'taxability_under_gst' => ['required'],
                'air' => ['required'],
                'waste_scrap' => ['required'],
                'rodtep' => ['required'],
                'air_receivable' => ['required'],
                'air_turnaround' => ['required'],
                'air_amount' => ['required'],
                'rodtep_amount' => ['required'],
                'waste_scrap_amount' => ['required'],
                'sale_value_of_scrap' => ['required'],
                'brand_rate' => ['required'],


            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'product_name' => ['required', 'max:255'],
                'description' => ['required'],
                'hsn' => ['required'],
                'export_value' => ['required'],
                'sez_unit' => ['required'],
                'dta' => ['required'],
                'deemed_export' => ['required'],
                'taxability_under_gst' => ['required'],
                'air' => ['required'],
                'waste_scrap' => ['required'],
                'rodtep' => ['required'],
                'air_receivable' => ['required'],
                'air_turnaround' => ['required'],
                'air_amount' => ['required'],
                'rodtep_amount' => ['required'],
                'waste_scrap_amount' => ['required'],
                'sale_value_of_scrap' => ['required'],
                'brand_rate' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {

        $air_per = Air::where('id',(int)$this->air)->value('air_actual');  
        $waste_per = WasteScrap::where('id',(int)$this->waste_scrap)->value('waste_scrap_actual');
        $rodtep_per = Rodtep::where('id',(int)$this->rodtep)->value('rodtep_actual');

        $this->air_amount = $this->export_value * $air_per;
        $this->rodtep_amount = $this->deemed_export * $rodtep_per;
        $this->waste_scrap_amount = $this->export_value * $waste_per;
        $this->sale_value_of_scrap = $this->rodtep_amount;

        $this->overallsale->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        

        $msgAction = 'Overall sale was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('overall-sale.index');
    }
 
    public function render()
    {
        return view('livewire.overallsale.overallsale-create-edit');
    }
}
