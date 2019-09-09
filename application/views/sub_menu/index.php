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
                                                        <h5>DATA SUB MENU</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="button">
                                                        </div>
                                                        <div class="dt-responsive table-responsive" style="margin-top: 25px;">
                                                            <table id="table-menu" class="table table-striped table-hover table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Sub Menu</th>
                                                                        <th>Header Menu</th>
                                                                        <th>No. Urut</th>
                                                                        <th>Url</th>
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
                                                                            <?= $value->sub_menu ?> 
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->menu ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->no_urut ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->url ?>
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
                    <?php $this->load->view('sub_menu/add'); ?>
                    <?php $this->load->view('sub_menu/edit'); ?>
                    <script>
                        $(document).ready(function(){
                            $('#insert').submit(function(e){
                                e.preventDefault();
                                insert($('#insert').serialize(), base_url + 'sub_menu/add', base_url + 'sub_menu');
                            });

                            $(document).on('click', '.edit', function(){
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                if(!id_edit){
                                    return false;
                                }else{
                                    edit(
                                        '#ModalEdit',
                                        base_url + 'sub_menu/edit/' + id_edit,
                                        {
                                            sub_menu: '#edit input[name="sub_menu"]',
                                            no_urut: '#edit input[name="urut"]',
                                            url: '#edit input[name="url"]',
                                            id_menu: '#edit select[name="id_menu"]',
                                        }
                                    );
                                }
                            })

                            $('#edit').submit(function(e){
                                e.preventDefault();
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                update($('#edit').serialize(), base_url + 'sub_menu/edit/' + id_edit, base_url + 'sub_menu');
                            });  

                            $(document).on('click', '.hapus', function(){
                                var id = $('tr.selected').find('input[name="id"]').val();
                                hapus(base_url + 'sub_menu/delete', base_url + 'sub_menu', id);
                            });   
                        })
                    </script>
                  