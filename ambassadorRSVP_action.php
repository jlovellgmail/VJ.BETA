<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

$rootpath = $_SERVER['DOCUMENT_ROOT'];
//include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Ambassador.class.php';

$Ambassador = new Ambassador();
$Ambassador->initialize($_POST['AID']);
$ambEmail = $Ambassador->getEmail();
//$ambEmail = "savvas@study.net";
$ambFName = $Ambassador->getFName();
$userEmail = $_POST['Email'];

$subject = "Virgil James - RSVP";

//echo $ambEmail."---".$userEmail;

//$ambEmail = "savvas@study.net";

/* $message = '<p>Name: ' . $_POST['Name'] . '</p>
  <p>Email: ' . $userEmail . '</p>
  <p>Comments: ' . $_POST['Comments'] . '</p>'; */

$message = '<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width">
    <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Use the latest (edge) version of IE rendering engine -->
    <title>Virgil James - Ambassador - RSVP Event</title>
    <!-- The title tag shows in email notifications, like Android 4.4. -->
    <style type="text/css">
/* ===[ What it does: Remove spaces around the email design added by some email clients. ]=== */
	/* ===[ Beware: It can remove the padding / margin and add a background color to the compose a reply window. ]=== */
	html,  body {
	margin: 0;
	padding: 0;
	height: 100% !important;
	width: 100% !important;
}
/* ===[ What it does: Stops email clients resizing small text. ]=== */
	* {
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%;
}
/* ===[ What it does: Forces Outlook.com to display emails full width. ]=== */
	.ExternalClass {
	width: 100%
} /* ===[ What it does: Stops Outlook from adding extra spacing to tables. ]=== */
table,  td {
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt;
}
/* ===[ What it does: Fixes webkit padding issue. ]=== */
	table {
	border-spacing: 0 !important
}
/* ===[ What it does: Fixes Outlook.com line height. ]=== */
	.ExternalClass,  .ExternalClass * {
	line-height: 100%
}
/* ===[ What it does: Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. ]=== */
	table {
	border-collapse: collapse;
	margin: 0 auto;
}
/* ===[ What it does: Uses a better rendering method when resizing images in IE. ]=== */
	img {
	-ms-interpolation-mode: bicubic
}
/* ===[ What it does: Overrides styles added when Yahoos auto-senses a link. ]=== */
	.yshortcuts a {
	border-bottom: none !important
}
/* ===[ What it does: Overrides blue, underlined links auto-detected by iOS Mail. ]=== */
	/* ===[ More Info: https://litmus.com/blog/update-banning-blue-links-on-ios-devices ]=== */
	.mobile-link--footer a {
	color: #666666 !important
}
/* ===[ What it does: Overrides styles added images. ]=== */
	img {
	border: 0 !important;
	outline: none !important;
	text-decoration: none !important;
}
	
	/* ===[ What it does: Apple Mail doesnt support max-width, so a media query constrains the email container width. ]=== */
	@media only screen and (min-width: 601px) {
.email-container {
	width: 600px !important
}
}
	
	/* ===[ What it does: Apple Mail doesnt support max-width, so a media query constrains the email container width. ]=== */
	@media only screen and (max-width: 600px) {
.email-container {
	width: 100% !important;
	max-width: none !important;
}
}
</style>
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" style="margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">
    <table cellpadding="0" cellspacing="0" border="0"  width="100%" bgcolor="#FFFFFF" style="border-collapse:collapse; height:auto;">
        <tr>
            <td><!-- Visually Hidden Preheader Text : BEGIN -->
                
                <div style="display:none;font-size:1px;color:#FFFFFF;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide: all;"> </div>
                
                <!-- Visually Hidden Preheader Text : END --> 
                
                <!-- Outlook and Lotus Notes dont support max-width but are always on desktop, so we can enforce a wide, fixed width view. --> 
                <!-- Beginning of Outlook-specific wrapper : BEGIN --> 
                <!--[if (gte mso 9)|(IE)]>
  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td>
  <![endif]--> 
                <!-- Beginning of Outlook-specific wrapper : END --> 
                
                <!-- Email wrapper : BEGIN -->
                
                <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="max-width:600px; margin:auto;" class="email-container">
                    <tr>
                        <td><!-- Head Links : BEGIN -->
                            
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td valign="middle" style="padding-top:15px; padding-bottom:15px; text-align:center; font-family: Proxima Nova, Arial, sans-serif;" width="268"></td>
                                </tr>
                            </table>
                            
                            <!-- Head Links : END --> 
                            
                            <!-- Main Email Body : BEGIN -->
                            
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#000000" style=" -webkit-border-top-left-radius: 35px; -webkit-border-bottom-right-radius: 35px; -moz-border-radius-topleft: 35px; -moz-border-radius-bottomright: 35px; border-top-left-radius: 35px; border-bottom-right-radius: 35px;">
                                
                                <!-- Logo : BEGIN -->
                                <tr>
                                    <td valign="middle" style="padding:30px 15px 15px 15px; text-align:center;" width="268"><img src="http://www.virgiljames.net/img/vj_logo_white_tag.png" alt="Virgil James" width="268" height="54" border="0" align="center"></td>
                                </tr>
                                <!-- Logo : END --> 
                                
                                <!-- Dashed Rule : BEGIN -->
                                <tr>
                                    <td><table border="0" width="90%" cellpadding="0" cellspacing="0" align="center" style="text-align:center;">
                                            <tr>
                                            <td style="border-bottom:1px dashed #7A7C7E;">&nbsp;</td>
                                        </tr>
                                        </table></td>
                                </tr>
                                <!-- Dashed Rule : END --> 
                                
                                <!-- Full Width, Fluid Column : BEGIN -->
                                <tr>
                                    <td style=" font-family: Proxima Nova, Arial, sans-serif; padding:15px 6% 0px 6%; color:#fff;"><span style="font-size:36px;">Hello ' . $ambFName . ',</span></td>
                                </tr>
                                <tr>
                                    <td style="padding:15px 6% 0 6%; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #FFFFFF;"><span style="font-weight:bold;">' . $_POST['Name'] . '</span> has just sent an RSVP for ' . $_POST['EventName'] . '</td>
                                </tr>
                                <!-- Full Width, Fluid Column : END --> 
                                
                                <!-- Data Table : BEGIN -->
                                <tr>
                                    <td style="padding: 15px 6%;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%" style="">
                                            <tr>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff; font-weight: bold; border-bottom: 1px solid #cccccc; text-align:right;"> Email </td>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff; border-bottom: 1px solid #cccccc;">' . $_POST['Email'] . '</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff; font-weight: bold; border-bottom: 1px solid #cccccc; text-align:right;"> Phone Number </td>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff; border-bottom: 1px solid #cccccc;">' . $_POST['rsvp_tel'] . ' </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff; font-weight: bold; text-align:right;"> No of Guest </td>
                                                <td valign="top" align="left" style="padding: 10px 0 10px 20px; font-family: Proxima Nova, Arial, sans-serif; font-size: 14px; line-height: 1.3; color: #ffffff;">' . $_POST['rsvp_guest_no'] . '</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- Data Table : END --> 
                                
                                <!-- VJ - Contact Info: BEGIN -->
                                <tr>
                                    <td style="color:#818181; padding:15px 6%;  padding-bottom:30px; padding-top:60px; font-size: 13px; "><table border="0" width="100%" cellpadding="0" cellspacing="0" style="color:#818181;">
                                            <tbody>
                                            <tr>
                                                    <td style="font-size:13px; font-family: Proxima Nova, Arial, sans-serif; color:#818181;">Virgil James Customer Service</td>
                                                </tr>
                                            <tr>
                                                    <td style="font-size:13px; font-family: Proxima Nova, Arial, sans-serif; color:#818181;"> Tel: &zwnj; 858 &zwnj; 555 &zwnj; 555 &zwnj; </td>
                                                </tr>
                                            <tr>
                                                    <td style="font-size:13px; font-family: Proxima Nova, Arial, sans-serif; color:#818181;">Monday &zwnj; through &zwnj; Friday &zwnj; 8&zwnj;am &zwnj; 5&zwnj;pm</td>
                                                </tr>
                                            <tr>
                                                    <td style="font-size:13px; font-family: Proxima Nova, Arial, sans-serif; color:#818181;"><a style="color:#818181;" href="mailto:customerservice@virgiljames.com">customerservice@virgiljames.com</a></td>
                                                </tr>
                                            <tr>
                                                    <td style="font-family: Proxima Nova, Arial, sans-serif; font-size:13px; padding-top:20px; padding-bottom:20px; text-transform:uppercase; color:#818181;">Virgil &zwnj; James • 214 &zwnj; N. &zwnj; Cedros &zwnj; Ave. • &zwnj; Solana &zwnj; Beach, &zwnj; Ca &zwnj; 92075</td>
                                                </tr>
                                        </tbody>
                                        </table></td>
                                </tr>
                                <!-- Full Width, Fluid Column : END -->
                                
                            </table>
                            
                            <!-- Main Email Body : END --></td>
                    </tr>
                    
                    <!-- Footer : BEGIN -->
                    <tr>
                        <td style="text-align:center; padding:4% 0; font-family: Proxima Nova, Arial, sans-serif; font-size:13px; line-height:1.2; color:#000000;">&nbsp;<br>
                            <br></td>
                    </tr>
                    <!-- Footer : END -->
                </table>
                
                <!-- Email wrapper : END --> 
                <!-- End of Outlook-specific wrapper : BEGIN --> 
                <!--[if (gte mso 9)|(IE)]>
      </td>
    </tr>
  </table>
  <![endif]--> 
                <!-- End of Outlook-specific wrapper : END --></td>
        </tr>
    </table>
</body>
</html>';




$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: " . $userEmail . "" . "\r\n";

mail($ambEmail, $subject, $message, $headers);

echo "<p class='textCenter black' style='display: block; padding-top: 15px;'><b>Your invitation request has been submitted successfully.</b></p>";
?>