<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Pembelian;
use App\Supplier;
use App\Produk;
use App\PembelianDetail;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $supplier = Supplier::all();
        return view ('pembelian.index', compact('supplier', 'produk'));

    }

    public function listData()
    {

        $pembelian = Pembelian::leftJoin('supplier', 'supplier.id_supplier', '=', 'pembelian.id_supplier')
        ->orderBy('pembelian.id_pembelian', 'desc')
        ->get();

        $no = 0;
        $data = array();
        foreach($pembelian as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = substr($list->created_at, 0, 10);
            $row[] = $list->kode_produk;
            $row[] = $list->nama_supplier;
            $row[] = $list->total_item;
            $row[] = $list->total_harga;
            $row[] = $list->diskon."%";
            $row[] = $list->bayar;
            $row[] = '<div class="btn-group">
            <button class="edit-modal btn btn-info" data-id='.$list->id_pembelian.' data-kode='.$list->kode_produk.' data-nama='.$list->nama_supplier.' data-item='.$list->total_item.' data-harga='.$list->total_harga.' >
            <span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button class="delete-modal btn btn-danger" data-id='.$list->id_pembelian.' data-pembelian='.$list->nama_supplier.'>
            <span class="glyphicon glyphicon-trash"></span> Delete</button> </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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

        $pembelian = new Pembelian;
        $pembelian->created_at = $request['tanggalPembelian'];
        $pembelian->id_supplier = $request['namaSupplier'];
        $pembelian->kode_produk = $request['namaProduk'];
        $pembelian->total_item = $request['totalItem'];
        $pembelian->total_harga = $request['totalHarga'];
        $pembelian->save();


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
        $pembelian = Pembelian::find($id);
//        $pembelian->id_pembelian = $request['id'];
        $pembelian->kode_produk = $request['produk'];
        $pembelian->id_supplier = $request['supplier'];
        $pembelian->total_item = $request['totalItem'];
        $pembelian->total_harga = $request['totalHarga'];
        $pembelian->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();


    }
}
