<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Knowledge</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Knowledge" />
    <script>
        addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="<?= base_url()?>asset/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Bootstrap-CSS -->
    <link href="<?= base_url()?>asset/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Style-CSS -->
    <link href="<?= base_url()?>asset/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="<?= base_url()?>asset///fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="<?= base_url()?>asset///fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <!-- //Web-Fonts -->
</head>

<body>
    <!-- header -->
    <header id="move-to-top">
        <div class="container" id="home">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="<?= base_url()?>">Knowledge</a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <!-- <li><a href="<?= base_url()?>">Home</a></li> -->
                            <li><a href="<?= base_url()?>Question">Questions</a></li>
                            <li><a href="<?= base_url()?>Question/add_question">Ask Something</a></li>
                            <li><a href="<?= base_url()?>Contact">Contact</a></li>
                            <?php if (empty($this->session->userdata('userid'))) { ?>
                            <li><a href="<?= base_url()?>Login">Login</a></li>
                            <li><a href="<?= base_url()?>Register">Register</a></li>
                            <?php } else{ ?>
                    <li><a  href="<?= base_url()?>Question/my_questions">My Questions</a></li>
                    <li><a  href="<?= base_url()?>Contact/my_messages">Messages</a></li>
                    <li><a href="<?= base_url()?>Logout">Logout</a></li>
                    <li>
                        
                    </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <!-- //header -->

