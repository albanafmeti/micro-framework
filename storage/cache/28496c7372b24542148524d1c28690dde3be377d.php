<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route("/")); ?>">TECHALIN.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="<?php echo e(route_is("/") ? 'active' : ''); ?>"><a href="<?php echo e(route("/")); ?>">HOME</a></li>
                <li class="<?php echo e(route_is("about") ? 'active' : ''); ?>"><a href="<?php echo e(route("about")); ?>">ABOUT</a></li>
                <li class="<?php echo e(route_is("contact") ? 'active' : ''); ?>"><a href="<?php echo e(route("contact")); ?>">CONTACT</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>