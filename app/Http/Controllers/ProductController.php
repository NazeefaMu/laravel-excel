<?php

namespace App\Http\Controllers;

use App\Exports\BigcommerceExport;
use App\Exports\MagentoExport;
use App\Exports\ShopifyExport;
use App\Exports\WoocommerceExport;
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
    public function exportIntoCSV(Request $request){
        $framework=$request->input('select_framework');
        $domain=$request->input('select_domain_export');

        switch ($framework){
            case "1";
                return Excel::download(new MagentoExport($domain),'MagentoProducts.csv');

                break;
            case "2";
                return Excel::download(new WoocommerceExport($domain),'WoocommerceProducts.csv');
                break;
            case "3";
                return Excel::download(new ShopifyExport($domain),'ShopifyProducts.csv');
                break;
            case "4";
                return Excel::download(new BigcommerceExport($domain),'BigCommerceProducts.csv');
                break;
        }
    }
}
