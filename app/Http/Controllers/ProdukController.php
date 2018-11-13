<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Supplier;
use Datatables;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $supplier = Supplier::all(); 
       $kategori = Kategori::all();      
       return view('produk.index', compact('kategori', 'supplier'));
    }

    public function listData()
     {
    
      $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
      ->orderBy('produk.id_produk', 'desc')
      ->get();
        $no = 0;
        $data = [];
        foreach($produk as $list){
          $no ++;
          $row = [];
          $row[] = $no;
          $row[] = $list->kode_produk;
          $row[] = $list->nama_produk;
          $row[] = $list->nama_kategori;
          $row[] = $list->merk;
          $row[] = $list->harga_jual;
          $row[] = $list->diskon;
          $row[] = $list->stok;
          $row[] = '<div class="btn-group">
            <button class="edit-modal btn btn-info" data-id='.$list->id_produk.' data-kode='.$list->kode_produk.' data-produk='.$list->nama_produk.' data-kategori='.$list->nama_kategori.' data-supplier='.$list->nama_kategori.' data-harga='.$list->harga_jual.' data-diskon='.$list->diskon.' data-stok='.$list->stok.' >
            <span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button class="delete-modal btn btn-danger" data-id='.$list->id_produk.' data-produk='.$list->nama_produk.'>
            <span class="glyphicon glyphicon-trash"></span> Delete</button> </div>';
        $data[] = $row;
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
        $jml = Produk::where('kode_produk', '=', $request['kode'])->count();
        if($jml < 1){
            $produk = new Produk;
            $produk->kode_produk     = $request['kodeProduk'];
            $produk->nama_produk    = $request['namaProduk'];
            $produk->id_kategori    = $request['namaKategori'];
            $produk->merk          = $request['namaSupplier'];
            $produk->harga_jual    = $request['hargaJual'];
            $produk->diskon    = $request['diskon'];
            $produk->stok          = $request['stok'];
            $produk->save();
            echo json_encode(array('msg'=>'success'));
        }else{
            echo json_encode(array('msg'=>'error'));
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
      // $produk = Produk::find($id);
      // echo json_encode($produk);
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
        $produk = Produk::find($id);
        $produk->nama_produk    = $request['produk'];
        $produk->kode_produk    = $request['kode'];
        $produk->id_kategori    = $request['kategori'];
        $produk->merk           = $request['supplier'];
        $produk->diskon         = $request['diskon'];
        $produk->harga_jual     = $request['harga'];
        $produk->stok           = $request['stok'];
        $produk->update();
        echo json_encode(array('msg'=>'success'));    
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
        $produk = Produk::find($id);
        $produk->delete();
    }


}
