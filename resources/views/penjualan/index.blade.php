@extends('layouts.app')

@section('title')
  Daftar Penjualan
@endsection

@section('breadcrumb')
   @parent
   <li>penjualan</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      
      <div class="box-header">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <a href="#" class="add-modal"><i class="fa fa-plus-circle"></i>Tambah Penjualan </a>
                </ul>
            </div>
        </div>
      </div>

<div class="box-body">  
<table class="table table-striped tabel-penjualan">
<thead>
   <tr>
      <th width="30">No</th>
      <th>Tanggal</th>
      <th>Produk</th>
      <th>Total Item</th>
      <th>Total Harga</th>
      <th>Diterima</th>
      <th>Kembalian</th>
      <th>Barista</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('penjualan.form')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method, table1;
$(function(){
   table = $('.tabel-penjualan').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('penjualan.data') }}",
       "type" : "GET"
     }
   }); 
   
});



// Tambah Penjualan
 $(document).on('click', '.add-modal', function() {
     $('.modal-title').text('Tambah Penjualan');
     $('#addModal').modal('show');
 });
 $('.modal-footer').on('click', '.add', function() {
     $.ajax({
         type: 'POST',
         url: 'penjualan',
         data: {
             '_token': $('input[name=_token]').val(),
             'tanggalPenjualan' : $('#tanggal_add').val(),
             'namaProduk': $('#produk_add').val(),
             'totalItem' : $('#total_item_add').val(),
             'totalHarga' : $('#total_harga_add').val(),


         },
         success: function(data) {
             table.ajax.reload();
             $('.errorTitle').addClass('hidden');
             $('.errorContent').addClass('hidden');

             if ((data.errors)) {
                 setTimeout(function () {
                     $('#addModal').modal('show');
                     toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                 }, 500);

                 if (data.errors.title) {
                     $('.errorTitle').removeClass('hidden');
                     $('.errorTitle').text(data.errors.title);
                 }
                 if (data.errors.content) {
                     $('.errorContent').removeClass('hidden');
                     $('.errorContent').text(data.errors.content);
                 }
             } else {
                 toastr.success('Successfully added Penjualan!', 'Success Alert', {timeOut: 5000});
       

             }
         },
     });
 });

// Edit a Penjualan
$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Edit Pembelian');
    $('#id_edit').val($(this).data('id'));
    $('#supplier_edit').val($(this).data('nama'));
    $('#total_item_edit').val($(this).data('totalItem'));
    $('#total_harga_edit').val($(this).data('totalHarga'));

    id = $('#id_edit').val();
//    alamat = $('#alamat_supplier_edit').val();

    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PUT',
        url: 'pembelian/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id_supplier': $('#id_edit').val(),
            'nama_supplier': $('#supplier_edit').val(),
            'totalItem' : $('#total_item_edit').val(),
            'totalHarga' : $('#total_harga_edit').val()

        },
        success: function(data) {
            table.ajax.reload();
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');
   
            if ((data.errors)) {
                setTimeout(function () {
                    $('#editModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Successfully updated Pembelian!', 'Success Alert', {timeOut: 5000});
            }
        }
    });
});


// delete Penjualan
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Hapus Pembelian');
    $('#id_delete').val($(this).data('id'));
    $('#pembelian_delete').val($(this).data('pembelian'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'DELETE',
        url: 'pembelian/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
          table.ajax.reload();
            toastr.success('Successfully deleted Pembelian!', 'Success Alert', {timeOut: 1000});
        }
    });
});

</script>
@endsection