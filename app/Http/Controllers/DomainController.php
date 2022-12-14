<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Domain;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $domainData=Domain::all();
        return view('domain')->with(['domainData'=>$domainData]);//if sending any data along with this then must add as parameter and pass for view method

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $name = $request->input('name');

        DB::insert('insert into domain (domain_name) values(?)',[$name]);
        return redirect()->back()->with('message', 'Records are inserted successfully!');
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'domain_name'	=>	$request->domain_name,
                );
                $userData= DB::table('domain')
                    ->where('id', $request->id)
                    ->update($data);

                return DataTables::of($userData)->make(true);

            }
            if($request->action == 'delete')
            {
                DB::table('domain')
                    ->where('id', $request->id)
                    ->delete();

            }
            return response()->json($request);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
