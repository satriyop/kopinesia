<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Penjualan;
use App\Produk;
use App\Member;
//use App\PenjualanDetail;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $produk = Produk::all();        
      return view('penjualan.index', compact('produk')); 

    }


    public function listData()
       {
       
        $penjualan = Penjualan::leftJoin('produk', 'produk.id_produk', '=', 'penjualan.id_produk')
           ->orderBy('penjualan.id_penjualan', 'desc')
           ->get();
         $no = 0;
         $data = array();

         foreach($penjualan as $list){
           $no ++;
           $row = array();
           $row[] = $no;
           $row[] = substr($list->created_at, 0, 10);
           $row[] = $list->nama_produk;
           $row[] = $list->total_item;
           $row[] = ($list->total_item * $list->harga_jual);
           $row[] = $list->diterima;
           $row[] = $list->diterima - ($list->total_item * $list->harga_jual);
           $row[] = $list->kode_produk;

           $row[] = '<div class="btn-group">
                   <a onclick="showDetail('.$list->id_penjualan.')" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                   <a onclick="deleteData('.$list->id_penjualan.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </div>';
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
        $penjualan = new Penjualan;
        $penjualan->created_at = $request['tanggalPenjualan'];
        $penjualan->id_produk = $request['namaProduk'];
        $penjualan->total_item = $request['totalItem'];
        $penjualan->diterima = $request['totalHarga'];
        $penjualan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

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
        $penjualan = Penjualan::find($id);
        $penjualan->delete();

    }

    
}
