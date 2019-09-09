                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">E-Commerce Dashboard</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">E-Commerce Dashboard</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>DATA PENGELUARAN</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <button type="button" class="btn btn-mat waves-effect waves-light btn-primary tambah" data-target="#ModalTambah" data-toggle="modal">
                                                            <i class="ti-plus"></i> Tambah Data
                                                        </button>
                                                        <button class="btn btn-mat waves-effect waves-light btn-warning edit">
                                                            <i class="ti-pencil"></i> Edit Data
                                                        </button>
                                                        <button class="btn btn-mat waves-effect waves-light btn-danger hapus">
                                                            <i class="ti-trash"></i> Hapus Data
                                                        </button>
                                                        <div class="dt-responsive table-responsive" style="margin-top: 25px;">
                                                            <table id="table-menu" class="table table-striped table-hover table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Tanggal</th>
                                                                        <th>Nama / Keterangan</th>
                                                                        <th>Jumlah</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($data as $key => $value) { ?>
                                                                    <tr>
                                                                        <td style="width: 5%">
                                                                            <?= ($key + 1) ?>
                                                                            <input type="hidden" name="id" value="<?= $value->id ?>">
                                                                        </td>
                                                                        <td> 
                                                                            <?= date('d/m/Y', strtotime($value->tanggal)) ?> 
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->keterangan ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= convert_rp($value->jumlah) ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>                                          
                                        </div>                                        
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('pengeluaran/add'); ?>
                    <?php $this->load->view('pengeluaran/edit'); ?>
                    <script>
                        $(document).ready(function(){
                            $('#insert').submit(function(e){
                                e.preventDefault();
                                insert($('#insert').serialize(), base_url + 'pengeluaran/add', base_url + 'pengeluaran');
                            });

                            $('.edit').click(function(e){
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                if(!id_edit){
                                    alert('AAAAAAAA');
                                }else{
                                    edit(
                                        '#ModalEdit',
                                        base_url + 'pengeluaran/edit/' + id_edit,
                                        {
                                            tanggal: '#edit input[name="tanggal"]',
                                            keterangan: '#edit input[name="keterangan"]',
                                            jumlah: '#edit input[name="jumlah"]',
                                        }
                                    );
                                }
                            }) 

                            $('#edit').submit(function(e){
                                e.preventDefault();
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                update($('#edit').serialize(), base_url + 'pengeluaran/edit/' + id_edit, base_url + 'pengeluaran');
                            });  

                            $('.hapus').click(function(e){
                                var id = $('tr.selected').find('input[name="id"]').val();
                                hapus(base_url + 'pengeluaran/delete', base_url + 'pengeluaran', id);
                            });   
                        })
                    </script>
                  