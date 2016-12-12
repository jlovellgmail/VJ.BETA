<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');

$CID = $_GET['CID'];
if (isset($CID) && $CID !="" && $CID!="0")
{
	$query = "{call F_GetCTemplates (@CID=:CID)}";
	$param = array(":CID" => $CID);
	$dbo->doQueryParam($query, $param);
	$ctemplates = $dbo->loadObjectList();
	?>
	<div class="form-group">
	  <label for="productDetailsTemplates">Collection Detail Templates</label>
	  <div class="row set-col-15p">
	  	<?php
		if ($dbo->getRows() > 0) {
		   $count = 0;
		   foreach ($ctemplates as $ctemplate) {
				$CID = $ctemplate["CID"];
				$CTID = $ctemplate["CTID"];
		        $Name = $ctemplate["Name"];
				$ImgUrl = $ctemplate["ImgUrl"];
				$ImgUrl = str_replace('\\', '/', $ImgUrl);
		       ?>
			    <div class="sm-twelve md-six marBottom30">
			      <div class="media">
			        <div class="media-left"><img class="media-object" src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" width="50"></div>
			        <div class="media-body">
			          <h4 class="media-heading"><?php echo $Name; ?></h4>
			        </div>
			      </div>
			    </div>  
		<?php
	            $count++;
	        }
	        if ($count == 0) {
	            echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Collection Details.</td></tr>";
	        }
	    } else {
	        echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Collection Details.</td></tr>";
	    }
	    ?>   
	  </div>
	</div>
<?php } ?>