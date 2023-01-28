<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Overall Sale" />
                            <x-admin.dropdown  wire:model.defer="overall_sale_id" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('overall_sale_id') ? 'is-invalid' :'' }}">
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
                        <x-admin.lable value="BCD" required/>
                        <x-admin.dropdown  wire:model.defer="bcd_rate" placeHolderText="Please select BCD" autocomplete="off" class="{{ $errors->has('bcd_rate') ? 'is-invalid' :'' }}">
                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($bcdList))
                                        @foreach($bcdList as $data)
                                        <x-admin.dropdown-item  :value="$data->id" :text="$data->bcd_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="bcd_rate" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Bcd Amount" required />
                        <x-admin.input type="text" wire:model.defer="bcd_amount" placeholder="Bcd Amount"  class="{{ $errors->has('bcd_amount') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="bcd_amount" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="SWS" required/>
                        <x-admin.dropdown  wire:model.defer="sws_rate" placeHolderText="Please select SWS" autocomplete="off" class="{{ $errors->has('sws_rate') ? 'is-invalid' :'' }}">
                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($swsList))
                                        @foreach($swsList as $ait)
                                        <x-admin.dropdown-item  :value="$ait->id" :text="$ait->sws_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                            <x-admin.input-error for="sws_rate" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Sws Amount" required />
                        <x-admin.input type="text" wire:model.defer="sws_amount" placeholder="Sws Amount" autocomplete="off" class="{{ $errors->has('sws_amount') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="sws_amount" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="IGST" required/>
                            <x-admin.dropdown  wire:model.defer="igst_rate" placeHolderText="Please select Igst" autocomplete="off" class="{{ $errors->has('igst_rate') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($igstList))
                                        @foreach($igstList as $rodt)
                                        <x-admin.dropdown-item  :value="$rodt->id" :text="$rodt->igst_percentage"/>
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
                        <x-admin.lable value="Safeguard Duty" required />
                        <x-admin.input type="text" wire:model.defer="safeguard_duty" placeholder="Safeguard Duty" autocomplete="off" class="{{ $errors->has('safeguard_duty') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="safeguard_duty" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Antidumping Duty" required />
                        <x-admin.input type="text" wire:model.defer="antidumping_duty" placeholder="Antidumping Duty" autocomplete="off" class="{{ $errors->has('antidumping_duty') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="antidumping_duty" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Additional Duty u/s 3(1)" required />
                        <x-admin.input type="text" wire:model.defer="addl_duty_1" placeholder="Additional Duty u/s 3(1)" autocomplete="off" class="{{ $errors->has('addl_duty_1') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="addl_duty_1" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Additional Duty u/s 3(3)" required />
                        <x-admin.input type="text" wire:model.defer="addl_duty_3" placeholder="Additional Duty u/s 3(3)" autocomplete="off" class="{{ $errors->has('addl_duty_3') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="addl_duty_3" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Additional Duty u/s 3(5)" required />
                        <x-admin.input type="text" wire:model.defer="addl_duty_5" placeholder="Additional Duty u/s 3(5)" autocomplete="off" class="{{ $errors->has('addl_duty_5') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="addl_duty_5" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Customs Duty" required />
                        <x-admin.input type="text" wire:model.defer="customs_duty" placeholder="Customs Duty" autocomplete="off" class="{{ $errors->has('customs_duty') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="customs_duty" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="NCCD" required />
                        <x-admin.input type="text" wire:model.defer="nccd" placeholder="NCCD" autocomplete="off" class="{{ $errors->has('nccd') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="nccd" />
                    </x-admin.form-group>
                   
                   
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('imported.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
