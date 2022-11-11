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
                        <x-admin.input type="text" wire:model.defer="sez_unit" placeholder="sez unit"  class="{{ $errors->has('sez_unit') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="sez_unit" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Dta"  required />
                        <x-admin.input type="text" wire:model.defer="dta" placeholder="dta"  class="{{ $errors->has('dta') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="dta" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Deemed export" required />
                        <x-admin.input type="text" wire:model.defer="deemed_export" placeholder="Deemed export" autocomplete="off" class="{{ $errors->has('deemed_export') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="deemed_export" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Taxability under Gst" required />
                        <x-admin.input type="text" wire:model.defer="taxability_under_gst" placeholder="taxability under gst" autocomplete="off" class="{{ $errors->has('taxability_under_gst') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="taxability_under_gst" />
                    </x-admin.form-group>


                    <x-admin.form-group>
                        <x-admin.lable value="Air" required />
                        <x-admin.input type="text" wire:model.defer="air" placeholder="Air"  class="{{ $errors->has('air') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="air" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Waste scrap"  required />
                        <x-admin.input type="text" wire:model.defer="waste_scrap" placeholder="waste scrap"  class="{{ $errors->has('waste_scrap') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="waste_scrap" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Rodtep" required />
                        <x-admin.input type="text" wire:model.defer="rodtep" placeholder="Rodtep" autocomplete="off" class="{{ $errors->has('rodtep') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="rodtep" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Air receivable" required />
                        <x-admin.input type="text" wire:model.defer="air_receivable" placeholder="air receivable" autocomplete="off" class="{{ $errors->has('air_receivable') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="air_receivable" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Air turnaround" required />
                        <x-admin.input type="text" wire:model.defer="air_turnaround" placeholder="air turnaround" autocomplete="off" class="{{ $errors->has('air_turnaround') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="air_turnaround" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Brand_rate" required />
                        <x-admin.input type="text" wire:model.defer="brand_rate" placeholder="brand rate" autocomplete="off" class="{{ $errors->has('brand_rate') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="brand_rate" />
                    </x-admin.form-group>
                   
                   
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
