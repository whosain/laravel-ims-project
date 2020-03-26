<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
use DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $companies = Company::all();
        // return view('companies.index');
        // return response()->json($companies);
        if ($request->ajax()) {
            $data = Company::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($company){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$company->id.'" data-original-title="Edit" class="btn btn-primary btn-xs editCompany"><i class="glyphicon glyphicon-edit"></i>Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$company->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteCompany"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('companies.index');
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
       
       
        Company::updateOrCreate(['id' => $request->id],
        ['company_name' => $request->company_name,'company_alias'=>$request->company_alias]);        

       
        return response()->json([
            'success'    => true,
            'message'    => 'Company Created'
        ]);
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $companies = Company::all();
        // return Datatables::of($companies)
        //     ->addColumn('action', function($companies){
        //         return '<a onclick="editForm('. $companies->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
        //                '<a onclick="deleteData('. $companies->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        //     })
        //     ->rawColumns(['action'])->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return response()->json($companies);
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
        // $this->validate($request, [
        //     'company_name'      => 'required|string|min:2',
        //     'company_alias'    => 'required|string|min:2',
        // ]);

        // $company = Company::findOrFail($id);

        // $company->update($request->all());

        // return response()->json([
        //     'success'    => true,
        //     'message'    => 'Company Updated'
        // ]);

        Company::updateOrCreate(['id' => $request->id],
                ['company_name' => $request->company_name,'company_alias'=>$request->company_alias]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();

        return response()->json([
            'success'    => true,
            'message'    => 'Company Delete'
        ]);
    }
}
