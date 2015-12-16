@extends("site.layouts.master")

@section("body")

    @include("site.partials.navbar")

    @include("site.partials.login-modal")

    @include("site.partials.slider")

    <div id="all">

        <!-- *** ADVANTAGES ***_________________________________________________________ -->

        <div id="advantages">

            <div class="container">

                <div class="col-md-12">

                    <div class="box text-center">
                        <h3 class="text-uppercase">About Minimal</h3>

                        <p>Minimal contains <strong>23 beautiful HTML pages</strong> and is built with strong attention to detail.</p>



                        <div class="same-height-row row">
                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-heart-o"></i>
                                    </div>
                                    <h4><a href="text.html">Satisfied customers</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-tags"></i>
                                    </div>
                                    <h4><a href="text.html">Best prices</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-send-o"></i>
                                    </div>
                                    <h4><a href="faq.html">Next day delivery</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-refresh"></i>
                                    </div>
                                    <h4><a href="contact.html">Free returns for 3 months</a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>

                </div>


            </div>
            <!-- /.container -->

        </div>
        <!-- /#advantages -->

        <!-- *** ADVANTAGES END *** -->

        <!-- *** CONTENT ***__________________________________________________________________________________________________________________-->

        <div id="content">
            <div class="container">

                <div class="col-sm-12">

                    <div class="box text-center">
                        <h3 class="text-uppercase">New summer arrivals</h3>

                        <h4 class="text-muted"><span class="accent">Free shipping</span> on all</h4>
                    </div>

                    <div class="row products">

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">Fur coat with very but very very long name</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">Black Blouse Versace</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product4.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">Black Blouse Versace</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product4.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Versace</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Versace</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="image">
                                    <a href="detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                    <div class="quick-view-button">
                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="btn btn-default btn-sm">Quick view</a>
                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="detail.html">Fur coat</a></h3>
                                    <p class="price">$143.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->

                        <div class="modal fade" id="product-quick-view-modal" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                        <div class="row quick-view product-main">
                                            <div class="col-sm-6">
                                                <div class="quick-view-main-image">
                                                    <img src="img/detailbig1.jpg" alt="" class="img-responsive">
                                                </div>

                                                <div class="ribbon ribbon-quick-view sale">
                                                    <div class="theribbon">SALE</div>
                                                    <div class="ribbon-background"></div>
                                                </div>
                                                <!-- /.ribbon -->

                                                <div class="ribbon ribbon-quick-view new">
                                                    <div class="theribbon">NEW</div>
                                                    <div class="ribbon-background"></div>
                                                </div>
                                                <!-- /.ribbon -->

                                                <div class="row thumbs">
                                                    <div class="col-xs-4">
                                                        <a href="img/detailbig1.jpg" class="thumb">
                                                            <img src="img/detailsquare.jpg" alt="" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <a href="img/detailbig2.jpg" class="thumb">
                                                            <img src="img/detailsquare2.jpg" alt="" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <a href="img/detailbig3.jpg" class="thumb">
                                                            <img src="img/detailsquare3.jpg" alt="" class="img-responsive">
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">

                                                <h2>White Blouse Armani</h2>

                                                <p class="text-muted text-small text-center">White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>

                                                <div class="box">

                                                    <form>
                                                        <div class="sizes">

                                                            <h3>Available sizes</h3>

                                                            <label for="size_s">
                                                                <a href="#">S</a>
                                                                <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                                            </label>
                                                            <label for="size_m">
                                                                <a href="#">M</a>
                                                                <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                                            </label>
                                                            <label for="size_l">
                                                                <a href="#">L</a>
                                                                <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                                            </label>

                                                        </div>

                                                        <p class="price">$124.00</p>

                                                        <p class="text-center">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                                            </button>
                                                        </p>


                                                    </form>
                                                </div>
                                                <!-- /.box -->

                                                <div class="quick-view-social">
                                                    <h4>Show it to your friends</h4>
                                                    <p>
                                                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                                    </p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.modal-dialog-->
                        </div>
                        <!-- /.modal -->

                    </div>
                    <!-- /.products -->

                </div>
                <!-- /.col-sm-12 -->

            </div>
            <!-- /.container -->

            <!-- *** PROMO BAR ***_________________________________________________________ -->

            <div class="bar background-image-fixed-2 no-mb color-white text-center">
                <div class="dark-mask"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="icon icon-lg"><i class="fa fa-file-code-o"></i>
                            </div>
                            <h1>Do you want to see more?</h1>
                            <p class="lead">We have prepared for you 23 different HTML pages, including 2 variations of homepage.</p>
                            <p class="text-center">
                                <a href="index2.html" class="btn btn-primary btn-lg">Check other homepage</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- *** PROMO BAR END *** -->


            <div class="container">
                <div class="col-sm-12">
                    <!-- *** BLOG HOMEPAGE ***_________________________________________________________ -->

                    <div class="box text-center">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="text-italic text-large">What's new in the world of fashion? <span class="accent">Check our blog!</span>
                        </p>
                    </div>

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Fashion now</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->

                    <!-- *** BLOG HOMEPAGE END *** -->
                </div>
            </div>

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