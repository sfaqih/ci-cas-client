<?php 
    $config =& get_config();
?>
<!DOCTYPE html>

<html lang="en-us" class="no-js">

	<head>
		<meta charset="utf-8">
		<title>404 Not Found</title>
		<meta name="description" content="Dash Able 404 Error page design" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Codedthemes">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= $config['base_url'] ?>/assets/images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?= $config['base_url'] ?>/assets/css/style_error.css" />
	</head>

	<body>

        <canvas id="dotty"></canvas>

        <!-- Your logo on the top left -->
        <a href="#" class="logo-link" title="back home">

            <img src="<?= $config['base_url'] ?>/assets/images/logo.png" class="logo" alt="Company's logo" />

        </a>

        <div class="content">

            <div class="content-box">

                <div class="big-content">

                    <!-- Main squares for the content logo in the background -->
                    <div class="list-square">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                    </div>

                    <!-- Main lines for the content logo in the background -->
                    <div class="list-line">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                    <!-- The animated searching tool -->
                    <i class="fa fa-search" aria-hidden="true"></i>

                    <!-- div clearing the float -->
                    <div class="clear"></div>

                </div>

                <!-- Your text -->
                <h1>Oops! Error 404 not found.</h1>

                <p>The page you were looking for doesn't exist.<br>
                    We think the page may have moved.</p>

            </div>

        </div>

    <footer class="light">
        <ul>
            <li><a href="#">Support</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </footer>
        <script src="<?= $config['base_url'] ?>/assets/bower_components/jquery/js/jquery.min.js">
        </script>
        <script src="<?= $config['base_url'] ?>/assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
        <!-- Mozaic plugin -->
        <script src="<?= $config['base_url'] ?>/assets/js/mozaic.js"></script>

    </body>

</html>
