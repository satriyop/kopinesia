<        <!-- Modal form to add a post -->
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
                                <label class="control-label col-sm-2" for="title">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_add" autofocus>
                                    <small>Tanggal Penjualan </small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title"> Produk</label>
                                <div class="col-sm-10">
                                    <select id="produk_add" type="text" class="form-control" name="produk_add" required>
                                      <option value=""> -- Pilih Produk-- </option>
                                      @foreach($produk as $list)
                                      <option value="{{ $list->id_produk }}">{{ $list->nama_produk }}</option>
                                      @endforeach
                                    </select>
                                    <small>Nama Produk atau Menu</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Total Item</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="total_item_add" autofocus>
                                    <small>Jumlah barang yang dibeli</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>                           
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Uang Diterima</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="total_harga_add" autofocus>
                                    <small>Total Harga</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="content">Deskripsi:</label>
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
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_edit" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Nama Produk:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="supplier_edit" autofocus>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Total Item:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="total_item_edit" autofocus>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Total Harga:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="total_harga_edit" autofocus>
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
                        <h3 class="text-center">Penjualan akan dihapus?</h3>
                        <br />
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_delete" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Produk:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="pembelian_delete" disabled>
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

