                    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form id="insert">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Pemasukan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="float-label">Tanggal</label>
                                            <input type="text" name="tanggal" class="form-control dropper-format-id"  required readonly>
                                        </div>
                                        <div class="form-group form-primary">
                                            <label class="float-label">Nama  / Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control form-control-capitalize"  required>
                                        </div>  
                                        <div class="form-group form-primary">
                                            <label class="float-label">Jumlah</label>
                                            <input type="text" name="jumlah" class="form-control autonumber" data-a-sign="Rp. " required>
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