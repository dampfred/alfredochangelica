<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alfred och Angelica</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">A &hearts; A</a>
            </div>

        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header class="fullscreen background parallax" data-img-width="1083" data-img-height="1083" data-diff="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<img class="img-responsive" src="img/wallpaper.jpg" alt="">-->
                    <div class="intro-text">
                        <span class="name">&nbsp;TACK!</span>
                        <hr class="star-primary">
                        <span class="skills">&nbsp;Vi ses den 18 juli</span>
                        <div class="couple">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        &copy; 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
   <!-- <script src="js/jqBootstrapValidation.js"></script>-->
    <!--<script src="js/contact_me.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

    <script type="text/javascript">

        /* resize background images for touch devices */
        function backgroundResizeTouch(){
            var windowH = $(window).height();
            $(".background").each(function(i){
                var path = $(this);
                // variables
                var contW = path.width();
                var contH = path.height()+155;
                var imgW = path.attr("data-img-width");
                var imgH = path.attr("data-img-height");
                var ratio = imgW / imgH;
              
                // set img values depending on cont
                imgH = contH;
                imgW = imgH * ratio;
                // fix when too large
                if(contW > imgW){
                    imgW = contW;
                    imgH = imgW / ratio;
                }
                //

                //alert(imgH+" : "+this);
                path.data("resized-imgW", imgW);
                path.data("resized-imgH", imgH);
                path.css("background-size", imgW + "px " + imgH + "px");

            });
        }

        /* detect touch */
        if("ontouchstart" in window){
            document.documentElement.className = document.documentElement.className + " touch";            
        }
        if(!$("html").hasClass("touch")){
            /* background fix */
            $(".parallax").css("background-attachment", "fixed");
        }

        /* fix vertical when not overflow
        call fullscreenFix() if .fullscreen content changes */
        function fullscreenFix(){
            var h = $('body').height();
            // set .fullscreen height
            $(".content-b").each(function(i){
                if($(this).innerHeight() <= h){
                    $(this).closest(".fullscreen").addClass("not-overflow");
                }
            });
        }
        $(window).resize(fullscreenFix);
        fullscreenFix();

        /* resize background images */
        function backgroundResize(){
            var windowH = $(window).height();
            $(".background").each(function(i){
                var path = $(this);
                // variables
                var contW = path.width();
                var contH = path.height();
                var imgW = path.attr("data-img-width");
                var imgH = path.attr("data-img-height");
                var ratio = imgW / imgH;
                // overflowing difference
                var diff = parseFloat(path.attr("data-diff"));
                diff = diff ? diff : 0;
                // remaining height to have fullscreen image only on parallax
                var remainingH = 0;
                if(path.hasClass("parallax") && !$("html").hasClass("touch")){
                    var maxH = contH > windowH ? contH : windowH;
                    remainingH = windowH - contH;
                }
                // set img values depending on cont
                imgH = contH + remainingH + diff;
                imgW = imgH * ratio;
                // fix when too large
                if(contW > imgW){
                    imgW = contW;
                    imgH = imgW / ratio;
                }
                //
                path.data("resized-imgW", imgW);
                path.data("resized-imgH", imgH);
                path.css("background-size", imgW + "px " + imgH + "px");
            });
        }

        if(!$("html").hasClass("touch")){
            $(window).resize(backgroundResize);
            $(window).focus(backgroundResize);
            backgroundResize();
        }else{
            $(window).resize(backgroundResizeTouch);
            $(window).focus(backgroundResizeTouch);
            backgroundResizeTouch();
        }
        

        /* set parallax background-position */
        function parallaxPosition(e){
            var heightWindow = $(window).height();
            var topWindow = $(window).scrollTop();
            var bottomWindow = topWindow + heightWindow;
            var currentWindow = (topWindow + bottomWindow) / 2;
            $(".parallax").each(function(i){
                var path = $(this);
                var height = path.height();
                var top = path.offset().top;
                var bottom = top + height;
                var offsetfix = path.attr("data-diff");
                // only when in range
                if(bottomWindow > top && topWindow < bottom){
                    var imgW = path.data("resized-imgW");
                    var imgH = path.data("resized-imgH");
                    // min when image touch top of window
                    var min = 0;
                    // max when image touch bottom of window
                    var max = - imgH + heightWindow;
                    // overflow changes parallax
                    var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow; // fix height on overflow
                    top = top - overflowH;
                    bottom = bottom + overflowH;
                    // value with linear interpolation
                    var value = min + (max - min) * (currentWindow - top) / (bottom - top)+100;//offsetfix;
                    // set background-position
                    var orizontalPosition = path.attr("data-oriz-pos");
                    orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
                    $(this).css("background-position", orizontalPosition + " " + value + "px");
                }
            });
        }
        if(!$("html").hasClass("touch")){
            $(window).resize(parallaxPosition);
            //$(window).focus(parallaxPosition);
            $(window).scroll(parallaxPosition);
            parallaxPosition();
        }

    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-1756957-2', 'auto');
      ga('send', 'pageview');

    </script>

</body>

</html>
