<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\CustomerSvn;
use DB;

class CustomerSvnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('master_customer_svn')
		            ->join('master_company', 'master_customer_svn.company_id', '=', 'master_company.id')
		            ->select('master_customer_svn.id','master_company.company_name', 'master_customer_svn.name', 'master_customer_svn.name_short','master_customer_svn.phone','address','master_customer_svn.notes')
		            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-xs editCustomer"><i class="glyphicon glyphicon-edit"></i>Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteCustomer"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

      	$temp['company'] = DB::select('select * from master_company');
        return view('customers.index')->with($temp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomerSvn::updateOrCreate(['id' => $request->id],
        ['company_id' => $request->company,
        'name'=>$request->customer_name,
        'name_short'=>$request->customer_short,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'notes'=>$request->note
        ]);        
   
        return response()->json([
            'success'    => true,
            'message'    => 'Customer Updated'
        ]);
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
        $customers = CustomerSvn::find($id);
        return response()->json($customers);
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
        CustomerSvn::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Customer Deleted'
        ]);
    }
}
