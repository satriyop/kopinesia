@extends('layouts.app')

@section('title')
  Daftar Produk
@endsection

@section('breadcrumb')
   @parent
   <li>produk</li>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <a href="#" class="btn btn-success add-modal"><i class="fa fa-plus-circle"></i>Tambah Produk </a>
      </div>
    <div class="box-body">
      <table class="table table-striped tabel-produk">
        <thead>
           <tr>
              <th width="20">No</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Supplier</th>
              <th>Harga Jual</th>
              <th>Diskon</th>
              <th>Stok</th>
              <th width="150">Aksi</th>
           </tr>
        </thead>
      <tbody></tbody>
      </table>
      </div>
    </div>
  </div>
</div>

@include('produk.form')
@endsection

@section('script')
<script type="text/javascript">
  var table, save_method, table1;
  $(function(){
   table = $('.tabel-produk').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('produk.data') }}",
       "type" : "GET"
     }
   }); 
});
   

// Tambah Produk
$(document).on('click', '.add-modal', function() {
 $('.modal-title').text('Tambah Produk');
 $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function() {
 $.ajax({
   type: 'POST',
   url: 'produk',
   data: {
     '_token': $('input[name=_token]').val(),
     'kodeProduk' : $('#kode_add').val(),
     'namaProduk': $('#nama_add').val(),
     'namaKategori' : $('#kategori_add').val(),
     'namaSupplier': $('#supplier_add').val(),
     'hargaJual' : $('#harga_jual_add').val(),
     'diskon' : $('#diskon_add').val(),
     'stok' : $('#stok_add').val(),


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
       toastr.success('Successfully added Produk!', 'Success Alert', {timeOut: 5000});
       
     }
   },
 });
});

// Edit a Produk
$(document).on('click', '.edit-modal', function() {
  $('.modal-title').text('Edit Produk');
  $('#id_edit').val($(this).data('id'));
  $('#kode_edit').val($(this).data('kode'));
  $('#produk_edit').val($(this).data('produk'));   
  $('#supplier_edit').val($(this).data('supplier'));
  $('#kategori_edit').val($(this).data('kategori'));
  $('#harga_edit').val($(this).data('harga'));
  $('#diskon_edit').val($(this).data('diskon'));
  $('#stok_edit').val($(this).data('stok'));

  id = $('#id_edit').val();
//    alamat = $('#alamat_supplier_edit').val();

$('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'PUT',
    url: 'produk/' + id,
    data: {
      '_token': $('input[name=_token]').val(),
      'kode' : $('#kode_edit').val(),
      'produk' : $('#produk_edit').val(),
      'kategori' : $('#kategori_edit').val(),
      'supplier' : $('#supplier_edit').val(),
      'diskon' : $('#diskon_edit').val(),
      'harga' : $('#harga_edit').val(),
      'stok' : $('#stok_edit').val(),
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
  $('.modal-title').text('Hapus Produk');
  $('#id_delete').val($(this).data('id'));
  $('#produk_delete').val($(this).data('produk'));
  $('#deleteModal').modal('show');
  id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function() {
  $.ajax({
    type: 'DELETE',
    url: 'produk/' + id,
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
