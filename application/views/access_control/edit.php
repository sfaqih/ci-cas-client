                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form class="form-material" id="edit">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group form-primary">
                                            <select name="controller_method_id" class="form-control form-control-primary fill">
                                                <?php foreach ($controller_method as $value) { ?>
                                                    <option value="<?= $value->id ?>">
                                                        <?= $value->con_tod ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Controller Method</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <select name="role_id" class="form-control form-control-primary fill">
                                                <?php foreach ($role as $value) { ?>
                                                    <option value="<?= $value->id ?>">
                                                        <?= $value->nama_peran ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Role</label>
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