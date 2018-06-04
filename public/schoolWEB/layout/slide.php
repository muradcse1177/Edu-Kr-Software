<div id="layerslider">
    <?php

                include 'db_conn.php';
                $sql = "SELECT * FROM web_slide_img";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                    $image = $row["image"];
                    $imageText = $row["imageText"];
                ?>

                <div class="ls-slide" data-ls="transition2d:104;timeshift:-2000;">
                    <!-- Background image -->
                    <img src="<?php echo "/school/public".$image; ?>" class="ls-bg"  alt="Slide background"/>
                    <!-- Parallax Image -->
                    <img src="img/sun.png" class="ls-l img-responsive hidden-xs hidden-sm parallax1" alt="" data-ls="delayin:1000;easingin:fadeIn;parallaxlevel:7;">
                    <!-- Text -->
                    <div class="ls-l header-text container" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;">
                        <h1>Welcome to <?php echo $schoolName ?></h1>
                        <p class="subtitle hidden-xs"><?php echo $imageText ; ?></p>
                    </div>
                    <!-- Parallax Image -->
                    <img src="img/flower.png" class="ls-l img-responsive hidden-xs hidden-sm parallax2" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:6;">
                </div>
                <?php
            }
        }
    ?>

</div>
