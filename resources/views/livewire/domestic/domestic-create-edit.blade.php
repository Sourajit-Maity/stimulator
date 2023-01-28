<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Overall Sale" />
                            <x-admin.dropdown  wire:model.defer="overall_sale_id" readonly disabled placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('overall_sale_id') ? 'is-invalid' :'' }}">
                                 <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                @if(isset($saleList))
                                    @foreach ($saleList as $status)
                                        <x-admin.dropdown-item  :value="$status->id" :text="$status->product_name"/>
                                    @endforeach
                                @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="overall_sale_id" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Type" required />
                        <x-admin.input type="text" wire:model.defer="type" placeholder="Type"  class="{{ $errors->has('type') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="type" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Subtype"  required />
                        <x-admin.input type="text" wire:model.defer="subtype" placeholder="Subtype"  class="{{ $errors->has('subtype') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="subtype" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Value" required />
                        <x-admin.input type="text" wire:model.defer="value" placeholder="value" autocomplete="off" class="{{ $errors->has('value') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="value" />
                    </x-admin.form-group>
                   
                    <x-admin.form-group>
                        <x-admin.lable value="Cgst" required/>
                            <x-admin.dropdown  wire:model.defer="cgst_rate" placeHolderText="Please select Cgst" autocomplete="off" class="{{ $errors->has('cgst_rate') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($cgstList))
                                        @foreach($cgstList as $data)
                                        <x-admin.dropdown-item  :value="$data->id" :text="$data->cgst_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="cgst_rate" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Cgst Amount" required />
                        <x-admin.input type="text" wire:model.defer="cgst_amount" placeholder="Cgst Amount"  class="{{ $errors->has('cgst_amount') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="cgst_amount" />
                    </x-admin.form-group>
                    
                    <x-admin.form-group>
                        <x-admin.lable value="Sgst" required/>
                            <x-admin.dropdown  wire:model.defer="sgst_rate" placeHolderText="Please select Sgst" autocomplete="off" class="{{ $errors->has('sgst_rate') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($sgstList))
                                        @foreach($sgstList as $data)
                                        <x-admin.dropdown-item  :value="$data->id" :text="$data->sgst_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="sgst_rate" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Sgst Amount" required />
                        <x-admin.input type="text" wire:model.defer="sgst_amount" placeholder="Sgst Amount" autocomplete="off" class="{{ $errors->has('sgst_amount') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="sgst_amount" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="IGST" required/>
                            <x-admin.dropdown  wire:model.defer="igst_rate" placeHolderText="Please select Igst" autocomplete="off" class="{{ $errors->has('igst_rate') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($igstList))
                                        @foreach($igstList as $data)
                                        <x-admin.dropdown-item  :value="$data->id" :text="$data->igst_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="igst_rate" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="IGST Amount" required />
                        <x-admin.input type="text" wire:model.defer="igst_amount" placeholder="IGST Amount" autocomplete="off" class="{{ $errors->has('igst_amount') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="igst_amount" />
                    </x-admin.form-group>
                    
                  
                    <x-admin.form-group>
                        <x-admin.lable value="Compensation Cess" required />
                        <x-admin.input type="text" wire:model.defer="compensation_cess" placeholder="Compensation Cess" autocomplete="off" class="{{ $errors->has('compensation_cess') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="compensation_cess" />
                    </x-admin.form-group>

                   
                    <x-admin.form-group>
                        <x-admin.lable value="Customs Duty" required />
                        <x-admin.input type="text" wire:model.defer="customs_duty" placeholder="Customs Duty" autocomplete="off" class="{{ $errors->has('customs_duty') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="customs_duty" />
                    </x-admin.form-group>                   
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('domestic.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
