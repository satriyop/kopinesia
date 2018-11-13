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
                                <label class="control-label col-sm-2" for="title"> Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="supplier_add" autofocus>
                                    <small>Nama Suppier</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat_supplier_add" autofocus>
                                    <small>Alamat Supplier</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Telpon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telpon_supplier_add" autofocus>
                                    <small>Nomor Telpon/HP Suppier</small>
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
                                <label class="control-label col-sm-2" for="title">Nama Supplier:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="supplier_edit" autofocus>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Alamat Supplier:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat_supplier_edit" autofocus>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Telpon Supplier:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telpon_supplier_edit" autofocus>
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
                        <h3 class="text-center">Supplier akan dihapus?</h3>
                        <br />
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_delete" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Supplier:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="supplier_delete" disabled>
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

