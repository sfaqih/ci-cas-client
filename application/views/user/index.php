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
                                                        <h5>DATA USER</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="button">
                                                        </div>
                                                        <div class="dt-responsive table-responsive" style="margin-top: 25px;">
                                                            <table id="table-menu" class="table table-striped table-hover table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Nama</th>
                                                                        <th>Email</th>
                                                                        <th>Username</th>
                                                                        <th>Role</th>
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
                                                                            <?= $value->nama ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?= $value->email ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?= $value->username ?> 
                                                                        </td>                                                                                                                                                
                                                                        <td>
                                                                            <?= $value->nama_peran ?>
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
                    <?php $this->load->view('user/add'); ?>
                    <?php $this->load->view('user/edit'); ?>
                    <script>
                        $(document).ready(function(){
                            $('#insert').submit(function(e){
                                e.preventDefault();
                                insert($('#insert').serialize(), base_url + 'user/add', base_url + 'user');
                            });

                            $(document).on('click', '.edit', function(e){
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                if(!id_edit){
                                    return false;
                                }else{
                                    edit(
                                        '#ModalEdit',
                                        base_url + 'user/edit/' + id_edit,
                                        {
                                            nama: '#edit input[name="nama"]',
                                            email: '#edit input[name="email"]',
                                            username: '#edit input[name="name"]',
                                            level: '#edit select[name="role"]'
                                        }
                                    );
                                }
                            }) 

                            $('#edit').submit(function(e){
                                e.preventDefault();
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                update($('#edit').serialize(), base_url + 'user/edit/' + id_edit, base_url + 'user');
                            });  

                            $(document).on('click', '.hapus', function(e){
                                var id = $('tr.selected').find('input[name="id"]').val();
                                hapus(base_url + 'user/delete', base_url + 'user', id);
                            });   
                        })
                    </script>
                  