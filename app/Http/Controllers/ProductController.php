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
    public function importFormProducts(){
        $domaindata=Domain::all();
        $productdata = DB::select ('select * from product');
        return view('import-form-product')->with(['productdata'=>$productdata,'domains'=>$domaindata]);
    }

    public function importProducts(Request $request){
        $dom=$request->input('select_domain');
        $excelResult=Excel::import(new ProductImport,$request->file);//inserted to DB in ProductImport.php
        $data = Excel::toArray(new ProductImport, $request->file)[0];

        foreach ($data as $dataItem) {//get values in excel sheet
            $collection = collect($dataItem);
            Product::updateOrCreate(//create or update domain_id for each iteration and sku
                [
                    'sku' => $collection['sku'],
                ],
                [
                    'domain_id' => $dom,
                ]
            );
        }
        return redirect()->back()->with('message', 'Records are imported successfully!');

    }
    public function exportIntoExcel(Request $request){
        $framework=$request->input('select_framework');
        //Session::flash('message','Exported into Excel successfully');
        switch ($framework){
            case "1";
                return Excel::download(new productExport,'WordpressProducts.xlsx');
                break;
            case "2";
                return Excel::download(new productExport,'ShopifyProducts.xlsx');
                break;
            case "3";
                return Excel::download(new productExport,'MagentoProducts.xlsx');
                break;
            case "4";
                return Excel::download(new productExport,'BigCommerceProducts.xlsx');
                break;
        }
        //return Excel::download(new productExport,'productlist.xlsx');
    }
    public function exportIntoCSV(Request $request){
        $dom1=$request->input('select_framework');
        Session::flash('message','Exported into CSV successfully');
        return Excel::download(new productExport,'productlist.csv');
    }
}
