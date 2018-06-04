<?php
//default time zone set
date_default_timezone_set('Asia/Dhaka');
$hour = date("H");
$min = date("i");
$sec = date("s");
//reference code generation
$time=date("Y-m-d");
$time .= "%20".date("H:i:s");
$date=date("YmdHis");
$randNumber= rand(10000000,999999999);
$referencecode=$date.'01'.$randNumber;
include 'classes/gp.php';
// variable initialization
$download_free = false;
$download_more = false;
$download_new = false;
$download_flag = false;
$download_permit = false;
$price = "2.44";
$categoryName="";

//create db connection
include '../classes/connection.php';
$conn_obj = new connection;
$conn=$conn_obj->conn();


//msisdn check
include 'msisdn.php';

if(isset($_GET['content_id'])&& isset($_GET['category'])&& isset($_GET['subcategory'])){
    $content_id=$_GET['content_id'];
    $category=strtolower($_GET['category']);
    $subcategory=$_GET['subcategory'];
    $name=$_GET['name'];
    $sql="Select * from content.allcontents where contentId='$content_id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        $row= mysqli_fetch_array($result);
        $file_link=$row['fileLink'];
        $preview_link=$row['previewLink'];
        //echo $preview_link.'<br>';
        $name = $row['name'];
        $type=substr($file_link,-3);
    }
    $sqlc="Select categoryName from content.category where categoryId='$category'";
    $resultc = mysqli_query($conn,$sqlc);
    if ($resultc->num_rows > 0) {
        $rowc= mysqli_fetch_array($resultc);
        $categoryName=$rowc['categoryName'];
    }
}

if(isset($_GET["isCampaign"])){
    gp_get_charging_url("Campaign");
}

//for event mode content purcase - reply from dpdp
if(isset($_GET['status']) && isset($_GET['reply_code']) && isset($_GET['mode']) && isset($_GET['statuscode'])){
    if($_GET['mode'] == "Event" && $_GET['statuscode'] == 200 && $_GET['reply_code'] == "260CA9DD8A4577FC00B7BD5810298076"){
        $sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and contentid = '$content_id' and date(time) = curdate()";
        $result_free = mysqli_query($conn,$sql_free);
        if ($result_free->num_rows > 0) {
            // echo "from here";
            $download_free = true;
        }
        $download_permit = true;
        $sql_update_base = "UPDATE gpsubscription SET flag = 1 WHERE msisdn = '$msisdn'";
        mysqli_query($conn,$sql_update_base);
    }

}

//for on demand service
// if(isset($_GET['serviceMode'])){
// gp_get_charging_url("Event");
// }
// if(isset($_GET['serviceModeConfirmed'])){
// gp_get_charging_url("Event");
// }

$sql_subscription = "SELECT status, flag FROM gpsubscription where msisdn = '$msisdn' order by id desc limit 1";
// echo $sql_subscription;
$result_subscription = $conn->query($sql_subscription);
if ($result_subscription->num_rows > 0) {
    $row= mysqli_fetch_array($result_subscription);
    $status = $row['status'];
    $flag = $row['flag'];
    if($status =="Active" && $flag > 0){
        $sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and contentid = '$content_id' and date(time) = curdate()";
        $result_free = mysqli_query($conn,$sql_free);
        if ($result_free->num_rows > 0) {
            //echo "from here";
            $download_free = true;
        }
        $download_permit = true;
        $download_flag = true;
        //echo "Your file is downloading...";
    }
    else if( $status == "Active" && $flag < 1 ){
        $sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and contentid = '$content_id' and date(time) = curdate()";
        $result_free= $conn->query($sql_free);
        if ($result_free->num_rows > 0) {
            //echo "from here 2";
            $download_permit = true;
            $download_free = true;
        }
        else{
            $download_more = true;
            $msg = "Free download limit exceeded.";
            if(!isset($_GET['reply_code'])){
                if(isset($_GET['serviceModeConfirmed'])){
                    gp_get_charging_url("Event");
                }
                else gp_get_charging_url("Event");
            }
        }
    }
    else{
        $download_new = true;
        $msg = "Subscription charge 2.44 Tk with 2 free download daily (autorenew).";
        if(!isset($_GET['reply_code']) && !isset($_GET['serviceMode']) ){
            if(isset($_GET['serviceModeConfirmed'])){
                gp_get_charging_url("Event");
            }
            else gp_get_charging_url("Subscription");
        }
    }
}
else{
    $download_new = true;
    $msg = "Subscription charge 2.44 Tk with 2 free download daily (autorenew).";
    if(!isset($_GET['reply_code']) && !isset($_GET['serviceMode']) ){
        if(isset($_GET['serviceModeConfirmed'])){
            gp_get_charging_url("Event");
        }
        else gp_get_charging_url("Subscription");
    }
}

