@extends ('layouts.app')
@section('title')
  Daftar Supplier
@endsection

@section('breadcrumb')
  @parent
  <li>Supplier </li>
@endsection

@section ('content')

<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul>
                        <a href="#" class="add-modal"><i class="fa fa-plus-circle"></i>Tambah Supplier </a>
                    </ul>
                </div>
              </div>
              <div class="box-body">

  <table class="table table-striped">
    <thead>
      <tr>
        <th width="30"> No </th>
        <th> Supplier </th>
        <th> Alamat </th>
        <th> Telpon </th>
        <th> Aksi </th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
      </div>
    </div>
  </div>
</div>
@endsection
@include('supplier.form')


@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
  //menampilkan data dengan plugin DataTables
  table = $('.table').DataTable({
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('supplier.data') }}",
      "type" : "GET"
    }
  })
});


 // Tambah Supplier
  $(document).on('click', '.add-modal', function() {
      $('.modal-title').text('Tambah Supplier');
      $('#addModal').modal('show');
  });
  $('.modal-footer').on('click', '.add', function() {
      $.ajax({
          type: 'POST',
          url: 'supplier',
          data: {
              '_token': $('input[name=_token]').val(),
              'nama_supplier': $('#supplier_add').val(),
              'alamat' : $('#alamat_supplier_add').val(),
              'telpon' : $('#telpon_supplier_add').val(),


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


// Edit a supplier
$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Edit Supplier');
    $('#id_edit').val($(this).data('id'));
    $('#supplier_edit').val($(this).data('nama'));
    $('#alamat_supplier_edit').val($(this).data('alamat'));
    $('#telpon_supplier_edit').val($(this).data('telpon'));

    id = $('#id_edit').val();
//    alamat = $('#alamat_supplier_edit').val();

    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PUT',
        url: 'supplier/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id_supplier': $('#id_edit').val(),
            'nama_supplier': $('#supplier_edit').val(),
            'alamat' : $('#alamat_supplier_edit').val(),
            'telpon' : $('#telpon_supplier_edit').val()

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
                toastr.success('Successfully updated Supplier!', 'Success Alert', {timeOut: 5000});
            }
        }
    });
});




    // delete supplier
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Hapus Supplier');
        $('#id_delete').val($(this).data('id'));
        $('#supplier_delete').val($(this).data('supplier'));
        $('#deleteModal').modal('show');
        id = $('#id_delete').val();
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'supplier/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
              table.ajax.reload();
                toastr.success('Successfully deleted Supplier!', 'Success Alert', {timeOut: 1000});
            }
        });
    });


</script>

@endsection
