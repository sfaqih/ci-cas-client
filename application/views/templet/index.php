<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dash Able bootstrap admin template suitable for any project backend need. It comes with lots of UI components, pages, plugins with easy to use well structured code." />
    <meta name="keywords" content="admin template, bootstrap admin template, bootstrap dashboard, admin theme, dashboard template, bootstrap dashboard template, bootstrap admin panel, dashboard theme, best admin template, dashboard theme, website templates, bootstrap 4 admin template">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= site_url(); ?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url(); ?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/icon/feather/css/feather.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/icon/themify-icons/themify-icons.css">    
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" href="<?= site_url(); ?>assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/chartist/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/css/widget.css">

    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/datedropper/css/datedropper.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/bootstrap-daterangepicker/css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/pnotify/css/pnotify.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/pnotify/css/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/pnotify/css/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/pnotify/css/pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/pnotify/css/pnotify.mobile.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/multiselect/css/multi-select.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/bower_components/spectrum/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/pages/pnotify/notify.css">

    <script type="text/javascript" src="<?= site_url(); ?>assets/bower_components/jquery/js/jquery.min.js"></script>  

</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.html">
                            <img class="img-fluid" src="<?= site_url(); ?>assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
    										<i class="feather icon-x input-group-text"></i>
    									</span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
    										<i class="feather icon-search input-group-text"></i>
    									</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= site_url(); ?>assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= site_url(); ?>assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= site_url(); ?>assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon feather icon-settings"></i>
                                        <!-- <img src="<?= site_url(); ?>assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="feather icon-chevron-down"></i> -->
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li class="drp-u-details">
                                            <img src="<?= site_url(); ?>assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                            <span>John Doe</span>
                                            <a href="<?= site_url('user/logout') ?>" class="dud-logout" title="Logout">
                                                <i class="feather icon-log-out"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="feather icon-user"></i> Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="ti-lock"></i> Ganti Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- [ chat user list ] start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius img-radius" src="<?= site_url(); ?>assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2" data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= site_url(); ?>assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3" data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= site_url(); ?>assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4" data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= site_url(); ?>assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-default"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5" data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= site_url(); ?>assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-default"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ chat user list ] end -->

            <!-- [ chat message ] start -->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                                        <img class="media-object img-radius img-radius m-t-5" src="<?= site_url(); ?>assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                                        <img class="media-object img-radius img-radius m-t-5" src="<?= site_url(); ?>assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ chat message ] end -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <?php 
                                                                            
                                        foreach ($this->menu as $key => $value) {          
                                            if ($value->is_sub == '1' && count($this->sub_menu[$key]) > 0) {
                                                $class = 'pcoded-hasmenu';
                                            }elseif ($value->no_urut == '1') {
                                                $class = 'active';
                                            }else{
                                                $class = '';
                                            }
                                    ?>
                                    <li class="<?= $class ?>">
                                        <a href="<?= $value->url ?>" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="<?= $value->icon ?>"></i></span>
                                            <span class="pcoded-mtext"> <?= $value->menu ?> </span>
                                        </a>
                                        <?php 

                                            if ($value->is_sub == '1' && count($this->sub_menu[$key]) > 0) { ?>
                                        <ul class="pcoded-submenu">
                                                <?php foreach ($this->sub_menu[$key] as $keys => $values) { ?>
                                            <li class="">
                                                <a href="<?= $values->url ?>" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext"><?= $values->sub_menu ?></span>
                                                </a>
                                            </li>
                                                <?php } ?>
                                        </ul>
                                            <?php }else{}; ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <?php echo $contents;?>
                </div>
                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript">
        var list = <?php echo json_encode($this->button) ?>;
        var base_url = "<?php echo site_url(); ?>";
    </script>
    
    <script type="text/javascript" src="<?= site_url(); ?>assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>assets/bower_components/popper.js/js/popper.min.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script> <script src="<?= site_url(); ?>assets/pages/data-table/extensions/select/js/dataTables.select.min.js"></script>
    
    <script type="text/javascript" src="<?= site_url(); ?>assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>  
    <script src="<?= site_url(); ?>assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>      
    
    <script src="<?= site_url(); ?>assets/pages/waves/js/waves.min.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script src="<?= site_url(); ?>assets/pages/chart/float/jquery.flot.js"></script>
    <script src="<?= site_url(); ?>assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="<?= site_url(); ?>assets/pages/chart/float/curvedLines.js"></script>
    <script src="<?= site_url(); ?>assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>
    <script src="<?= site_url(); ?>assets/pages/widget/amchart/amcharts.js"></script>
    <script src="<?= site_url(); ?>assets/pages/widget/amchart/serial.js"></script>
    <script src="<?= site_url(); ?>assets/pages/widget/amchart/light.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/chartist/js/chartist.js"></script>
    <script src="<?= site_url(); ?>assets/js/pcoded.min.js"></script>
    <script src="<?= site_url(); ?>assets/js/vertical/vertical-layout.min.js"></script>
    <script src="<?= site_url(); ?>assets/js/underscore.js"></script>
    <script src="<?= site_url(); ?>assets/js/moment.min.js"></script>
    <script src="<?= site_url(); ?>assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script src="<?= site_url(); ?>assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script src="<?= site_url(); ?>assets/js/script.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.desktop.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.buttons.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.confirm.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.callbacks.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.animate.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.history.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.mobile.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/pnotify/js/pnotify.nonblock.js"></script>
    <script src="<?= site_url(); ?>assets/bower_components/select2/js/select2.full.min.js"></script>     
    <script src="<?= site_url(); ?>assets/bower_components/multiselect/js/jquery.multi-select.js"></script>     
    <script src="<?= site_url(); ?>assets/pages/advance-elements/select2-custom.js"></script>  
    <script src="<?= site_url(); ?>assets/bower_components/datedropper/js/datedropper.min.js"></script>     
    <script src="<?= site_url(); ?>assets/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script> 
    <script src="<?= site_url(); ?>assets/bower_components/spectrum/js/spectrum.js"></script>     
    <script src="<?= site_url(); ?>assets/pages/advance-elements/custom-picker.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-masking/inputmask.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-validation/validate.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-validation/form-validation.js"></script>
    <script src="<?= site_url(); ?>assets/js/pcoded.min.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-masking/jquery.inputmask.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-masking/autoNumeric.js"></script>
    <script src="<?= site_url(); ?>assets/pages/form-masking/form-mask.js"></script>    
    <script src="<?= site_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= site_url(); ?>assets/js/aing.js"></script>  
</body>

</html>
