<?php

namespace App\Http\Livewire\Overallsale;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\OverallSales;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class OverallsaleCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $overallsale, $product_name,$description,$hsn,$export_value, $sez_unit, $dta, $deemed_export, 
    $taxability_under_gst, $air,$sale_value_of_scrap, $waste_scrap,  $rodtep, $air_receivable,   $air_turnaround, $brand_rate, $air_amount,  $waste_scrap_amount, $rodtep_amount;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $industryList = [];
    public $activityList = [];
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
                'air' => ['nullable'],
                'waste_scrap' => ['nullable'],
                'brand_rate' => ['nullable'],
                'rodtep' => ['nullable'],
                'air_receivable' => ['nullable'],
                'air_turnaround' => ['nullable'],
                'air_amount' => ['nullable'],
                'rodtep_amount' => ['nullable'],
                'waste_scrap_amount' => ['nullable'],
                'sale_value_of_scrap' => ['nullable'],


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
                'air' => ['nullable'],
                'waste_scrap' => ['nullable'],
                'rodtep' => ['nullable'],
                'air_receivable' => ['nullable'],
                'air_turnaround' => ['nullable'],
                'air_amount' => ['nullable'],
                'rodtep_amount' => ['nullable'],
                'waste_scrap_amount' => ['nullable'],
                'sale_value_of_scrap' => ['nullable'],
                'brand_rate' => ['nullable'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->air_amount = $this->export_value * $this->air;
        $this->rodtep_amount = $this->deemed_export * $this->rodtep;
        $this->waste_scrap_amount = $this->export_value * $this->waste_scrap;
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
