<!doctype html>
<?php $page = "ambassadors"; ?>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ambassadors | Virgil James</title>
<?php include '/incs/head-links.php'; ?>
<link rel="stylesheet" href="/css/ambassadors.css" />
<link rel="stylesheet" href="/css/glyphs.css" />
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
<script src="/js/vendor/modernizr.js"></script>
<style type="text/css">

/*COMMON*/
.text-right { text-align:right; }
.text-left { text-align:left; }
.text-center { text-align:center; }
.fl-l { float:left; }
.fl-r { float:right; }

.btn-gold {
 position: relative;
 display: inline-block;
 height: 42px;
 line-height: 42px;
 background-color: #928b53;
 color:#fff;
 font-family: "proxima-nova", sans-serif;
 font-weight: 600;
 font-size: 14px;
 text-transform: uppercase;
 padding: 0 32px;
 }

.blackBtnText {
 background-color: transparent;
 font-family: 'proxima-nova', sans-serif;
 font-style: normal;
 font-weight: 600;
 font-size: 14px;
 color: #222;
 text-transform: uppercase;
 border: none;
 height: 16px;
 bottom: 0;
 right: 0;
 padding:0;
 }
 
h2.goldUnderline {
 text-align: left;
 color: #928b53;
 padding-bottom: 15px;
 border-bottom: 1px solid #928b53;
 margin-bottom: 24px;
 }

/*GENERAL FORM*/
.generalForm {
 text-align:left;
 position:relative;
 font-family: "proxima-nova", sans-serif;
 font-weight: 400;
 font-size: 14px;
 color: #777;
}

.generalForm label {
 position: relative;
 display: block;
 font-family: "proxima-nova", sans-serif;
 font-weight: 400;
 font-size: 14px;
 color: #777;
}
.generalForm input {
 position: relative;
 padding: 8px;
 width: 100%;
 height: 42px;
 font-family: "proxima-nova", sans-serif;
 font-weight: 400;
 font-size: 14px;
 color: #777;
 border: 1px solid #f1f0e9;
 margin-bottom: 15px;
 }
.generalForm select {
 padding: 8px;
 width: 100%;
 height: 42px;
 font-family: "proxima-nova", sans-serif;
 font-weight: 400;
 font-size: 14px;
 color: #777;
 border: 1px solid #f1f0e9;
 margin-bottom: 15px;
 -webkit-appearance: none;
 -moz-appearance: none;
 appearance: none;
}

.generalForm textarea {
 padding: 8px;
 width: 100%;
 height: 114px;
 font-family: "proxima-nova", sans-serif;
 font-weight: 400;
 font-size: 14px;
 color: #777;
 border: 1px solid #f1f0e9;
 margin-bottom: 15px;
 }

.generalForm input[type="file"] {
 margin-top:4px;
 border:2px dashed #ccc;
 width:auto;
 max-width:100%;
 vertical-align:top;
 margin-right:30px;
 }

.generalForm .formImgPreview {
 display:inline-block;
 vertical-align:top;
 }

.generalForm .formImgPreview.circle { border-radius:100px; }

.generalForm .submitForm {
 text-align:right;
 margin-top:30px;
 }

.generalForm .questionAnswerEntry { padding-right:80px; }

.generalForm .questionAnswerEntry .question {
 font-weight:bold;
 margin-bottom:10px;
 }

.generalFormBlock {margin-bottom:60px; }

.generalFormInput {margin-bottom: 15px; margin-top:4px;}

.generalForm .questionAnswerEntry .qnaEditLink {
 position:absolute;
 top:10px;
 right:15px;
 text-align:right;
 }

/*DASHBORD*/ 
.usrDashboard .usrDashboardNav a {
 position: relative;
 display: inline-block;
 width: 140px;
 height: auto;
 font-family: 'proxima-nova', sans-serif;
 font-style: normal;
 font-weight: 400;
 font-size: 12px;
 text-transform: uppercase;
 color: #fff; 
 line-height: 32px;
 border: 1px solid #fff;
 text-shadow: 0 1px 2px #222;
 box-shadow: rgba(0,0,0,0.15) 0 4px 4px, inset rgba(0,0,0,0.15) 0 4px 4px;
 text-align:center;
 margin-right:30px;
 margin-top:30px;
 padding:8px 6px;
 }

.usrDashboard .usrDashboardNav a.active {
 background-color: rgba(255,255,255,0.3);
 text-shadow: 0 1px 2px #444;
 }

.usrDashboardWelcomeImg {
 background-repeat:no-repeat;
 background-position:50% 50%;
 border-bottom-right-radius: 45px;
 -webkit-border-bottom-right-radius: 45px;
 -moz-border-radius-bottomright: 45px;
 }

.usrDashboardWelcomeImg {
 float:left;
 margin-right:30px;
 }

@media (min-width: 741px) {
.ambHeroBgWrapper.usrDashboard h1 {
 font-size: 56px;
 line-height: 56px;
 margin-bottom: 0px;
 }
}
.ambCardSq {
 border-bottom-right-radius: 15px;
 -webkit-border-bottom-right-radius: 15px;
 -moz-border-radius-bottomright: 15px;
 border-top-left-radius: 15px;
 -webkit-border-top-left-radius: 15px;
 -moz-border-radius-topleft: 15px;
 width:200px;
 height:200px;
 }

</style>
</head>
<body class="ambBody">

<!-- Navgivation -->
<?php include '/incs/nav.php'; ?>
<div class="scrollWaypoint"></div>
	<?php include '/incs/userInfo.php'; ?>

       
<?php include '/incs/footer.php'; ?>
<?php include '/incs/footer-links.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="/js/jquery-ui/jquery-ui.min.js"></script> 
<script>
$(function() {
	$( "#sortableQnA" ).sortable();
	$( "#sortableQnA" ).disableSelection();
});
</script> 
<script>
$(function() {
	$( "#sortableImgGrid" ).sortable();
	$( "#sortableImgGrid" ).disableSelection();
});
</script>
</body>
</html>