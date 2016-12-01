<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title><?php echo $__env->yieldContent("title"); ?> | Micro Framework</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<?php echo $__env->make('partials._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent("content"); ?>

<?php echo e(module("pre-footer")); ?>



<!-- *****************************************************************************************************************
 FOOTER
 ***************************************************************************************************************** -->
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About</h4>

                <div class="hline-w"></div>
                <p>We’re a small team of creative developers, designers and salesman located in Tirana, Albania. We love
                    to work on great products for clients to help them achieve their goals together with our expertise,
                    creativity and crafting.</p>
            </div>
            <div class="col-lg-4">
                <h4>Social Links</h4>

                <div class="hline-w"></div>
                <p>
                    <a href="http://facebook.com/techalin"><i class="fa fa-facebook"></i></a>
                    <a href="http://twitter.com/techalin"><i class="fa fa-twitter"></i></a>
                    <a href="http://linkedin.com/in/techalin"><i class="fa fa-linkedin"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Our Address</h4>

                <div class="hline-w"></div>
                <p>
                    Tirana, Albania<br/>
                    1020, Ana Residentials.<br/>
                </p>
            </div>

        </div>
        <!--/row -->
    </div>
    <!--/container -->
</div>
<!--/footerwrap -->


<?php echo $__env->make("partials/_javascript", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
