<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');

if (!isset($PID) || $PID == "") {
    $PID = $_GET['PID'];
}
$query = "{call F_GetPTemplates (@PID=:PID)}";
$param = array(":PID" => $PID);
$dbo->doQueryParam($query, $param);


$ptemplates = $Product->getTemplates();
?>
<div class="form-group">
    <label for="productDetailsTemplates">Collection Detail Templates</label>
    <div class="row set-col-15p">
        <?php
        $count = 0;
        foreach ($ptemplates as $ptemplate) {
            $PID = $ptemplate->getVar("PID");
            $PTID = $ptemplate->getVar("PTID");
            $Name = $ptemplate->getVar("Name");
            $Description = $ptemplate->getVar("Description");
            //$ImgUrl = $ptemplate->getImageUrl();
            //$ImgUrl = str_replace('\\', '/', $ImgUrl);
            $ImgUrl = $ptemplate->getVar("ImgUrl");
            $ImgUrl = str_replace('\\', '/', $ImgUrl);
            ?>
            <div class="col-xs-12 col-sm-10 col-md-8">
                <div class="media">
                    <div class="media-left"> <a href="javascript:showEditModal('<?php echo $PTID; ?>')"> <img class="media-object" src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" width="50"> </a> </div>
                    <div class="media-body"> <a href="javascript:showEditModal('<?php echo $PTID; ?>')">
                            <h4 class="media-heading"><?php echo $Name; ?></h4>
                            <?php echo $Description; ?></a> </div>
                </div>
            </div> 
            <?php
            $count++;
        }
        if ($count == 0) {
            echo "<div class='col-xs-12'><div class='alert alert-danger alert-dismissible mrg-r-30' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There are no Collection Details.</div></div>";
        }
        ?>  
    </div>
    <div class="row">
        <div class="col-xs-12 text-center"> <a class="btn btn-primary mrg-15" data-toggle="modal" data-target="#addProductDetails">+ Add Product Detail</a> </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductDetails" tabindex="-1" role="dialog" aria-labelledby="addProductDetailsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addProductDetailsLabel">Add Product Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mrg-b-20">
                        <label class="mrg-r-30">
                            <input type="radio" id="addProductDetailC" name="addProductDetail" onclick="showAddCTemplate('<?php echo $PCID; ?>');" value="1"  />
                            &nbsp;Add Detail(s) from Template
                        </label>
                        <label>
                            <input type="radio" id="addProductDetailP" name="addProductDetail" onclick="showAddPTemplate();" value="2" />
                            &nbsp;Add Detail(s) Manually
                        </label>
                    </div>
                    <div id="addCTempalte" class="radio-div" style="display: none;">
                        <?php include "getCTemplateCheckbox.php"; ?>
                    </div>
                    <div id="addPTempalte" class="radio-div" style="display: none;">
                        <form method="post" id="addPTemplateFrm" name="addPTemplateFrm" action="add_ptemplate_action.php" enctype="multipart/form-data">
                            <input type="hidden" id="PID" name="PID" value="<?php echo $PID; ?>" />
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="lineName">Collection Detail</label>
                                        <input type="text" class="form-control" id="Name" name="Name" placholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="lineName">Collection Detail Description</label>
                                        <textarea class="form-control" id="Description" name="Description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="productImage">Collection Detail Icon</label>
                                        <input type="file" id="ImgUrl" name="ImgUrl">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addProductDetail('<?php echo $PID; ?>')" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<div id="editDiv">

</div>