                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form id="edit" class="form-material form-validation" novalidate>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi Nama">
                                            <span class="messages"></span>
                                        </div>
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Isi email valid">
                                            <span class="messages"></span>
                                        </div>
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Username</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Isi Username">
                                            <span class="messages"></span>
                                        </div>                                                                                
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Masukkan Password">
                                            <span class="messages"></span>
                                        </div>
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Repeat Password</label>
                                            <input type="password" class="form-control" id="repeat-password"
                                                    name="repeat-password" placeholder="Ulangi Password">
                                            <span class="messages"></span>                                            
                                        </div>
                                        <div class="form-group form-primary">
                                            <label class="col-form-label">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <?php foreach ($role as $key => $value) { ?>
                                                    <option value="<?= $value->id ?>">
                                                        <?= $value->nama_peran ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="messages"></span>                                            
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