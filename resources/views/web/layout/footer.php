
<footer>
    <div class="container-fluid">
        <div class="col-lg-4 col-md-6 text-center res-margin">
            <h6 class="text-light">Sign our Newsletter</h6>
            <p>We will send updates once a week.</p>
            <div id="mc_embed_signup">
                <form id="newsletter" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="mc-field-group">
                            <div class="input-group">
                                <input class="form-control input-lg required email" type="email" value="" name="email" placeholder="Your email here" id="mce-EMAIL" required>
                                <span class="input-group-btn">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn" required>
                                </span>
                            </div>
                            <div id="mce-responses" class="mailchimp">
                                <div class="alert alert-danger response" id="mce-error-response"></div>
                                <div class="alert alert-success response" id="mce-success-response"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 res-margin">
            <a href="#page-top"><img src="<?php echo $logo;?>"  alt="" height="100" width="100" class="center-block"></a>

            <div class="social-media">
                <?php if(isset($facebookLink)){ ?><a href="<?php echo $facebookLink ; ?>" title=""><i class="fa fa-facebook"></i></a>  <?php }?>
                <?php if(isset($twitterLink)){ ?><a href="<?php echo $twitterLink ?>" title=""><i class="fa fa-twitter"></i></a>  <?php }?>
                <?php if(isset($youtubeLink)){ ?><a href="<?php echo $youtubeLink ?>" title=""><i class="fa fa-youtube"></i></a>  <?php }?>
                <?php if(isset($googlPlusLink)){ ?> <a href="<?php echo $googlPlusLink ?>" title=""><i class="fa fa-pinterest"></i></a>  <?php }?>
                <?php if(isset($intragramLink)){ ?><a href="<?php echo $intragramLink ?>" title=""><i class="fa fa-instagram"></i></a>  <?php }?>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 text-center">
            <!-- Sign-->
            <h6 class="text-light">Opening Hours:</h6>
            <!-- Table-->
            <table class="table">
                <tbody>
                <tr>
                    <td class="text-left"><?php echo $openingDayFrom. "  to  ". $closingDayTo ?></td>
                    <td class="text-right">9.00 a.m. to 5.00 p.m.</td>
                </tr>
                <tr>
                    <td class="text-left">Weekends / Holidays</td>
                    <td class="text-right"><span class="label label-danger">Closed</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <p>Copyright ©  <?php echo date('Y') ?> - Designed by  <a href="http://www.parallaxsoft.com/">Parallax Soft Inc</a></p>
    <div class="page-scroll hidden-sm hidden-xs">
        <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
</div>
<script src="schoolWEB/js/jquery.min.js"></script>
<script src="schoolWEB/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
<script src="schoolWEB/js/main.js"></script>
<script src="schoolWEB/js/jquery.isotope.js"></script>
<script src='schoolWEB/js/mc-validate.js'></script>
<script src="schoolWEB/js/plugins.js"></script>
<script src="schoolWEB/js/contact.js"></script>
<script src="schoolWEB/js/prefixfree.js"></script>
<script src="schoolWEB/layerslider/js/greensock.js" type="text/javascript"></script>
<script src="schoolWEB/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="schoolWEB/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<script src="schoolWEB/switcher/js/dmss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="/js/ajax.js"></script>

<script src="/files/assets/js/bootstrap-growl.min.js"></script>
<script src="/files/assets/pages/notification/notification.js"></script>


<script>

    $(document).ready(function(){

        $("#newsletter").validate({
            rules: {
                email: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/insertNewsletter',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });
                return false;
            }
        });
        $("#contactUs").validate({
            rules: {
                email: "required",
                name: "required",
                phone: "required",
                comment: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/insertContactUs',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });
                return false;
            }
        });
    });

</script>
</body>
</html>