if(isset($_GET['success'])){
    if(isset($_GET['mode'])){
        if($_GET['mode'] == "Event" ){
            $sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and contentid = '$content_id' and date(time) = curdate()";
            $result_free = mysqli_query($conn,$sql_free);
            if ($result_free->num_rows > 0) {
                // echo "from here";
                $download_free = true;
            }
            $download_permit = true;
            $sql_update_base = "UPDATE gpsubscription SET flag = 1 WHERE msisdn = '$msisdn'";
            mysqli_query($conn,$sql_update_base);
        }
    }
    if($download_permit){
        start_file_download();
    }
}

function start_file_download()
{
    global $msisdn,$category,$subcategory, $content_id, $conn, $file_link, $preview_link, $type, $name, $referencecode, $download_free;

    $file = "../".$file_link;
    //$file = substr($file, 1);
    $filename = $name.substr($file,-4);
    $ext = substr($filename,-3);
    if($ext=='jpg')
        $type = 'image/jpeg';
    else if($ext=='png')
        $type = 'image/png';
    else if($ext=='gif')
        $type = 'image/gif';
    else if($ext=='mp4')
        $type = 'video/mp4';
    else if($ext=='3gp')
        $type = 'video/3gpp';
    else if($ext=='avi')
        $type = 'application/x-troff-msvideo';
    else if($ext=='wmv')
        $type = 'video/x-ms-wmv';
    else if($ext=='mkv')
        $type = 'video/x-matroska';
    else if($ext=='mp3')
        $type = 'audio/mpeg3';
    else if($ext=='wma')
        $type = 'audio/x-ms-wma';
    else if($ext=='apk')
        $type = 'application/vnd.android.package-archive';
    //echo "file= $file <br/> name = $filename <br/> ext = $ext <br/> type = $type <br/> file_link = $file";
    if (file_exists($file))
    {
        $sql_insert = "INSERT INTO downloaded (msisdn,category,name,contentid)VALUES('$msisdn','$category','$name','$content_id')";
        mysqli_query($conn,$sql_insert);
        $sql_update = "UPDATE $category SET downloaded= (downloaded+1) WHERE contentid='$content_id'";
        mysqli_query($conn,$sql_update);

        if($download_free==false){
            echo "ok";
            $sql_update_base = "UPDATE gpsubscription SET flag = (flag-1) WHERE msisdn = '$msisdn'";
            mysqli_query($conn,$sql_update_base);
        }
        //echo $sql_insert.'<br>'.$sql_update.'<br>'.$sql_update_base;

        //start download
        header('Content-Description: File Transfer');
        header('Cache-Control: public');
        header('Content-Type: '.$type);
        // header("Content-Type: application/octet-stream");
        // header("Content-Type: application/download");
        // header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        header('Content-Disposition: attachment; filename='. $filename);
        header('Content-Length: '.filesize($file));
        ob_clean();
        //flush();
        readfile($file);
    }
    else $show_msg = "Sorry! Your desired content could not be found.";
}
// $sql_insert="Insert into gp_chargingurl (servicekey,channel,code,amount,tax,description,currency,referenceCode,contentid, type,tittle,
// thumbnailUrl,successUrl,failureUrl,cancelUrl,notifyUrl,downloadUrl,validity,statuscode,serverReferenceCode,
// chargeRedirectUrl,errorcode,errordescription)  values('$servicekey','$accesschannel','$code','$amount','$taxAmount',
// '$description','$currency','$referencecode','$contentid','$type','$title','$thumbnailUrl','$successUrl','$failureUrl',
// '$cancelUrl','$notifyUrl','$downloadUrl','$validity','$statusCode','$serverReferenceCode',
// '$chargeRedirectUrl','$errorCode','$errorDescription')";
// $conn->query($sql_insert);

if($download_permit)
    $price = "0.00";
?>



<!--
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Value Added Services</title>
	<link rel="icon" type="image/ico" href="images/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="main_css4.css" rel="stylesheet" type="text/css" media="screen">
	<style>
		ul.pagination {
			display: inline-block;
		}

		div.center {text-align: center;}
	</style>
</head>

<body oncontextmenu="return false">
<p class="white_spacer_divider"></p><br/>

-->


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Value Added Services</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://wap.chl-bd.com/main_css4.css" rel="stylesheet" type="text/css" media="screen">
    <style>
        ul.pagination {
            display: inline-block;
        }

        div.center {text-align: center;}
    </style>
</head>

<body>
<style>
    #txtsearch{
        border-style: solid;
        border-color: #fe1a00;
        height:25px;
        color:black;
        border-radius: 5px 0px 0px 5px;
        padding-left: 5px;
    }
    #btnsearch{
        border-style: solid;
        border-color: #fe1a00;
        background-color:#fe1a00;
        color:white;
        height:30px;
        border-radius: 0px 5px 5px 0px;
    }
    .mySlides {display:none;}
</style>

<center> <img src="http://wap.chl-bd.com/images/banner.gif" width="100%" height="100%" > </center>

