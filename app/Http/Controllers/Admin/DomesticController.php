<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DutyDomestic;
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
class DomesticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.domestic.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $domestic = null;
        $overall_id = $id;       
        $saleList = OverallSales::get();
        $sgstList = Sgst::get();
        $cgstList = Cgst::get();
        $igstList = Igst::get();
        return view('admin.domestic.create-edit',compact('overall_id','domestic','saleList','igstList','cgstList','sgstList'));
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
            'moreFields.*.value'  => 'required|numeric',
            'moreFields.*.cgst_rate'  => 'required',
            'moreFields.*.sgst_rate'  => 'required',
            'moreFields.*.igst_rate'  => 'required',
            'moreFields.*.compensation_cess'  => 'required',
            'moreFields.*.id'  => 'required',
            'moreFields.*.customs_duty'  => 'required',
            'moreFields.*.overall_sale_id'  => 'required',
        ]);
      

        
        foreach ($request->moreFields as $key => $value) {
            $sgst_per = Sgst::where('id',(int)$value['sgst_rate'])->value('sgst_actual');
            $cgst_per = Cgst::where('id',(int)$value['cgst_rate'])->value('cgst_actual');
            $igst_per = Igst::where('id',(int)$value['igst_rate'])->value('igst_actual');           
            $cgst_amount = $value['value'] * $cgst_per;
            $sgst_amount= $value['value'] * $sgst_per;
            $igst_amount = $value['value'] * $igst_per;
            $value['cgst_amount'] = $cgst_amount;
            $value['sgst_amount'] = $sgst_amount;
            $value['igst_amount'] = $igst_amount;            
            DutyDomestic::create($value);
      }


    return redirect()->route('domestic.index')->with('success','You have successfully submitted.');
    
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
    public function edit(DutyDomestic $domestic)
    {
        return view('admin.domestic.edit',compact('domestic'));
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
