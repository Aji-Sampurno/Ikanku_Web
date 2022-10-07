<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/icon.png" />

    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-primary">
	 <div class="container">
       <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 p-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
									<div class="text-center">
										 <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                            <?php echo $this->session->flashdata('pesan'); ?>
                                    </div>
									<form class="user" action="<?php echo base_url('Ikanku/cek_log');?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" aria-describedby="username" placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                        </div>
                                       <input type="submit" name="btn_log" value="Login" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
</body>
</html>
