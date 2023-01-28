<x-admin-layout title="Domestic Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $domestic ? 'Edit' : 'Add' }} Domestic">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('domestic.index') }}" value="Domestic List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $domestic ? 'Edit' : 'Add' }} Domestic" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
th,td{
  min-width:200px !important;
}
</style>

<div class="container">
<div class="card mt-3">
<div class="card-header"></div>
<div class="card-body">
<form action="{{ url('domestic-store') }}" method="POST">
@csrf
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success text-center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
<p>{{ Session::get('success') }}</p>
</div>
@endif
<div class="text-right">
  <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
</div>
<table class="table table-bordered table-responsive" id="dynamicAddRemove">  
<tr>
<th>Type</th>
<th>Subtype</th>
<th>Value</th>
<th>CGST Rate</th>
<!-- <th>BCD Amount</th> -->
<th>SGST Rate</th>
<!-- <th>SWS Amount</th> -->
<th>IGST Rate</th>
<!-- <th>IGST Amount</th> -->
<th>Compensation Cess</th>
<th>Customs Duty in Supply Chain</th>
<th>Action</th>
</tr>
<tr>  
 <td><input type="text" name="moreFields[0][type]" placeholder="Enter Type Name" class="form-control" />
 <input type="hidden" name="moreFields[0][id]" value="{{ Auth::user()->id }}" class="form-control" /></td> 
 <input type="hidden" name="moreFields[0][overall_sale_id]" value="{{ $overall_id }}" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][subtype]" placeholder="Enter Subtype" class="form-control" /></td>  
 <td><input type="text" name="moreFields[0][value]" placeholder="Enter value" class="form-control" /></td> 
 <td>
    <select id='cgst_rate' name="moreFields[0][cgst_rate]" class="field-style field-split25 align-left  form-control" >
			<option value="" disabled selected>Select CGST Rate</option>      
			@foreach($cgstList as $data)
                <option value="{{$data->id}}">{{$data->cgst_percentage}}</option>
            @endforeach     
	</select> 
 </td>
 <td>
    <select id='sgst_rate' name="moreFields[0][sgst_rate]" class="field-style field-split25 align-left  form-control" >
			<option value="" disabled selected>Select SGST Rate</option>      
			@foreach($sgstList as $data)
                <option value="{{$data->id}}">{{$data->sgst_percentage}}</option>
            @endforeach     
	</select> 
 </td>
 <td>
    <select id='igst_rate' name="moreFields[0][igst_rate]" class="field-style field-split25 align-left  form-control" >
			<option value="" disabled selected>Select IGST Rate</option>      
			@foreach($igstList as $rodt)
                <option value="{{$rodt->id}}">{{$rodt->igst_percentage}}</option>
            @endforeach     
	</select> 
 </td>
 <td><input type="text" name="moreFields[0][compensation_cess]" placeholder="Enter Compensation Cess" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][customs_duty]" placeholder="Enter Customs" class="form-control" /></td> 
 
</tr>  
</table> 
<button type="submit" class="btn btn-success">Save</button>
</form>
</div>
</div>
</div>
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][type]" placeholder="Enter Type Name" class="form-control"/><input type="hidden" name="moreFields['+i+'][overall_sale_id]" value="{{ $overall_id }}" class="form-control"/><input type="hidden" name="moreFields['+i+'][id]" value="{{ Auth::user()->id }}" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][subtype]" placeholder="Enter Subtype" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][value]" placeholder="Enter value" class="form-control"/></td><td><select id="cgst_rate"name="moreFields['+i+'][cgst_rate]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select CGST Rate</option>@foreach($cgstList as $data)<option value="{{$data->id}}">{{$data->cgst_percentage}}</option>@endforeach</select></td><td><select id="sgst_rate"name="moreFields['+i+'][sgst_rate]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select SGST Rate</option>@foreach($sgstList as $data)<option value="{{$data->id}}">{{$data->sgst_percentage}}</option>@endforeach</select></td><td><select id="igst_rate"name="moreFields['+i+'][igst_rate]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select IGST Rate</option>@foreach($igstList as $rodt)<option value="{{$rodt->id}}">{{$rodt->igst_percentage}}</option>@endforeach</select></td><td><input type="text" name="moreFields['+i+'][compensation_cess]" placeholder="Enter Compensation Cess" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][customs_duty]" placeholder="Enter Customs" class="form-control"/></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>
</x-admin-layout>
