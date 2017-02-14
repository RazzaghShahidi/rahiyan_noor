<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/05/2017
 * Time: 12:56 AM
 *Description:the master page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Angular </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>


    <link href="<?php echo base_url(); ?>assets/css/dash.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            width: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<!--start section navbar that include logo and status user-->
<div class="headinfo">
    <div class="logo">
        Sarwin
        <span>RahianNoor</span>
    </div>
    <div class="status">


        <ul class="nav top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <b
                            class="caret"> </b> <?php echo $username; ?><i class="fa fa-user"></i> </a>
                <ul class="dropdown-menu">

                    <li>
                        <a href="<?php base_url()?>login/logout"> خروج <i class="fa fa-fw fa-power-off"></i></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!--end section navbar -->

<!--  Start main content that include sidebar and left content  -->
<div class="maincontent">
    <!--  Start Sidebar    -->
    <div class="sm-side">
        <ul class="wrapper">
            <li><a href="<?php echo base_url()?>dashboard">صفحه اصلی</a></li>
            <li><a href="#">مدیریت مناطق<span class="glyphicon glyphicon-chevron-right down-up"
                                              aria-hidden="true"></span></a>
                <ul>
                    <li><a href="<?php base_url() ?>manategh/add">افزودن مناطق</a></li>
                    <li><a href="<?php base_url() ?>manategh">لیست مناطق</a></li>
                </ul>
            </li>
            <li><a href="#">مدیریت عملیات<span class="glyphicon glyphicon-chevron-right down-up"
                                               aria-hidden="true"></span></a>
                <ul>
                    <li><a href="<?php base_url() ?>ammaliyat/add">افزودن عملیات</a></li>
                    <li><a href="<?php base_url() ?>ammaliyat">لیست عملیات</a></li>
                </ul>
            </li>
            <li><a href="#">مدیریت شهدا<span class="glyphicon glyphicon-chevron-right down-up"
                                             aria-hidden="true"></span></a>
                <ul>
                    <li><a href="<?php base_url() ?>shahidan/add">افزودن شهدا</a></li>
                    <li><a href="<?php base_url() ?>shahidan">لیست شهدا</a></li>
                </ul>
            </li>
            <li><a href="#">گالری<span class="glyphicon glyphicon-chevron-right down-up" aria-hidden="true"></span></a>
                <ul>
                    <li><a href="<?php base_url() ?>media/add">افزودن گالری</a></li>
                    <li><a href="<?php base_url() ?>media">لیست گالری</a></li>
                </ul>
            </li>
            <li><a href="#">فایل ها<span class="glyphicon glyphicon-chevron-right down-up" aria-hidden="true"></span></a>
                <ul>
                    <li><a href="<?php base_url() ?>term/add">افزودن فایل</a></li>
                    <li><a href="<?php base_url() ?>term">لیست فایل ها </a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--  End Sidebar    -->
    <!--        start main left content-->
    <div class="lg-side">
        <?php echo $contents; ?>
    </div>
    <!--      End left side content  -->
</div>
<!--  End main content  -->


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/<?php echo $controller_name;?>.js"></script>
</body>

</html>

