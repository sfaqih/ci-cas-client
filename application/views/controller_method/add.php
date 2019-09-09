                    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form class="form-material" id="insert">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group form-primary">
                                            <select name="controller_id[]" class="form-control fill js-example-basic-multiple col-sm-12" style="width: 100%;" multiple="multiple">
                                                <?php foreach ($controller as $value) { ?>
                                                    <option value="<?= $value->id ?>">
                                                        <?= $value->controller_name ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Controller</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <select name="method_id[]" class="form-control fill js-example-basic-multiple col-sm-12" style="width: 100%;" multiple="multiple">
                                                <?php foreach ($method as $value) { ?>
                                                    <option value="<?= $value->id ?>">
                                                        <?= $value->method_name ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Method</label>
                                        </div>                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
                                    </div>
                                </div>                                
                            </form>
                        </div>
                    </div>