<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view ('supplier.index', ['pensupply'=>$supplier]);
    }

    public function listData(){
        $supplier = Supplier::orderBy('id_supplier', 'desc')->get();
        $no = 0;
        foreach ($supplier as $list ) {
            $no++;
            $row = [];
            $row []= $no;
            $row []= $list->nama_supplier;
            $row []= $list->alamat;
            $row []= $list->telpon;
            $row [] = '<div class="btn-group">
            <button class="edit-modal btn btn-info" data-id='.$list->id_supplier.' data-nama='.$list->nama_supplier.' data-alamat='.$list->alamat.' data-telpon='.$list->telpon.' >
             <span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button class="delete-modal btn btn-danger" data-id='.$list->id_supplier.' data-supplier='.$list->nama_supplier.'>
            <span class="glyphicon glyphicon-trash"></span> Delete</button> </div>';

            $data [] = $row;
            $output = array('data' => $data);


        }
        return response()->json($output);
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
        $supplier = new Supplier;
        $supplier->nama_supplier = $request['nama_supplier'];
        $supplier->alamat = $request['alamat'];
        $supplier->telpon = $request['telpon'];
        $supplier->save();
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
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request['nama_supplier'];
        $supplier->alamat = $request['alamat'];
        $supplier->telpon = $request['telpon'];
        $supplier->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
