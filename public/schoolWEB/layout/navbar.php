<?php
include 'db_conn.php';

$sql = "SELECT * FROM web_school_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $schoolName = $row["schoolName"];
        $logo = $row["logo"];
        $aboutSchool = $row["aboutSchool"];
        $totalteacher = $row["totalteacher"];
        $totalstudent = $row["totalstudent"];
        $successrate = $row["successrate"];
        $parsat = $row["parsat"];
        $contactNumber1 = $row["contactNumber1"];
        $contactNumber2 = $row["contactNumber2"];
        $email = $row["email"];
        $faxNumber = $row["faxNumber"];
        $address = $row["address"];
        $establishYear = $row["establishYear"];
        $eiinNumber = $row["eiinNumber"];
        $openingDayFrom = $row["openingDayFrom"];
        $closingDayTo = $row["closingDayTo"];
        $facebookLink = $row["facebookLink"];
        $twitterLink = $row["twitterLink"];
        $youtubeLink = $row["youtubeLink"];
        $googlPlusLink = $row["googlPlusLink"];
        $intragramLink = $row["intragramLink"];
    }
} else {
    echo "No Data Found";
}
?>


<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<!-- Page width 'Boxed' of 'Full' -->
<div class="full">
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Start Switcher -->
    <div class="demo_changer">
        <div class="demo-icon">
            <i class="fa fa-cog fa-2x"></i>
        </div><!-- end opener icon -->
        <div class="form_holder">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="predefined_styles">
                        <h4>Choose a Color Skin</h4>
                        <!-- MODULE #3 -->
                        <a href="playground.html" class="styleswitch"><img src="switcher/images/icons/playground.png" class="img-circle" alt=""></a>
                        <a href="games.html"  class="styleswitch"><img src="switcher/images/icons/games.png" class="img-circle" alt=""></a>
                        <a href="funtime.html" class="styleswitch"><img src="switcher/images/icons/funtime.png" class="img-circle" alt=""></a>
                        <h4>Width</h4>
                        <a href="boxed.html" class="btn styleswitch">Boxed</a>
                        <a href="full.html" class="btn styleswitch">Full Width</a>
                    </div><!-- end predefined_styles -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end form_holder -->
    </div><!-- end demo_changer -->
    <!-- End Switcher -->
    <!-- Navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand-centered page-scroll">
                <a href="#page-top"><img src="<?php  echo  "/school/public".$logo ?>"  alt=""></a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <div class="container">
                <ul class="nav navbar-nav page-scroll navbar-left">
                    <li><a href="#page-top">Home</a></li>
                    <li><a href="#services">Message</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#team">Teachers</a></li>
                    <li><a href="#activities">Activities</a></li>
                </ul>
                <ul class="nav navbar-nav page-scroll navbar-right">
                    <li><a href="#gallery">Gallery</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-home.html">Blog Home</a></li>
                            <li><a href="blog-post.html">Blog Post</a></li>
                            <li class="divider"></li>
                            <li class="active"><a href="#latestblog">Latest Posts</a></li>
                        </ul>
                    </li>
                    <li><a href="#prices">Success</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="elements.html">Elements</a></li>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!-- /navbar ends -->