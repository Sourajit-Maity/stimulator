<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Waste scrap Percentage" required />
                        <x-admin.input type="text" wire:model.defer="waste_scrap_percentage" placeholder="Waste scrap Percentage"  class="{{ $errors->has('waste_scrap_percentage') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="waste_scrap_percentage" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Waste scrap Actual"  required />
                        <x-admin.input type="text" wire:model.defer="waste_scrap_actual" placeholder="Waste scrap Actual"  class="{{ $errors->has('waste_scrap_actual') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="waste_scrap_actual" />
                    </x-admin.form-group>
                   
                    <x-admin.form-group>
                        <x-admin.lable value="Status" />
                        <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                                @foreach ($statusList as $status)
                                    <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="active" />
                    </x-admin.form-group>
                  
                  
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('waste-scrap.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
