@extends("layouts.main")

@section("title", "About")

@section("content")
    <!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>About.</h3>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div><!-- /blue -->


    <!-- *****************************************************************************************************************
     AGENCY ABOUT
     ***************************************************************************************************************** -->

    <div class="container mtb">
        <div class="row">
            <div class="col-lg-6">
                <img class="img-responsive" src="assets/img/agency.jpg" alt="" style="margin-top: 10px">
            </div>

            <div class="col-lg-6">
                <h4>More About Our Agency.</h4>

                <p>We’re a small team of creative developers, designers and salesman located in Tirana, Albania. We love
                    to work on great products for clients to help them achieve their goals together with our expertise,
                    creativity and crafting.</p>

                <p>From start to finish, we were extremely pleased with TechAlin... The staff is exceptional and did a
                    great job listening to our needs and priorities, offering suggestions and ultimately delivering a
                    product that we are proud to send our customers to.</p>

                <p>With an open line of communication, proactive strategy planning, and solutions designed to fit your
                    needs, anything is possible.</p>

                <p>Assembling a team is not about filling seats – it’s about finding people whose individual talents and
                    demeanor complement each other. Every member of the TechAlin team brings something unique to the
                    table. From day-to-day brainstorming through execution, our collaborative process results in work
                    we’re proud of.</p>

                <p><br/><a href="{{ route("contact") }}" class="btn btn-theme">Contact Us</a></p>
            </div>
        </div>
        <!--/row -->
    </div><!--/container -->
@endsection