<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');

if (!isset($PID) || $PID == "") {
    $PID = $_GET['PID'];
}
$query = "{call F_GetPTemplates (@PID=:PID)}";
$param = array(":PID" => $PID);
$dbo->doQueryParam($query, $param);


$ptemplates = $Product->getTemplates();
?>
<div class="form-group textLeft">
    <label for="productDetailsTemplates">Collection Detail Templates</label>
    <div id="sortable" class="marTop15">
        <?php
        $count = 0;
        foreach ($ptemplates as $ptemplate) {
        		$CTID = $ptemplate->getVar("CTID");
            $PID = $ptemplate->getVar("PID");
            $PTID = $ptemplate->getVar("PTID");
            $Name = $ptemplate->getVar("Name");
            $Description = $ptemplate->getVar("Description");
            //$ImgUrl = $ptemplate->getImageUrl();
            //$ImgUrl = str_replace('\\', '/', $ImgUrl);
            $ImgUrl = $ptemplate->getVar("ImgUrl");
            $ImgUrl = str_replace('\\', '/', $ImgUrl);
            if ($CTID == '0') { 
            ?>
                <div class="row ui-state-default marBottom30" name="PTemplateDiv" PTID="<?php echo $PTID; ?>">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="flexImage">
                            <div class="max-150 marTop10">
                            	<img src="<?php echo $ImgUrl; ?>" alt="" width="50">
                            </div>
                        </div>
                    </div>        
                    <div class="col-xs-12 col-sm-10 col-md-10">
                        <h4 class="media-heading"><?php echo $Name; ?></h4>
                        <?php echo $Description; ?>      
                    	<div class="marTop10">
	                    	<a class="pull-left textBtn" style="margin-right:15px;" href="javascript:showEditModal('<?php echo $PTID; ?>')">Edit</a>
	                        <a class="pull-left textBtn" href="javascript:delPTemplate('<?php echo $PTID; ?>', '<?php echo $PID; ?>')">Remove</a>
                        </div>
                    </div>      
                </div> 
            <?php
            }
            else
            {
            ?>
                 <div class="row ui-state-default marBottom30" name="PTemplateDiv" PTID="<?php echo $PTID; ?>">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="flexImage">
                            <div class="max-150 marTop10">
                            	<img class="media-object" src="<?php echo $ImgUrl; ?>" alt="" width="50">
                          	</div>
                        </div>
                    </div>        
                    <div class="col-xs-12 col-sm-10 col-md-10">
                        <h4 class="media-heading"><?php echo $Name; ?></h4>
                        <?php echo $Description; ?>      
                    	<div class="marTop10">
	                        <a class="pull-left textBtn" href="javascript:delPTemplate('<?php echo $PTID; ?>', '<?php echo $PID; ?>')">Remove</a>
						</div>
                    </div>
                </div>            	

            <?php
            }
            $count++;
        }
        if ($count == 0) {
            echo "<div class='sm-twelve'><div class='alert alert-danger alert-dismissible mrg-r-30' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There are no Collection Details.</div></div>";
        }
        ?>  
    </div>
    <div class="row">
        <div class="sm-twelve text-center"> <a class="btn btn-primary mrg-15" data-toggle="modal" data-target="#addProductDetails">+ Add Product Detail</a> </div>
    </div>
</div>

<div id="editDiv">

</div>

<div class="modal fade" id="addProductDetails" tabindex="-1" role="dialog" aria-labelledby="addProductDetailsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="product-template-modalLabel">Add Product Collection Template</h4>
      </div>
      <div class="modal-body">
      
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-left:-15px; margin-right:-15px;">
    <li id="existingTemplateLI" role="presentation" class="active"><a href="#existingTemplate" aria-controls="existingTemplate" role="tab" data-toggle="tab" onclick="checkSelectedGCTemplates()">Existing Template(s)</a></li>
    <li id="newTemplateLI" role="presentation"><a href="#newTemplate" aria-controls="newTemplate" role="tab" data-toggle="tab">New Template</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="existingTemplate">

      <div id="addCTempalte" class="radio-div marTop15 pad15 marRight15 marLeft15" style="">                        
            <?php include "getCTemplateCheckbox.php"; ?>
      </div>
  </div>

    <div role="tabpanel" class="tab-pane" id="newTemplate">
		<form class="radioToggleArea marBottom30 marTop15" method="post">
            <div>
            <label>
              <input type="radio" class="toggleRadio" name="templateChoice" onclick="showAddPTemplate();" id="addProductDetailP" value="templateChoiceRadio01">
              <span>Create New Template</span>
            </label>
            <label>
              <input type="radio" class="toggleRadio"  name="templateChoice" onclick="showAddCTemplate();" id="addProductDetailC" value="templateChoiceRadio02">
              <span>Modify Existing Template</span>
            </label>
            </div>
          </form>   

              <div id="addPTempalte" data-parent="templateChoice" class="toggleRadioDiv templateChoice" style="display:none;">
                  <form method="post" id="addPTemplateFrm" name="addPTemplateFrm" action="add_ptemplate_action.php" enctype="multipart/form-data" class="textLeft">
                            <input type="hidden" id="PID" name="PID" value="<?php echo $PID; ?>">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="lineName">Collection Detail</label>
                                        <input type="text" class="form-control" id="Name" name="Name" onkeyup="checkAddProductTemplate()" placholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="lineName">Collection Detail Description</label>
                                        <textarea class="form-control" id="Description" name="Description" rows="5" onkeyup="checkAddProductTemplate()"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="productImage">Collection Detail Icon</label>
                                        <input type="file" id="ImgUrl" name="ImgUrl" onchange="checkAddProductTemplate()">
                                    </div>
                                </div>
                            </div>
                        </form>
              </div>

              <div id="createCTempalte" data-parent="templateChoice" class="toggleRadioDiv templateChoice" style="display:none;">
						<div id="createFromTemplate01">
          				<div class="radio-div marTop15 pad15 marRight15 marLeft15" style="">                        
            				<?php include "getCTemplateRadio.php"; ?>
      				</div>
              		<button id="continueBtn" type="button" class="btn btn-primary toggleCreateFromTemplate" style="display: none;" onclick="showAddCTemplateFrm()">Continue</button>

				  </div>
          <div id="createFromTemplate02" style="display:none;">
            <div class="textLeft marBottom15 bold">
					<a class="textBtn toggleCreateFromTemplate" style="line-height:28px" href="javascript:hideAddCTemplateFrm()">
						<i class="icon-left-dir"></i>
						Back
				   </a>
            </div>    
            <form method="post" id="addCTemplateFrm" name="addPTemplateFrm" action="add_ptemplate_action.php?from=CTemplate" enctype="multipart/form-data" class="textLeft">
						 <input type="hidden" id="PID" name="PID" value="<?php echo $PID; ?>">
						 <div id="fromCTemplateDiv"></div>						 
					</form>
          </div>

              </div>

              </div>

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="saveTemplateBtn" type="button" class="btn btn-primary" style="display: none;" onclick="addProductDetail('<?php echo $PID; ?>')">Save Template(s)</button> </div>
    </div>
  </div>
</div>