<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Domain;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use App\Exports\productExport;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

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
    public function importFormDartxtest(){
        $domaindata=Domain::all();
        $productdata = DB::select ('select * from product');
        return view('import-form-product')->with(['productdata'=>$productdata,'domains'=>$domaindata]);
    }

    public function importDartxtest(Request $request){
        $dom=$request->input('select_domain');
        $excelResult=Excel::import(new ProductImport,$request->file);
        $data = Excel::toArray(new ProductImport, $request->file)[0];

        foreach ($data as $dataItem) {
            $collection = collect($dataItem);
            $final=$collection->put('domain_id', $dom);
            print_r($final);
        }
        //return redirect()->back()->with('message', 'Records are imported successfully!');

    }
    public function exportIntoExcel(){
        Session::flash('message','Exported into Excel successfully');
        return Excel::download(new productExport,'dartxlist.xlsx');

    }
    public function exportIntoCSV(){
        Session::flash('message','Exported into CSV successfully');
        return Excel::download(new productExport,'dartxlist.csv');
    }
}
