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
            <a class="navbar-brand" href="{{ route("/") }}">TECHALIN.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="{{ route_is("/") ? 'active' : '' }}"><a href="{{ route("/") }}">HOME</a></li>
                <li class="{{ route_is("about") ? 'active' : '' }}"><a href="{{ route("about") }}">ABOUT</a></li>
                <li class="{{ route_is("contact") ? 'active' : '' }}"><a href="{{ route("contact") }}">CONTACT</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>