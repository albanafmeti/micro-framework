@extends("layouts.main")

@section("title", "Contact")

@section("content")


    <!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>Contact.</h3>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div><!-- /blue -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ flash_show() }}
            </div>
        </div>
    </div>

    <!-- *****************************************************************************************************************
     CONTACT FORMS
     ***************************************************************************************************************** -->

    <div class="container mtb">
        <div class="row">
            <div class="col-lg-8">
                <h4>Just Get In Touch!</h4>

                <div class="hline"></div>
                <p>Drop us a line or just say Hello!</p>

                <form role="form" method="post" action="{{ route('contact') }}">
                    <div class="form-group">
                        <label for="InputName1">Your Name</label>
                        <input type="text" name="name" class="form-control" value="{{ data_valueOf("name") }}">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail1">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                               value="{{ data_valueOf("email") }}">
                    </div>
                    <div class="form-group">
                        <label for="InputSubject1">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message1">Message</label>
                        <textarea class="form-control" name="message" id="message1" rows="3"></textarea>
                    </div>
                    <button type="submit" name="send" class="btn btn-theme">Send</button>
                    {!! data_clear() !!}
                </form>
            </div>
            <!--/col-lg-8 -->

            <div class="col-lg-4">
                <h4>Our Address</h4>

                <div class="hline"></div>
                <p>
                    Ana Residentials,<br/>
                    1020, Tirana,<br/>
                    Albania.<br/>
                </p>

                <p>
                    Email: info@techalin.com<br/>
                    Tel: +355 69 217 9931
                </p>

            </div>
        </div>
        <!--/row -->
    </div><!--/container -->

@endsection