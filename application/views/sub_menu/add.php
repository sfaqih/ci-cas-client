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
                                            <select name="id_menu" class="form-control form-control-primary fill"> 
                                                <?php foreach($menu as $key => $val){  ?>
                                                <option value="<?= $val->id ?>"> <?= $val->menu ?> </option>
                                                <?php } ?>
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Header Menu</label>
                                        </div>                                      
                                        <div class="form-group form-primary">
                                            <input type="text" name="sub_menu" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Sub Menu</label>
                                        </div>  
                                        <div class="form-group form-primary">
                                            <input type="text" name="urut" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">No Urut</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="text" name="url" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Url</label>
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