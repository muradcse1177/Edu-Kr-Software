<div class="hidden-xs container-fluid cloud-divider">
    <svg id="deco-clouds1" class="head" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
               M0 100 Q 5 0 10 100
               M5 100 Q 10 30 15 100
               M10 100 Q 15 10 20 100
               M15 100 Q 20 30 25 100
               M20 100 Q 25 -10 30 100
               M25 100 Q 30 10 35 100
               M30 100 Q 35 30 40 100
               M35 100 Q 40 10 45 100
               M40 100 Q 45 50 50 100
               M45 100 Q 50 20 55 100
               M50 100 Q 55 40 60 100
               M55 100 Q 60 60 65 100
               M60 100 Q 65 50 70 100
               M65 100 Q 70 20 75 100
               M70 100 Q 75 45 80 100
               M75 100 Q 80 30 85 100
               M80 100 Q 85 20 90 100
               M85 100 Q 90 50 95 100
               M90 100 Q 95 25 100 100
               M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>
</div>
<section id="services" class="color-section">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="section-heading">
                <h2>Principal Message</h2>
            </div>
        </div>
        <div class="row">
            <?php
                include 'db_conn.php';
                $sql = "SELECT * FROM web_principal_message limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $principalName = $row["principalName"];
                        $photo = $row["photo"];
                        $message = $row["message"];
                    }
                }
            ?>
            <div class="col-md-12 col-lg-7 text-center">
                <h3 class="text-center"> <?php if(isset($principalName)) echo $principalName ?></h3>
                <p> <?php if(isset($message)) echo $message ?></p>
            </div>
            <div class="col-md-12 col-lg-5">
                <img src="<?php echo $photo ?>" alt="" class="img-responsive center-block">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="service float">
                    <img src="schoolWEB/img/service1.jpg" alt="" class="img-circle center-block img-responsive">
                    <h4>Infants</h4>
                    <p>Lectus placerat a ultricies a,interdum donec eget metus auguen u Fusce mollis imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 res-margin">
                <div class="service float">
                    <img src="schoolWEB/img/service2.jpg" alt="" class="img-circle center-block img-responsive">
                    <h4>Toddlers</h4>
                    <p>Lectus placerat a ultricies a,interdum donec eget metus auguen u Fusce mollis imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service float">
                    <img src="schoolWEB/img/service3.jpg" alt="" class="img-circle center-block img-responsive">
                    <h4>Pre School</h4>
                    <p>Lectus placerat a ultricies a, interdum donec eget metus auguen u Fusce mollis imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="activities">
    <div class="container">
        <div class="section-heading">
            <h2>Our Activities</h2>
        </div>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1" data-toggle="tab">Noticeboard</a></li>
            <li><a href="#tab2" data-toggle="tab">Upcoming Events</a></li>
            <li><a href="#tab3" data-toggle="tab">Featured News</a></li>
            <li><a href="#tab4" data-toggle="tab">Academic Calender</a></li>
        </ul>
        <div class="tabbable">
            <div class="tab-content col-md-12 col-centered">
                <div class="tab-pane active in fade" id="tab1">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 pull-left">
                            <img src="schoolWEB/img/activity1.jpg" alt="" class="img-responsive img-circle">
                        </div>
                        <div class="col-md-7 col-lg-7 pull-left">
                            <h3>Noticeboard</h3>
                            <div class="panel-group" id="accordion">
                                <?php
                                $sql = "SELECT * FROM noticeboard where type ='noticeboard' order by id desc limit 10";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count=1;
                                    while ($row = $result->fetch_assoc()) {
                                        $title = $row["noticeTitle"];
                                        $notice = $row["notice"];
                                        $noticeFor = $row["noticeFor"];
                                        $file = $row["file"];
                                        $endDate = $row["enddate"];
                                        if($count==1) {
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php if(isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collapse<?php if(isset($count)) echo $count ?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                            <h6>
                                                                <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                            </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php if(isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collapse<?php  if(isset($count)) echo $count ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                            <h6>
                                                                <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                            </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                <?php

                                        }
                                        $count++;
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 pull-left">
                            <img src="schoolWEB/img/activity2.jpg" alt="" class="img-responsive img-circle">
                        </div>
                        <div class="col-md-7 col-lg-7 pull-left">
                            <h3>Upcoming Events</h3>
                            <div class="panel-group" id="accordion2">
                                <?php
                                $sql = "SELECT * FROM noticeboard where type ='upcoming' order by id desc limit 10 ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count=1;
                                    while ($row = $result->fetch_assoc()) {
                                        $title = $row["noticeTitle"];
                                        $notice = $row["notice"];
                                        $noticeFor = $row["noticeFor"];
                                        $file = $row["file"];
                                        $endDate = $row["enddate"];
                                        if($count==1) {
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collaps<?php if(isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collaps<?php if(isset($count)) echo $count ?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                            <h6>
                                                                <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                            </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collaps<?php if (isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collaps<?php if (isset($count)) echo $count ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                            <h6>
                                                                <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                            </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                                        }
                                        $count++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 pull-left">
                            <img src="schoolWEB/img/activity3.jpg" alt="" class="img-responsive img-circle">
                        </div>
                        <div class="col-md-7 col-lg-7 pull-left">
                            <h3>Featured News</h3>
                            <div class="panel-group" id="accordion3">
                                <!-- Question 1 -->
                                <?php
                                $sql = "SELECT * FROM noticeboard where type ='featured' order by id desc limit 10 ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count=1;
                                    while ($row = $result->fetch_assoc()) {

                                        $title = $row["noticeTitle"];
                                        $notice = $row["notice"];
                                        $noticeFor = $row["noticeFor"];
                                        $file = $row["file"];
                                        $endDate = $row["enddate"];
                                        if($count==1) {
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapsee<?php if (isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collapsee<?php if (isset($count)) echo $count ?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                        <h6>
                                                            <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                        </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapsee<?php if (isset($count)) echo $count ?>"><?php if(isset($title)) echo $title ?></a>
                                                    </h6>
                                                </div>
                                                <div id="collapsee<?php if (isset($count)) echo $count ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <h5>
                                                            <?php echo "Notice For:". $noticeFor ?>
                                                        </h5>
                                                        <p>
                                                            <?php echo $notice ?>
                                                        </p>
                                                        <?php if (isset($file)){ ?>
                                                            <h6>
                                                                <a href="noticeDownload?file=<?php echo $file ?>" >Download Attached File</a>
                                                            </h6>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                                        }
                                        $count++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab4">
                    <iframe src="/background-events" height="400px" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="callout" class="small-section">
    <div class="hidden-xs">
        <div class="cloud x1"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
        <div class="cloud x6"></div>
        <div class="cloud x7"></div>
    </div>
    <div class="container">
        <div class="sun hidden-sm hidden-xs">
            <div class="sun-face">
                <div class="sun-hlight"></div>
                <div class="sun-leye"></div>
                <div class="sun-reye"></div>
                <div class="sun-lred"></div>
                <div class="sun-rred"></div>
                <div class="sun-smile"></div>
            </div>
            <div class="sun-anime">
                <div class="sun-ball"></div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
                <div class="sun-light"><b></b><s></s>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 text-center">
            <div class="well">
                <h3>Visit Our School</h3>
                <p>Lotam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi Suspendisse a elementum anteu imperdiet et maecenas eu eros non nibh aliquet iaculis..</p>
                <div class="page-scroll">
                    <a class="btn" href="#contact">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="section-heading">
                <h2>About us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-5">

                <div id="owl-about" class="owl-carousel">
                <?php

                include 'db_conn.php';
                $sql = "SELECT * FROM web_gallery where status = 'Active' order by id desc limit 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image = $row["image"];
                        ?>
                        <div class="item">
                            <img class="img-responsive" src="<?php if(isset($image)) echo $image; ?>" alt="">
                        </div>
                <?php

                    }
                }
                ?>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                <h3>Our Philosophy</h3>

                <p><?php  if(isset($aboutSchool))  echo $aboutSchool ; ?></p>
            </div>
        </div>
        <div class="row features">
            <div class="col-lg-4 col-sm-12">
                <div class="media text-center">
                    <i class="flaticon-game"></i>
                    <div class="media-body">
                        <h5 class="media-heading">Infrastructure</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="media text-center">
                    <i class="flaticon-two"></i>
                    <div class="media-body">
                        <h5 class="media-heading">Small Class Size</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="media text-center">
                    <i class="flaticon-fruit"></i>
                    <div class="media-body">
                        <h5 class="media-heading">Certified Tutors</h5>
                    </div>
                </div>
            </div>
        <div class="col-lg-12 col-sm-12 paper_block">
            <h3 class="text-center">What Parents Think</h3>
            <div id="owl-testimonials" class="owl-carousel">
                <?php
                    $sql = "SELECT * FROM web_testimonial  where status = 'Active' order by id desc limit 10";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $designation = $row["designation"];
                            $image = $row["image"];
                            $description = $row["description"];
                            ?>

                            <blockquote>
                                <div class="col-md-4 col-lg-4 col-centered">
                                    <img src="<?php  if(isset($image)) echo $image; ?>" alt="" class="img-responsive img-circle">
                                </div>
                                <div class="col-md-10 col-md-offset-1 quote-test">
                                    <p><?php if(isset($description)) echo  $description ;?></p>
                                    <small><i class="fa fa-user"></i><?php  if(isset($name)) echo  $name." , ".$designation ;?></small>
                                </div>
                            </blockquote>

                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<div class="parallax-object1 hidden-sm hidden-xs" data-0="opacity:1;"
     data-100="transform:translatey(40%);"
     data-center-center="transform:translatey(-180%);">
    <img src="schoolWEB/img/parallaxobject1.png" alt="">
</div>

<section id="team" class="color-section">
    <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
    </svg>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="section-heading">
                <h2>Honorable Teachers</h2>
            </div>
        </div>
        <div class="row team">
            <div class="col-lg-5 col-md-5 res-margin">
                <img src="schoolWEB/img/teammain.jpg" class="center-block img-responsive img-curved" alt=""/>
            </div>
            <div class="col-lg-7 col-md-7">
                <h3>Meet our Qualified Teachers</h3>
                <p>
                    Teachers are one of the most important factors in guaranteeing success for our students. That is why we are committed to providing you with the best qualified and the most experienced teaching professionals.
                    OUR teachers are highly qualified. Many teachers have a good qualification. All teachers have as a minimum a certificate in teaching English.Our teachers are very experienced. All teachers have at least two years full-time teaching experience and
                    highly expert in the use of the English language.Teachers are engaged in continual professional development.

                </p>
            </div>
        </div>
        <div id="owl-team" class="owl-carousel">
            <?php
            $sql = "SELECT * FROM web_teacher_info where status = 'Active' order by id desc limit 20";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $designation = $row["designation"];
                    $image = $row["image"];
                    ?>

                    <div class="col-lg-12">
                        <div class="team-item">
                            <img src="<?php if(isset($image)) echo $image; ?>" alt=""/>
                            <div class="team-caption">
                                <h5 class="text-light"><?php if(isset($name)) echo $name; ?></h5>
                                <p><?php if(isset($designation)) echo $designation; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </div>
</section>

<div class="parallax-object2 hidden-sm hidden-xs" data-0="opacity:1;"
     data-start="margin-top:40%"
     data-100="transform:translatey(0%);"
     data-center-center="transform:translatey(-180%);">
    <img src="schoolWEB/img/parallaxobject2.png" alt="">
</div>


<section id="gallery" class="color-section">
    <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
    </svg>
    <div class="container">
        <div class="section-heading">
            <h2>Our Gallery</h2>
        </div>
        <div class="text-center col-md-12">
            <ul class="nav nav-pills cat text-center" role="tablist" id="gallerytab">
                <li class="active"><a href="#" data-toggle="tab" data-filter="*">All</a>
                <li><a href="#" data-toggle="tab" data-filter=".image">Events</a></li>
                <li><a href="#" data-toggle="tab" data-filter=".video">Our Facilities</a></li>
            </ul>
        </div>
        <!-- Gallery -->
        <div class="row">
            <div class="col-md-12">
                <div id="lightbox">
                    <?php
                    $sql = "SELECT * FROM web_gallery limit 12";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $type = $row["type"];
                            $image = $row["image"];
                            $file = $row["file"];
                            ?>
                                <div class="col-sm-6 col-md-6 col-lg-4 <?php if(isset($type)) echo $type ; ?>">
                                    <div class="portfolio-item">
                                        <div class="gallery-thumb">
                                            <img class="img-responsive" src="<?php if(isset($image)) echo $image; ?>" alt="">
                                            <span class="overlay-mask"></span>
                                            <a href="<?php if(isset($file)) echo $file; ?>" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
                                                <i class="fa fa-expand"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>


<div class="parallax-object3 hidden-sm hidden-xs" data-0="opacity:1;"
     data-100="transform:translatex(0%);"
     data-center-center="transform:translatex(380%);">
    <img src="schoolWEB/img/parallaxobject3.png" alt="">
</div>

<section id="prices" class="color-section">
    <svg id="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
    </svg>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="section-heading">
                <h2>Our Success</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 text-center">
                <div class="pricing pricing-palden">
                    <div class="pricing-item col-lg-3 col-md-3 col-sm-12">
                        <div class="pricing-deco">
                            <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                              <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                           </svg>
                            <div class="pricing-price"><span class="pricing-currency"></span><?php if(isset($file)) echo $totalteacher; ?>
                                <span class="pricing-period"></span>
                            </div>
                            <h3 class="pricing-title">Teachers</h3>
                        </div>

                    </div>
                    <div class="pricing-item pricing-item-featured col-lg-3 col-md-3 col-sm-12">
                        <div class="pricing-deco">
                            <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                              <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                           </svg>
                            <div class="pricing-price"><span class="pricing-currency"></span><?php if(isset($totalstudent)) echo $totalstudent; ?>
                                <span class="pricing-period"></span>
                            </div>
                            <h3 class="pricing-title">Students Enrolled</h3>
                        </div>
                    </div>
                    <div class="pricing-item col-lg-3 col-md-3 col-sm-12">
                        <div class="pricing-deco">
                            <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                              <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                           </svg>
                            <div class="pricing-price"><span class="pricing-currency"></span><?php if(isset($successrate)) echo $successrate."%"; ?>
                                <span class="pricing-period"></span>
                            </div>
                            <h3 class="pricing-title">Success</h3>
                        </div>
                    </div>
                    <div class="pricing-item pricing-item-featured col-lg-3 col-md-3 col-sm-12">
                        <div class="pricing-deco">
                            <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                              <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                           </svg>
                            <div class="pricing-price"><span class="pricing-currency"></span><?php if(isset($parsat)) echo $parsat."%"; ?>
                                <span class="pricing-period"></span>
                            </div>
                            <h3 class="pricing-title">Parents Satisfaction</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="call-to-action" class="small-section">
    <div class="container text-center">
        <div class="col-lg-6 col-lg-offset-6 col-sm-6">
            <div class="well">
                <h3>Get more Information</h3>
                <p>Lorem av ipsum dolor sit amet, dorem ipsuem ore consectetur adipisicing elit semprem Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et em explicabo tenetur lore apsuet!</p>
                <div class="page-scroll">
                    <a class="btn" href="#about">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="color-section">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="section-heading">
                <h2>Contact us</h2>
            </div>
        </div>
        <div class="col-lg-4 text-center">
            <h4>Information</h4>
            <div class="contact-info">
                <?php if(isset($email)){ ?><p><i class="flaticon-back"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p> <?php }?>
                <?php if(isset($contactNumber1)){ ?> <p><i class="fa fa-phone margin-icon"></i>Call us <?php echo $contactNumber1." , ". $contactNumber2; ?></p> <?php }?>
                <?php if(isset($faxNumber)){ ?> <p><i class="fa fa-phone margin-icon"></i>Fax Number <?php echo $faxNumber." , EIIN:". $eiinNumber; ?></p> <?php }?>
                <?php if(isset($establishYear)){ ?> <p><i class="fa fa-bank"></i>EstaBlished Year: <?php echo $establishYear ?></p> <?php }?>

            </div>
            <p>We are located at --<?php echo $address; ?> </p>
            <div id="map-canvas" style="height: 90px;"></div>
        </div>
        <div class="col-lg-7 col-lg-offset-1">
            <h4>Write us</h4>
            <div id="contact_form">
                <form id="contactUs">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control input-field" placeholder="Name" required="">
                        <input type="email" name="email" class="form-control input-field" placeholder="Email ID" required="">
                        <input type="text" name="phone" class="form-control input-field" placeholder="Phone Number" required="">
                    </div>
                    <textarea name="comment" id="message" class="textarea-field form-control" rows="4" placeholder="Enter your message" required=""></textarea>
                    <button type="submit" id="" value="Submit" class="btn center-block">Send message</button>
                </form>
            </div>
            <div id="contact_results"></div>
        </div>
    </div>
</section>

<div class="container-fluid cloud-divider">
    <svg id="deco-clouds" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
               M0 100 Q 5 0 10 100
               M5 100 Q 10 30 15 100
               M10 100 Q 15 10 20 100
               M15 100 Q 20 30 25 100
               M20 100 Q 25 -10 30 100
               M25 100 Q 30 10 35 100
               M30 100 Q 35 30 40 100
               M35 100 Q 40 10 45 100
               M40 100 Q 45 50 50 100
               M45 100 Q 50 20 55 100
               M50 100 Q 55 40 60 100
               M55 100 Q 60 60 65 100
               M60 100 Q 65 50 70 100
               M65 100 Q 70 20 75 100
               M70 100 Q 75 45 80 100
               M75 100 Q 80 30 85 100
               M80 100 Q 85 20 90 100
               M85 100 Q 90 50 95 100
               M90 100 Q 95 25 100 100
               M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>
</div>