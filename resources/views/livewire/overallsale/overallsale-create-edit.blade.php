<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Product Name" required />
                        <x-admin.input type="text" wire:model.defer="product_name" placeholder="Product Name"  class="{{ $errors->has('product_name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="product_name" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Description"  required />
                        <x-admin.input type="text" wire:model.defer="description" placeholder="Description"  class="{{ $errors->has('description') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="description" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Hsn" required />
                        <x-admin.input type="text" wire:model.defer="hsn" placeholder="Hsn" autocomplete="off" class="{{ $errors->has('hsn') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="hsn" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Export value" required />
                        <x-admin.input type="text" wire:model.defer="export_value" placeholder="Export value" autocomplete="off" class="{{ $errors->has('export_value') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="export_value" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Sez unit" required />
                        <x-admin.input type="text" wire:model.defer="sez_unit" placeholder="Sez unit"  class="{{ $errors->has('sez_unit') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="sez_unit" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Dta"  required />
                        <x-admin.input type="text" wire:model.defer="dta" placeholder="Dta"  class="{{ $errors->has('dta') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="dta" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Deemed export" required />
                        <x-admin.input type="text" wire:model.defer="deemed_export" placeholder="Deemed export" autocomplete="off" class="{{ $errors->has('deemed_export') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="deemed_export" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Taxability under Gst" />
                            <x-admin.dropdown  wire:model.defer="taxability_under_gst" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('taxability_under_gst') ? 'is-invalid' :'' }}">
                                    @foreach ($taxabilityList as $status)
                                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                                    @endforeach
                            </x-admin.dropdown>
                        <x-admin.input-error for="taxability_under_gst" />
                    </x-admin.form-group>
                    

                    <x-admin.form-group>
                        <x-admin.lable value="Waste scrap" required/>
                        <x-admin.dropdown  wire:model.defer="waste_scrap" placeHolderText="Please select Waste scrap" autocomplete="off" class="{{ $errors->has('waste_scrap') ? 'is-invalid' :'' }}">
                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($wasteList))
                                        @foreach($wasteList as $waste)
                                        <x-admin.dropdown-item  :value="$waste->id" :text="$waste->waste_scrap_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="waste_scrap" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Air" required/>
                        <x-admin.dropdown  wire:model.defer="air" placeHolderText="Please select state" autocomplete="off" class="{{ $errors->has('air') ? 'is-invalid' :'' }}">
                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($aitList))
                                        @foreach($aitList as $ait)
                                        <x-admin.dropdown-item  :value="$ait->id" :text="$ait->air_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                            <x-admin.input-error for="air" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Rodtep" required/>
                            <x-admin.dropdown  wire:model.defer="rodtep" placeHolderText="Please select Rodtep" autocomplete="off" class="{{ $errors->has('rodtep') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($rodtepList))
                                        @foreach($rodtepList as $rodt)
                                        <x-admin.dropdown-item  :value="$rodt->id" :text="$rodt->rodtep_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="rodtep" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="AIR receivable" />
                            <x-admin.dropdown  wire:model.defer="air_receivable" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('air_receivable') ? 'is-invalid' :'' }}">
                                    @foreach ($airreceiveList as $status)
                                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                                    @endforeach
                            </x-admin.dropdown>
                        <x-admin.input-error for="air_receivable" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Air turnaround" required />
                        <x-admin.input type="text" wire:model.defer="air_turnaround" placeholder="Air Turnaround" autocomplete="off" class="{{ $errors->has('air_turnaround') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="air_turnaround" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Brand Rate" required />
                        <x-admin.input type="text" wire:model.defer="brand_rate" placeholder="Brand Rate" autocomplete="off" class="{{ $errors->has('brand_rate') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="brand_rate" />
                    </x-admin.form-group>
                   
                   
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('overall-sale.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
