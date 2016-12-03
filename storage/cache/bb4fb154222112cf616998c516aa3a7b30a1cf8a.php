<?php $__env->startSection("title", "Home"); ?>

<?php $__env->startSection("content"); ?>

    <!-- HEADERWRAP -->
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Easy customizable for your needs</h3>

                    <h1>Simple PHP Framework for fast Web Pages.</h1>
                    <h5>Elloquent ORM and Blade templating engine like in Laravel.</h5>
                    <h5>This is an <u>example</u> website.</h5>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div><!-- /headerwrap -->


    <!-- MIDDLE CONTENT -->
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1">
                <h4>More About Our Agency.</h4>

                <p>We’re a small team of creative developers, designers and salesman located in Tirana, Albania. We love
                    to work on great products for clients to help them achieve their goals together with our expertise,
                    creativity and crafting. </p>

                <p><br/><a href="<?php echo e(route("about")); ?>" class="btn btn-theme">More Info</a></p>
            </div>

            <div class="col-lg-3">
                <h4>Frequently Asked</h4>

                <div class="hline"></div>
                <p><a href="#">How cool is this framework?</a></p>

                <p><a href="#">Need a nice good-looking site?</a></p>

                <p><a href="#">Is this framework ready?</a></p>

                <p><a href="#">Which version of Font Awesome uses?</a></p>

                <p><a href="#">Free support is integrated?</a></p>
            </div>

            <div class="col-lg-3">
                <?php echo e(module("middle-right")); ?>

            </div>

        </div>
        <!--/row -->
    </div><!--/container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>