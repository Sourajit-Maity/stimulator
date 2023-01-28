<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OverallSales;
use App\Models\Rodtep;
use App\Models\Air;
use App\Models\WasteScrap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Response,Config;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
class OverallsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.overall-sale.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rodtepList = Rodtep::get();
        $wasteList = WasteScrap::get();
        $aitList = Air::get();
        $overallsale = null;
        #return view('admin.overall-sale.create-edit',['overallsale'=>null]);
        return view('admin.overall-sale.create-edit',compact('rodtepList','aitList','wasteList','overallsale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
 
            'moreFields.*.product_name'  => 'required',
            'moreFields.*.description'  => 'required',
            'moreFields.*.hsn'  => 'required',
            'moreFields.*.export_value'  => 'required',
            'moreFields.*.sez_unit'  => 'required',
            'moreFields.*.dta'  => 'required',
            'moreFields.*.deemed_export'  => 'required',
            'moreFields.*.id'  => 'required',
            'moreFields.*.air_turnaround'  => 'required',
            'moreFields.*.brand_rate'  => 'required',
            'moreFields.*.taxability_under_gst'  => 'required',
            'moreFields.*.waste_scrap'  => 'required',
            'moreFields.*.air'  => 'required',
            'moreFields.*.rodtep'  => 'required',
            'moreFields.*.air_receivable'  => 'required',
        ]);
      

        
        foreach ($request->moreFields as $key => $value) {
            $air_per = Air::where('id',(int)$value['air'])->value('air_actual');
            $waste_per = WasteScrap::where('id',(int)$value['waste_scrap'])->value('waste_scrap_actual');
            $rodtep_per = Rodtep::where('id',(int)$value['rodtep'])->value('rodtep_actual'); 
          
            $air_amount = $value['export_value'] * $air_per;
            $rodtep_amount = $value['deemed_export'] * $rodtep_per;
            $waste_scrap_amount = $value['export_value'] * $waste_per;
            $sale_value_of_scrap = $waste_scrap_amount * 0.05;
            $value['air_amount'] = $air_amount;
            $value['rodtep_amount'] = $rodtep_amount;
            $value['waste_scrap_amount'] = $waste_scrap_amount;
            $value['sale_value_of_scrap'] = $sale_value_of_scrap;

            
            OverallSales::create($value);
      }


    #return Redirect::back()->with('success','You have successfully submitted.');
    return redirect()->route('overall-sale.index')->with('success','You have successfully submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $overallsale = OverallSales::findOrFail($id);
        return view('admin.overall-sale.edit',compact('overallsale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
