@extends('layouts.app')

@section('title')
Daftar Pembelian
@endsection

@section('breadcrumb')
@parent
<li>pembelian</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        
          <a href="#" class="btn btn-success add-modal"><i class="fa fa-plus-circle"></i>Tambah Pembelian </a>
      

      </div>
      
      <div class="box-body">  

        <table class="table table-striped tabel-pembelian">
          <thead>
           <tr>
            <th width="30">No</th>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Supplier</th>
            <th>Total Item</th>
            <th>Total Harga</th>
            <th>Diskon</th>
            <th>Total Bayar</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

    </div>
  </div>
</div>
</div>

@include('pembelian.form')

@endsection

@section('script')
<script type="text/javascript">
  var table, save_method, table1;
  $(function(){
   table = $('.tabel-pembelian').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('pembelian.data') }}",
       "type" : "GET"
     }
   }); 
   
 });


// Tambah Pembelian
$(document).on('click', '.add-modal', function() {
 $('.modal-title').text('Tambah Pembelian');
 $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function() {
 $.ajax({
   type: 'POST',
   url: 'pembelian',
   data: {
     '_token': $('input[name=_token]').val(),
     'tanggalPembelian' : $('#tanggal_add').val(),
     'namaProduk': $('#produk_add').val(),
     'namaSupplier': $('#supplier_add').val(),
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
       toastr.success('Successfully added Supplier!', 'Success Alert', {timeOut: 5000}); 

     }
   },
 });
});

// Edit a Pembelian
$(document).on('click', '.edit-modal', function() {
  $('.modal-title').text('Edit Pembelian');
//  $('#id_edit').val($(this).data('id'));
  $('#produk_edit').val($(this).data('produk'));
  $('#supplier_edit').val($(this).data('supplier'));
  $('#total_item_edit').val($(this).data('item'));
  $('#total_harga_edit').val($(this).data('harga'));

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
      'supplier' : $('#supplier_edit').val(),
      'totalItem' : $('#total_item_edit').val(),
      'totalHarga' : $('#total_harga_edit').val(),

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


// delete Pembelian
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