<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         return view ('kategori.index');
     }
     public function listData()
     {
         //menyiapkan data yang akan ditampilkan
         $kategori = Kategori::orderBy('id_kategori', 'desc')->get();
         $no = 0;
         foreach ($kategori as $list) {
           // code...
           $no ++;
           $row = array();
           $row [] = $no;
           $row [] = $list->nama_kategori;
           $row [] = '<div class="btn-group">
           <button class="edit-modal btn btn-info" data-id='.$list->id_kategori.' data-kategori='.$list->nama_kategori.'>
            <span class="glyphicon glyphicon-edit"></span> Edit</button>
           <button class="delete-modal btn btn-danger" data-id='.$list->id_kategori.' data-kategori='.$list->nama_kategori.'>
           <span class="glyphicon glyphicon-trash"></span> Delete</button> </div>';
           $data[] = $row;
         }
         $output = array("data"=>$data);
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
        //
        $kategori = new Kategori;
        $kategori->nama_kategori = $request['nama_kategori'];
        $kategori->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return $kategori;

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
        $kategori = Kategori::find($id);
        echo json_encode($kategori);     

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
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request['nama_kategori'];
        $kategori->update();
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
        $kategori = Kategori::find($id);
        $kategori->delete();
    }

}
