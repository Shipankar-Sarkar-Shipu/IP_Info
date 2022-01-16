
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Domain Information</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets')}}/img/favicon.png" rel="icon">
    <link href="{{asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('assets')}}/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Kelly - v4.7.0
    * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<x-navbar></x-navbar>

<body>

<div class="jumbotron jumbotron-fluid">
    <p>
        <br>
        <br>
        <br>

    </p>

    <div class="container">
        <form class="d-flex" method="POST" action="{{url('/traced')}}">
            @csrf

            <input class="form-control  mb-2 mr-sm-2" type="search"  name='search-domain' placeholder="Search IP/Domain"  aria-label="Search">
           <button class="btn btn-outline-success my-2  my-sm-0" type="submit">Search</button>
        </form>
        <div class="container">
            <!-- Example row of columns -->

            {{--            {{dd($output)}}--}}
            <table class="table table-striped">
                <?php
                echo "<tr> <td>IP:    $ip</td></tr>";


                $lines = explode("\r\n", $output[0]);
                $info_list=array();
                foreach ($lines as $item) {
                    $splited=explode(":",$item);
                    if (count($splited)>1){
                        $splited[0]=trim($splited[0]);

                        $info_list+=array($splited[0]=>trim(join(":",array_slice($splited,1,count($splited)))));
                    }
                }
                //                    dd($info_list);

                foreach ($lines as $line) {
                    $pieces = explode(",", trim($line));
                    echo '<tr>' . "\n";
                    foreach ($pieces as $piece) {

                        echo '<td>' . trim($piece) . '</td>' . "\n";
                    }
                    echo '</tr>' . "\n";

                }
                ?>
            </table>
            <hr>

        </div> <!-- /container -->
    </div>
</div>


</body>



<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>SAJJAD</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="">SAJJAD</a>
        </div>
    </div>
</footer><!-- End  Footer -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets')}}/vendor/purecounter/purecounter.js"></script>
<script src="{{asset('assets')}}/vendor/aos/aos.js"></script>
<script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{asset('assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('assets')}}/vendor/waypoints/noframework.waypoints.js"></script>
<script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets')}}/js/main.js"></script>

</body>

</html>
