                    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form class="form-material" id="insert">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Access</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group form-primary">
                                            <select name="acl" class="form-control form-control-primary fill">
                                                <?php foreach ($acl as $key => $value) {
                                                    echo '<option value="'. $value->id .'">'. $value->con_tod. ' | '. $value->nama_peran;
                                                    echo '</option>';
                                                } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Access Control</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <select name="tool_button" class="form-control form-control-primary fill">
                                                <?php foreach ($tool_button as $key => $value) {
                                                    echo '<option value="'. $value->id .'">'. $value->nama;
                                                    echo '</option>';
                                                } ?>
                                            </select>                                            
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tool Button</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="text" name="order" class="form-control form-primary">
                                            <span class="form-bar"></span>
                                            <label class="float-label">No. Urut</label>
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