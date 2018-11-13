<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Supplier;
use App\Pembelian;
use App\PembelianDetail;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $produk = Produk::all();
      $idpembelian = session('idpembelian');
      $supplier = Supplier::find(session('idsupplier'));
      return view('pembelian_detail.index', compact('produk', 'idpembelian', 'supplier'));
    }


     public function listData($id)
    {
    
      $detail = PembelianDetail::leftJoin('produk', 'produk.kode_produk', '=', 'pembelian_detail.kode_produk')
         ->where('pembelian_detail.id_pembelian', '=', $id)
         ->get();
      $no = 0;
      $data = array();
      $total = 0;
      $total_item = 0;
      foreach($detail as $list){
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $list->kode_produk;
        $row[] = $list->nama_produk;
        $row[] = "Rp. ".($list->harga_beli);
        $row[] = "<input type='number' class='form-control' name='jumlah_$list->id_pembelian_detail' value='$list->jumlah' onChange='changeCount($list->id_pembelian_detail)'>";
        $row[] = "Rp. ".($list->harga_beli * $list->jumlah);
        $row[] = '<a onclick="deleteItem('.$list->id_pembelian_detail.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
        $data[] = $row;

        $total += $list->harga_beli * $list->jumlah;
        $total_item += $list->jumlah;
      }

      $data[] = array("<span class='hide total'>$total</span><span class='hide totalitem'>$total_item</span>", "", "", "", "", "", "");
     
      $output = array("data" => $data);
      return response()->json($output);
    }


    public function loadForm($diskon, $total){
      $bayar = $total - ($diskon / 100 * $total);
      $data = array(
         "totalrp" => $total,
         "bayar" => $bayar,
         "bayarrp" => $bayar,
         "terbilang" => ucwords(($bayar))." Rupiah"
       );
      return response()->json($data);
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
        $produk = Produk::where('kode_produk', '=', $request['kode'])->first();
        $detail = new PembelianDetail;
        $detail->id_pembelian = $request['idpembelian'];
        $detail->kode_produk = $request['kode'];
        $detail->harga_beli = $produk->harga_beli;
        $detail->jumlah = 1;
        $detail->sub_total = $produk->harga_beli;
        $detail->save();

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
