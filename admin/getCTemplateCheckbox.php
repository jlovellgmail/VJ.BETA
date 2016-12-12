<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');

$query = "{call F_GetCTemplates (@CID=:CID)}";
$param = array(":CID" => $PCID);
$dbo->doQueryParam($query, $param);
$ctemplates = $dbo->loadObjectList();
?>

<?php
	if ($dbo->getRows() > 0) {
	   $count = 0;
	   foreach ($ctemplates as $ctemplate) {
			$CID = $ctemplate["CID"];
			$CTID = $ctemplate["CTID"];
	        $Name = $ctemplate["Name"];
			$Description = $ctemplate["Description"];
			$ImgUrl = $ctemplate["ImgUrl"];
			$ImgUrl = str_replace('\\', '/', $ImgUrl);
	       ?>
			<div class="row">
		  		<div class="col-xs-12">
			 		<label>
						<input class="pull-left" onclick="checkSelectedGCTemplates()" id="chk_<?php echo $CTID; ?>" name="chk_<?php echo $CTID; ?>" value="<?php echo $CTID; ?>" type="checkbox">
						<img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net/<?php echo $ImgUrl; ?>" alt="" width="30">
						<div class="pull-left"><?php echo $Name; ?></div>
			 		</label>
		  		</div>
			</div>
			<br />
<?php
                $count++;
            }
            if ($count == 0) {
                echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There are no Collection Details.</div>";
            }
        } else {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There are no Collection Details.</div>";
        }
        ?> 