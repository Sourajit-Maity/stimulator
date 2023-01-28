<x-admin.form-section submit="saveOrUpdate" enctype="multipart/form-data">
    <x-slot name="form">
        <div class="">                     
            
                <div class="row">
                    <div class="col-lg-12">                        
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="type.0" placeholder="Type"   class="{{ $errors->has('type.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="type.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="subtype.0" placeholder="SubType"   class="{{ $errors->has('subtype.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="subtype.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="value.0" placeholder="Value"   class="{{ $errors->has('value.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="value.0" />
                        </x-admin.form-group>
                        <x-admin.form-group>
                            <!-- <x-admin.lable value="BCD" required/> -->
                                <x-admin.dropdown  wire:model.defer="bcd_rate.0" placeHolderText="Please select BCD" autocomplete="off" class="{{ $errors->has('bcd_rate.0') ? 'is-invalid' :'' }}">
                                    <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                            @if(isset($bcdList))
                                                @foreach($bcdList as $data)
                                                <x-admin.dropdown-item  :value="$data->id" :text="$data->bcd_percentage"/>
                                                @endforeach
                                            @endif
                                    </x-admin.dropdown>
                            <x-admin.input-error for="bcd_rate.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="bcd_amount.0" placeholder="Bcd Amount"   class="{{ $errors->has('bcd_amount.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="bcd_amount.0" />
                        </x-admin.form-group>
                        <x-admin.form-group>
                        <!-- <x-admin.lable value="SWS" required/> -->
                        <x-admin.dropdown  wire:model.defer="sws_rate.0" placeHolderText="Please select SWS" autocomplete="off" class="{{ $errors->has('sws_rate.0') ? 'is-invalid' :'' }}">
                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($swsList))
                                        @foreach($swsList as $ait)
                                        <x-admin.dropdown-item  :value="$ait->id" :text="$ait->sws_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                            <x-admin.input-error for="sws_rate.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="sws_amount.0" placeholder="Sws Amount"   class="{{ $errors->has('sws_amount.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="sws_amount.0" />
                        </x-admin.form-group>
                        <x-admin.form-group>
                        <!-- <x-admin.lable value="IGST" required/> -->
                            <x-admin.dropdown  wire:model.defer="igst_rate.0" placeHolderText="Please select Igst" autocomplete="off" class="{{ $errors->has('igst_rate.0') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @if(isset($igstList))
                                        @foreach($igstList as $rodt)
                                        <x-admin.dropdown-item  :value="$rodt->id" :text="$rodt->igst_percentage"/>
                                        @endforeach
                                    @endif
                            </x-admin.dropdown>
                        <x-admin.input-error for="igst_rate.0" />
                    </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="igst_amount.0" placeholder="Igst Amount"   class="{{ $errors->has('igst_amount.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="igst_amount.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="compensation_cess.0" placeholder="Compensation Cess"   class="{{ $errors->has('compensation_cess.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="compensation_cess.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="safeguard_duty.0" placeholder="Safeguard Duty"   class="{{ $errors->has('safeguard_duty.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="safeguard_duty.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="antidumping_duty.0" placeholder="Antidumping Duty"   class="{{ $errors->has('antidumping_duty.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="antidumping_duty.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="addl_duty_1.0" placeholder="Additional Duty u/s 3(1)"   class="{{ $errors->has('addl_duty_1.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="addl_duty_1.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="addl_duty_3.0" placeholder="Additional Duty u/s 3(3)"   class="{{ $errors->has('addl_duty_3.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="addl_duty_3.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="addl_duty_5.0" placeholder="Additional Duty u/s 3(5)"   class="{{ $errors->has('addl_duty_5.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="addl_duty_5.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="customs_duty.0" placeholder="Customs Duty"   class="{{ $errors->has('customs_duty.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="customs_duty.0" />
                        </x-admin.form-group>
                        <x-admin.form-group class="col-lg-6">    
                                <x-admin.input type="text" wire:model.defer="nccd.0" placeholder="NCCD"   class="{{ $errors->has('nccd.0') ? 'is-invalid' :'' }}" />
                                <x-admin.input-error for="nccd.0" />
                        </x-admin.form-group>
                    </div>                    
                </div>                   
                <div class="col-lg-12">
                    <button class="add-more" wire:click.prevent="add({{$i}})"><span class="icon-message-alt-add"></span>Add More</button>
                </div>
                  
        </div>
        @foreach($inputs as $key => $value)
            <div class="">               
                <div class="single-add-stage">
                    <div class="row">
                            <div class="col-lg-12">
                                <x-admin.form-group class="col-lg6">   
                                    <x-admin.input type="text" wire:model.defer="type.{{ $value }}" placeholder="Type"   class="{{ $errors->has('type.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="type.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="subtype.{{ $value }}" placeholder="SubType"   class="{{ $errors->has('subtype.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="subtype.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="value.{{ $value }}" placeholder="Value"   class="{{ $errors->has('value.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="value.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group>
                                <x-admin.dropdown  wire:model.defer="bcd_rate.{{ $value }}" placeHolderText="Please select BCD" autocomplete="off" class="{{ $errors->has('bcd_rate') ? 'is-invalid' :'' }}">
                                    <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                    @foreach($bcdList as $data)
                                        <x-admin.dropdown-item  :value="$data->id" :text="$data->bcd_percentage"/>
                                    @endforeach
                                </x-admin.dropdown>
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg6">   
                                    <x-admin.input type="text" wire:model.defer="bcd_amount.{{ $value }}" placeholder="Bcd Amount"   class="{{ $errors->has('bcd_amount.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="bcd_amount.{{ $value }}" />
                                </x-admin.form-group> 
                                <x-admin.form-group>
                                    <!-- <x-admin.lable value="SWS" required/> -->
                                    <x-admin.dropdown  wire:model.defer="sws_rate.{{ $value }}" placeHolderText="Please select SWS" autocomplete="off" class="{{ $errors->has('sws_rate') ? 'is-invalid' :'' }}">
                                        <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                                @if(isset($swsList))
                                                    @foreach($swsList as $ait)
                                                    <x-admin.dropdown-item  :value="$ait->id" :text="$ait->sws_percentage"/>
                                                    @endforeach
                                                @endif
                                        </x-admin.dropdown>
                                        <x-admin.input-error for="sws_rate.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="sws_amount.{{ $value }}" placeholder="Sws Amount"   class="{{ $errors->has('sws_amount.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="sws_amount.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group>
                                    <!-- <x-admin.lable value="IGST" required/> -->
                                        <x-admin.dropdown  wire:model.defer="igst_rate.{{ $value }}" placeHolderText="Please select Igst" autocomplete="off" class="{{ $errors->has('igst_rate') ? 'is-invalid' :'' }}">
                                            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                                @if(isset($igstList))
                                                    @foreach($igstList as $rodt)
                                                    <x-admin.dropdown-item  :value="$rodt->id" :text="$rodt->igst_percentage"/>
                                                    @endforeach
                                                @endif
                                        </x-admin.dropdown>
                                    <x-admin.input-error for="igst_rate.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="igst_amount.{{ $value }}" placeholder="Igst Amount"   class="{{ $errors->has('igst_amount.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="igst_amount.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg6">   
                                    <x-admin.input type="text" wire:model.defer="compensation_cess.{{ $value }}" placeholder="Compensation Cess"   class="{{ $errors->has('compensation_cess.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="compensation_cess.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="safeguard_duty.{{ $value }}" placeholder="Safeguard Duty"   class="{{ $errors->has('safeguard_duty.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="safeguard_duty.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="antidumping_duty.{{ $value }}" placeholder="Antidumping Duty"   class="{{ $errors->has('antidumping_duty.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="antidumping_duty.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg6">   
                                    <x-admin.input type="text" wire:model.defer="addl_duty_1.{{ $value }}" placeholder="Additional Duty u/s 3(1)"   class="{{ $errors->has('addl_duty_1.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="addl_duty_1.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="addl_duty_3.{{ $value }}" placeholder="Additional Duty u/s 3(3)"   class="{{ $errors->has('addl_duty_3.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="addl_duty_3.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="addl_duty_5.{{ $value }}" placeholder="Additional Duty u/s 3(5)"   class="{{ $errors->has('addl_duty_5.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="addl_duty_5.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg6">   
                                    <x-admin.input type="text" wire:model.defer="customs_duty.{{ $value }}" placeholder="Customs Duty"   class="{{ $errors->has('customs_duty.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="customs_duty.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-6">   
                                    <x-admin.input type="text" wire:model.defer="nccd.{{ $value }}" placeholder="NCCD"   class="{{ $errors->has('nccd.'.$value)? 'is-invalid' :'' }}" />
                                    <x-admin.input-error for="nccd.{{ $value }}" />
                                </x-admin.form-group>
                               
                            </div>            
                        </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                </div>       
            </div>
        @endforeach               
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" class="page-btn page-btn-primary" wire:loading.attr="disabled"><span><i class="icon-message-alt-add wrap_i"></i> Submit</span></x-admin.button>
    </x-slot>
</x-form-section>
@push('js')
<script>
        $(document).ready(function(){

            $(".only-numeric").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
                
            if (!(keyCode >= 48 && keyCode <= 57)) {
                $(".error").css("display", "inline");
                return false;
            }else{
                $(".error").css("display", "none");
            }
            });          
        
        });
        jQuery(document).ready(function($) {

        if (window.history && window.history.pushState) {

        window.history.pushState('forward', null);

        $(window).on('popstate', function() {
            alert('Changes that you made may not be saved.');
        });

        }
        });
    </script>
@endpush