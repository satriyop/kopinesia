@extends ('layouts.app')
@section('title')
  Daftar Kategori
@endsection

@section('breadcrumb')
  @parent
  <li>Kategori </li>
@endsection

@section ('content')

<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul>
                        <a href="#" class="add-modal"><i class="fa fa-plus-circle"></i>Tambah Menu </a>
                    </ul>
                </div>
              </div>
              <div class="box-body">

  <table class="table table-striped">
    <thead>
      <tr>
        <th width="30"> No </th>
        <th> Kategori </th>
        <th> Aksi </th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
      </div>
    </div>
  </div>
</div>
@include('kategori.form')
@endsection



@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
  //menampilkan data dengan plugin DataTables
  table = $('.table').DataTable({
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('kategori.data') }}",
      "type" : "GET"
    }
  })
});


 // Tambah Kategori
            $(document).on('click', '.add-modal', function() {
                $('.modal-title').text('Tambah Kategori');
                $('#addModal').modal('show');
            });
            $('.modal-footer').on('click', '.add', function() {
                $.ajax({
                    type: 'POST',
                    url: 'kategori',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'nama_kategori': $('#kategori_add').val(),


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
                            toastr.success('Successfully added Kategori!', 'Success Alert', {timeOut: 5000});
                  
 
                        }
                    },
                });
            });


// Edit a kategori
$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Sila Edit Kategori');
    $('#id_edit').val($(this).data('id'));
    $('#kategori_edit').val($(this).data('kategori'));

    id = $('#id_edit').val();

    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PUT',
        url: 'kategori/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kategori': $('#id_edit').val(),
            'nama_kategori': $('#kategori_edit').val()

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
                            toastr.success('Successfully updated Kategori!', 'Success Alert', {timeOut: 5000});
                        }
                    }
                });
            });




  // delete kategori
  $(document).on('click', '.delete-modal', function() {
      $('.modal-title').text('Hapus Kategori');
      $('#id_delete').val($(this).data('id'));
      $('#kategori_delete').val($(this).data('kategori'));
      $('#deleteModal').modal('show');
      id = $('#id_delete').val();
  });
  $('.modal-footer').on('click', '.delete', function() {
      $.ajax({
          type: 'DELETE',
          url: 'kategori/' + id,
          data: {
              '_token': $('input[name=_token]').val(),
          },
          success: function(data) {
            table.ajax.reload();
              toastr.success('Successfully deleted Kategori!', 'Success Alert', {timeOut: 1000});
          }
      });
  });


// //menampilkan form tambah
// function addForm(){
//   save_method = "add";
//   $('input[name=method]').val('POST');
//   $('#modal-form').modal('show');
//   $('#modal-form form')[0].reset();
//   $('.modal-title').text('Tambah Kategori');
// }

// //menyimpan data form tambah/edit
//    $('#modal-form form').validator().on('submit', function(e){
//       if(!e.isDefaultPrevented()){
//          var id = $('#id').val();
//          if(save_method == "add") url = "{{ route('kategori.store') }}";
//          else url = "kategori/"+id;
         
//          $.ajax({
//            url : url,
//            type : "POST",
//            data : $('#modal-form form').serialize(),
//            success : function(data){
//              $('#modal-form').modal('hide');
//              table.ajax.reload();
//            },
//            error : function(){
//              alert("Tidak dapat menyimpan data!");
//            }   
//          });
//          return false;
//      }
//    });





//menampilkan edit modal-form
/*function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PUT');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "kategori/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form-edit').modal('show');
       $('.modal-title').text('Edit Kategori');
       
       $('#id_kategori').val(data.id_kategori);
       $('#nama_kategori').val(data._kategori);
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}
*/
//melakukan delete data
// function deleteData(id){

//    if(confirm("Apakah yakin data akan dihapus?")){
//      $.ajax({
//        url : "kategori/"+id,
//        type : "post",
//        data : {'_method' : 'delete', '_token' : $('meta[name=csrf_token]').attr('content')},
//        success : function(data){
//          table.ajax.reload();
//        },
//        error : function(){
//          alert("Tidak dapat menghapus data!");
//        }
//      });
//    }
// }

</script>

@endsection