<p style="margin-top:-2px;"></p>

<table class="index_table" border="1" width="100%" style="background-color: ">
    <tbody>
    <tr>
        <td width="33%" height="30" align="center"  bgcolor="#fe1a00">
            <a href="./index" class="myButton-group-justified">Subscription Service</a>
        </td>
        <td width="33%" height="30" align="center" bgcolor="">
            <a href="./ondemand" class="myButton-group-justified">Pay & Download</a>
        </td>
        <td width="33%" height="30" align="center" bgcolor="">
            <a href="./gp_myaccount" class="myButton-group-justified">My Account</a>
        </td>
    </tr>
    </tbody>
</table>

<!--Marquee text
Subscription charge TK. 2.44/day(autorenew) with daily 2 FREE downloads and after daily 2 free download charge will be Tk 2.44 for every next downloads. For Pay & Download each content price is 2.44 Tk and no daily subscription fee. To Unsubscribe send STOP WP to 16437-->
<!--Search box and button-->
<table width="100%">
    <tbody>

    <tr>
        <td width="95%">
            <input id='txtsearch' style="width:100%;" name='txtsearch' placeholder='Search' type='text'/>
        </td>
        <td width="5%">
            <button id='btnsearch' style="width:100%;" type='submit' onclick="search_content();">Search</button>
        </td>
    </tr>
    </tbody>

</table>
<center>
    <img id="ajax-loader" src="/images/ajax-loading.gif" style="display:none;" />
    <center>
        <br/>
        <!--Search results-->
        <div id="search-result"> </div>

        <script>
            document.getElementById("txtsearch")
                .addEventListener("keyup", function(event) {
                    event.preventDefault();
                    if (event.keyCode == 13) {
                        document.getElementById("btnsearch").click();
                    }
                });
        </script>
        <p class="white_spacer_divider"></p><br/>


        <table width="100%">
            <tbody>
            <tr>
                <td  align="center">

                    <?php
                    if($download_permit){
                        ?>
                        <p>This <?php echo $categoryName; ?> is free for you.</p>
                        <?php
                    }
                    ?>
                    <p style="color:red;"></p>
                    <br/>
                    <a href="#"><img src="<?php echo $preview_link; ?>" width="150" height="150"></a><br/>
                    <p><b><?php echo $name; ?></b></p>
                    <p>Price: <?php echo $price;?> tk.</p>
                    <p>Category: <?php echo $categoryName; ?></p>
                    <p>Data browsing charge applicable</p>

                    <!--download button	-->
                    <form action="" method="GET" >
                        <input name="category"  type="hidden"  value="<?php echo $category; ?>">
                        <input name="subcategory"  type="hidden"  value="<?php echo $subcategory; ?>">
                        <input name="content_id"  type="hidden"  value="<?php echo $content_id; ?>">
                        <input name="name"  type="hidden"  value="<?php echo $name; ?>">
                        <?php if(isset($_GET['mode'])){ ?>
                            <input name="mode"  type="hidden"  value="<?php echo $_GET['mode']; ?>">
                        <?php } ?>
                        <?php if(isset($_GET['serviceMode']) && !isset($_GET['mode'])){ ?>
                            <input name="serviceModeConfirmed"  type="hidden"  value="<?php echo $_GET['serviceMode']; ?>">
                        <?php } ?>
                        <input name="success"  type="submit" id="success" class="myButton" role="button" value="Download">
                    </form>
                    <br/><br/>
                </td>
            </tr>
            </tbody>
        </table>
        <!-- footer -->

        <footer>

            <p align="center" style="font-size:17px; background-color:grey; font-weight:bold;"><a href="index" style="color:#de1a00;">Home</a> | <a href="faq" style="color:#de1a00;">FAQ</a> | <a href="tel:+8801787659321" style="color:#de1a00;">Helpline</a></p>
            <p style="background-color:grey;"> <b>To stop send STOP WP to 16437</b></p>

            <table class="index_table" border="0" width="100%">
                <tbody>
                <tr>
                    <td align="center" >
                        <button class="myButton" style="background-color:black; width:130px;" onMouseOver="this.style.color='#D9ED14'"  onMouseOut="this.style.color='white'" onclick="location.href='gp_unsub_confirm.php?back=/download_gp.php?ContentId=ebb57f2b28579d0585bb1272d88db6&category=VIDE&download=Download';">STOP Service</button>
                        <!--
                            <button class="myButton" style="background-color:black;  width:100px;" onMouseOver="this.style.color='#D9ED14'"  onMouseOut="this.style.color='white'" onclick="location.href='sms:16437?body=STOP%20WP';">STOP-SMS</button>
                        -->
                    </td>
                </tr>
                </tbody>
            </table>



            <p class="footerP"> <b>© Content House 2017 - All rights reserved.</b></p>
        </footer>
</body>
</html>