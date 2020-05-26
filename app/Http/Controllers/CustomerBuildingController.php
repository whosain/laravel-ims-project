<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\CustomerBuilding;
use DB;

class CustomerBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerBuilding::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($building){
   
                        // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$building->id.'" data-original-title="Edit" class="btn btn-primary btn-xs editBuilding"><i class="glyphicon glyphicon-edit"></i>Edit</a>';
   
                        // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$building->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteBuilding"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
     
                        $btn = '<div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$building->id.'" data-original-title="Edit" class="edit btn btn-sm editBuilding">Edit</a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$building->id.'" data-original-title="Delete" class="btn btn-sm deleteBuilding">Delete</a>
                            </li>
                        </ul>
                        </div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('buildings.index');
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
        CustomerBuilding::updateOrCreate(['id' => $request->id],['building_name' => $request->building_name]);        
   
                return response()->json([
                    'success'    => true,
                    'message'    => 'Building Created'
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
        $building = CustomerBuilding::find($id);
        return response()->json($building);
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
        CustomerBuilding::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Building Deleted'
        ]);
    }
}
