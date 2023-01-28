<x-admin-layout title="Overall Sale Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $overallsale ? 'Edit' : 'Add' }} Overall Sale">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('overall-sale.index') }}" value="Overall Sale List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $overallsale ? 'Edit' : 'Add' }} Overall Sale" />

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
<form action="{{ url('overall-sale-store') }}" method="POST">
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
<th>Product Name</th>
<th>Description</th>
<th>Hsn</th>
<th>Export value</th>
<th>Sez Unit</th>
<th>Dta</th>
<th>Deemed export</th>
<th>Air Turnaround</th>
<th>Brand Rate</th>
<th>Taxability under Gst</th>
<th>AIR Receivable</th>
<th>Waste Scrap</th>
<th>Rodtep</th>
<th>AIR</th>
<!-- <th>AIR Amount</th>
<th>RoDTEP Amount</th>
<th>Waste Scrap Amount</th>
<th>Sale value of Scrap Amount</th> -->
<th>Action</th>
</tr>
<tr>  
 <td><input type="text" name="moreFields[0][product_name]" placeholder="Enter Product Name" class="form-control" />
 <input type="hidden" name="moreFields[0][id]" value="{{ Auth::user()->id }}" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][description]" placeholder="Enter Description" class="form-control" /></td>  
 <td><input type="text" name="moreFields[0][hsn]" placeholder="Enter Hsn" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][export_value]" placeholder="Enter Export value" class="form-control" /></td>  
 <td><input type="text" name="moreFields[0][sez_unit]" placeholder="Enter Sez Unit" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][dta]" placeholder="Enter Dta" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][deemed_export]" placeholder="Enter Deemed export" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][air_turnaround]" placeholder="Enter Air Turnaround" class="form-control" /></td> 
 <td><input type="text" name="moreFields[0][brand_rate]" placeholder="Enter Brand Rate" class="form-control" /></td> 
 <td>
    <select id='taxability_under_gst' name="moreFields[0][taxability_under_gst]" class="field-style field-split25 align-left  form-control" >
		<option value="" disabled selected>Select Taxability under Gst</option>      
		<option value="1">Taxable</option>      
		<option value="0">Exempt</option>      
	</select> 
 </td> 
 <td>
    <select id='air_receivable' name="moreFields[0][air_receivable]" class="field-style field-split25 align-left  form-control" >
		<option value="" disabled selected>Select AIR receivable</option>      
		<option value="1">Yes</option>      
		<option value="0">No</option>      
	</select> 
 </td> 
 <td>
    <select id='waste_scrap' name="moreFields[0][waste_scrap]" class="field-style field-split25 align-left  form-control" >
		<option value="" disabled selected>Select Waste Scrap</option>      
			@foreach($wasteList as $waste)
                <option value="{{$waste->id}}">{{$waste->waste_scrap_percentage}}</option>
            @endforeach       
	</select> 
 </td>
 <td>
    <select id='air' name="moreFields[0][air]" class="field-style field-split25 align-left  form-control" >
		<option value="" disabled selected>Select AIR</option>      
			@foreach($aitList as $ait)
                <option value="{{$ait->id}}">{{$ait->air_percentage}}</option>
            @endforeach       
	</select> 
 </td>
 <td>
    <select id='rodtep' name="moreFields[0][rodtep]" class="field-style field-split25 align-left  form-control" >
		<option value="" disabled selected>Select Rodtep</option>      
			@foreach($rodtepList as $List)
                <option value="{{$List->id}}">{{$List->rodtep_percentage}}</option>
            @endforeach       
	</select> 
 </td>
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
$("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][product_name]" placeholder="Enter Product Name" class="form-control"/><input type="hidden" name="moreFields['+i+'][id]" value="{{ Auth::user()->id }}" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][description]" placeholder="Enter Description" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][hsn]" placeholder="Enter Hsn" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][export_value]" placeholder="Enter Export Value" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][sez_unit]" placeholder="Enter Sez Unit" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][dta]" placeholder="Enter Dta" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][deemed_export]" placeholder="Enter Deemed Export" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][air_turnaround]" placeholder="Enter Air Turnaround" class="form-control"/></td><td><input type="text" name="moreFields['+i+'][brand_rate]" placeholder="Enter Brand Rate" class="form-control"/></td><td><select id="taxability_under_gst"name="moreFields['+i+'][taxability_under_gst]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select Taxability under Gst</option><option value="1">Taxable</option><option value="0">Exempt</option></select></td><td><select id="air_receivable"name="moreFields['+i+'][air_receivable]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select AIR receivable</option><option value="1">Yes</option><option value="0">No</option></select></td><td><select id="waste_scrap"name="moreFields['+i+'][waste_scrap]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select Waste Scrap</option>@foreach($wasteList as $waste)<option value="{{$waste->id}}">{{$waste->waste_scrap_percentage}}</option>@endforeach</select></td><td><select id="air"name="moreFields['+i+'][air]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select AIR</option>@foreach($aitList as $ait)<option value="{{$ait->id}}">{{$ait->air_percentage}}</option>@endforeach</select></td><td><select id="rodtep"name="moreFields['+i+'][rodtep]" class="field-style field-split25 align-left  form-control" ><option value="" disabled selected>Select Rodtep Percentage</option>@foreach($rodtepList as $List)<option value="{{$List->id}}">{{$List->rodtep_percentage}}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>
</x-admin-layout>