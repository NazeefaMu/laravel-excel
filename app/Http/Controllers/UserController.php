<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userdata=User::all();
        return view('user')->with(['userdata'=>$userdata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $encodedPassword=Hash::make($password);

        DB::insert('insert into users (name,email,password) values(?,?,?)',[$name,$email,$encodedPassword]);
        return redirect()->back()->with('message', 'Records are inserted successfully!');
    }
    function action(Request $request)
    {

        if($request->ajax())
        {
            if($request->action == 'edit')
            {

                $data = array(
                    'name'	=>	$request->name,
                    'email'		=>	$request->email,

                );
                $userData= DB::table('users')
                    ->where('id', $request->id)
                    ->update($data);

                return DataTables::of($userData)->make(true);

            }
            if($request->action == 'delete')
            {
                DB::table('users')
                    ->where('id', $request->id)
                    ->delete();

            }
            return response()->json($request);
        }
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
