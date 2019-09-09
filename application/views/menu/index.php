                    <style type="text/css">
                        input[type=search] {
                            width: 150px !important;
                        }
                    </style>
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
                                                        <h5>DATA MENU</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="button">
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="table-menu" class="table table-striped table-hover table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Menu</th>
                                                                        <th>Icon</th>
                                                                        <th>Url</th>
                                                                        <th>No. Urut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($menu as $value) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="id" value="<?= $value->id ?>"> 
                                                                            <?= $value->menu ?> 
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->icon ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value->url ?>
                                                                        </td>                                                                                                                                                
                                                                        <td>
                                                                            <?= $value->no_urut ?>
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
                    <?php $this->load->view('menu/add'); ?>
                    <?php $this->load->view('menu/edit'); ?>
                    <script>
                        $(document).ready(function(){
                            $('#insert').submit(function(e){
                                e.preventDefault();
                                insert($('#insert').serialize(), base_url + 'menu/add', base_url + 'menu');
                            });

                            $(document).on('click', '.edit', function(e){
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                if(!id_edit){
                                    return false;
                                }else{
                                    edit(
                                        '#ModalEdit',
                                        base_url + 'menu/edit/' + id_edit,
                                        {
                                            menu: '#edit input[name="menu"]',
                                            no_urut: '#edit input[name="urut"]',
                                            url: '#edit input[name="url"]',
                                            icon: '#edit input[name="icon"]'
                                        }
                                    );
                                }
                            }) 

                            $('#edit').submit(function(e){
                                e.preventDefault();
                                var id_edit = $('tr.selected').find('input[name="id"]').val();
                                update($('#edit').serialize(), base_url + 'menu/edit/' + id_edit, base_url + 'menu');
                            });  

                            $(document).on('click', '.hapus', function(e){
                                var id = $('tr.selected').find('input[name="id"]').val();
                                hapus(base_url + 'menu/delete', base_url + 'menu', id);
                            });   
                        })
                    </script>                    