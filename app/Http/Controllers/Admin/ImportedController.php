<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DutyImported;
use App\Models\OverallSales;
use App\Models\Bcd;
use App\Models\Cgst;
use App\Models\Igst;
use App\Models\Sgst;
use App\Models\Sws;
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
class ImportedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.imported.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // return view('admin.imported.create-edit',['imported'=>null]);
        $imported = null;
        $overall_id = $id;       
        $saleList = OverallSales::get();
        $bcdList = Bcd::get();
        $swsList = Sws::get();
        $igstList = Igst::get();
        return view('admin.imported.create-edit',compact('overall_id','imported','saleList','igstList','bcdList','swsList'));
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
 
            'moreFields.*.type'  => 'required',
            'moreFields.*.subtype'  => 'required',
            'moreFields.*.value'  => 'required',
            'moreFields.*.bcd_rate'  => 'required',
            'moreFields.*.sws_rate'  => 'required',
            'moreFields.*.igst_rate'  => 'required',
            'moreFields.*.compensation_cess'  => 'required',
            'moreFields.*.id'  => 'required',
            'moreFields.*.safeguard_duty'  => 'required',
            'moreFields.*.antidumping_duty'  => 'required',
            'moreFields.*.addl_duty_1'  => 'required',
            'moreFields.*.addl_duty_3'  => 'required',
            'moreFields.*.addl_duty_5'  => 'required',
            'moreFields.*.customs_duty'  => 'required',
            'moreFields.*.nccd'  => 'required',
            'moreFields.*.overall_sale_id'  => 'required',
        ]);
      

        
        foreach ($request->moreFields as $key => $value) {
            $bcd_per = Bcd::where('id',(int)$value['bcd_rate'])->value('bcd_actual');
            $sws_per = Sws::where('id',(int)$value['sws_rate'])->value('sws_actual');
            $igst_per = Igst::where('id',(int)$value['igst_rate'])->value('igst_actual');           
            $bcd_amount = $value['value'] * $bcd_per;
            $sws_amount = $value['value'] * $sws_per;
            $igst_amount = $value['value'] * $igst_per;
            $value['bcd_amount'] = $bcd_amount;
            $value['sws_amount'] = $sws_amount;
            $value['igst_amount'] = $igst_amount;            
            DutyImported::create($value);
      }


    #return Redirect::back()->with('success','You have successfully submitted.');
    return redirect()->route('imported.index')->with('success','You have successfully submitted.');
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
    public function edit(DutyImported $imported)
    {
        return view('admin.imported.edit',compact('imported'));
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
