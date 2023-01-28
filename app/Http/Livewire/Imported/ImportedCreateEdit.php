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

    public function saveOrUpdate()
    {
       

        $rules = array();
        $messages = array();
        $this->inputCount = count($this->inputs);

        if($this->inputCount > 0){
            foreach($this->inputs as $key=>$index){
                $validrules = [
                    'type.'.$index => 'required',
                    'design_description.'.$index => 'required',
                  
        
                ];
                $validmessage = [
                    'type.'.$index.'.required' => 'Design name field is required',
                    'design_description.'.$index.'.required' => 'Description field is required',
                   
        
                ];
                $rules = array_merge($rules,$validrules);
                $messages = array_merge($messages,$validmessage);
            }

            $normalrules = [
                'type.0' => 'required',
                'design_description.0' => 'required',
               
    
            ];
            $normalmessage = [
                'type.0.required' => 'Design name field is required',
                'design_description.0.required' => 'Description field is required',
                
    
            ];
            $rules = array_merge($rules, $normalrules);
            $messages = array_merge($messages,$normalmessage);
            $this->validate($rules,$messages);

        }

        else{
            
            $validatedDate = $this->validate([
               
                'design_name.0' => 'required',
                'design_description.0' => 'required',
                       
            ],  
            [
               
                'design_name.0.required' => 'Design name field is required',
                'design_description.0.required' => 'Description field is required',
               
    
            ]);
        }
   

     foreach ($this->design_name as $key => $value) 
     {

        $photo = $this->photos[$key];
        $design_photo_path = $photo->store('photo', 'public');

        $insert = DutyImported::create(['design_name' => $this->design_name[$key], 
        'design_description' => $this->design_description[$key], 
        'design_photo_path' => $design_photo_path,
        'design_order' => $key == 1,
        'gallery_id' => $this->design]);
    
    }



        // $this->imported->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $this->inputs = [];

        $this->resetInputFields();

        $msgAction = 'Imported Duty was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('imported.index');
    }

    public function render()
    {
        return view('livewire.imported.imported-create-edit');
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    private function resetInputFields(){
        $this->service_description = '';
        $this->design_name = '';
        $this->design_photo_path = '';
    }
}
