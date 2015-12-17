@extends("site.layouts.master")

@section("body")

    @include("site.partials.navbar")

    @include("site.partials.login-modal")

    @yield("top-content")

    <div id="all">

        <!-- *** CONTENT ***__________________________________________________________________________________________________________________-->

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    @yield("content")

                </div>
                <!-- /.col-sm-12 -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /#content -->

        @include("site.partials.footer")

        <!-- *** COPYRIGHT ***_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">Wonderland.pe &copy; Todos los derechos reservados 2015. Made with <i class="fa fa-heart"></i> by <a href="http://paulvl.me" class="external">paulvl</a>.</p>
                    <p class="pull-right">
                        <img src="img/payment.png" alt="payments accepted">
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

@stop