
<!-- Modal form to add produk -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"> </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Kode Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_add" autofocus>
              <small>Kode Produk </small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>     
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Nama Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_add" autofocus>
              <small>Nama Produk </small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>     
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Supplier</label>
            <div class="col-sm-10">
              <select id="supplier_add" type="text" class="form-control" name="supplier_add" required>
                <option value=""> -- Pilih Supplier-- </option>
                @foreach($supplier as $list)
                <option value="{{ $list->nama_supplier }}">{{ $list->nama_supplier }}</option>
                @endforeach
              </select>
              <small>Nama Supplier</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Kategori</label>
            <div class="col-sm-10">
              <select id="kategori_add" type="text" class="form-control" name="kategori_add" required>
                <option value=""> -- Pilih Kategori-- </option>
                @foreach($kategori as $list)
                <option value="{{ $list->id_kategori }}">{{ $list->nama_kategori }}</option>
                @endforeach
              </select>
              <small>Nama Kategori Menu</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Harga Jual</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="harga_jual_add" autofocus>
              <small>Harga Jual Per Cangkir</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>                           
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Diskon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="diskon_add" autofocus>
              <small>Diskon bila ada</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Stok</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="stok_add" autofocus>
              <small>Stok tersisa bila ada</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Deskripsi</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="content_add" cols="40" rows="5" disabled="hidden"></textarea>
              <small>Isikan Deskripsi Menu</small>
              <p class="errorContent text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-success add" data-dismiss="modal">
            <span id="" class='glyphicon glyphicon-check'></span> Add
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal form to edit a form -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_edit" disabled>
            </div>
          </div>                    <div class="form-group">
            <label class="control-label col-sm-2" for="id">Kode Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_edit" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Nama Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="produk_edit" autofocus>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Supplier</label>
            <div class="col-sm-10">
              <select id="supplier_edit" type="text" class="form-control" name="supplier_edit" required>
                <option value=""> -- Pilih Supplier-- </option>
                @foreach($supplier as $list)
                <option value="{{ $list->nama_supplier }}">{{ $list->nama_supplier }}</option>
                @endforeach
              </select>
              <small>Nama Supplier</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"> Kategori</label>
            <div class="col-sm-10">
              <select id="kategori_edit" type="text" class="form-control" name="kategori_edit" required>
                <option value=""> -- Pilih Kategori-- </option>
                @foreach($kategori as $list)
                <option value="{{ $list->id_kategori }}">{{ $list->nama_kategori }}</option>
                @endforeach
              </select>
              <small>Nama Kategori Menu</small>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Harga Jual</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="harga_edit" autofocus>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Diskon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="diskon_edit" autofocus>
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Stok</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="stok_edit" autofocus="">
              <p class="errorTitle text-center alert alert-danger hidden"></p>
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary edit" data-dismiss="modal">
            <span class='glyphicon glyphicon-check'></span> Edit
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal form to delete a form -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Produk akan dihapus?</h3>
        <br />
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_delete" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Produk </label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="produk_delete" disabled>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger delete" data-dismiss="modal">
            <span id="" class='glyphicon glyphicon-trash'></span> Delete
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>







