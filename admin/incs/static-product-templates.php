<?php include '../admin/incs/nav/robs-admin-nav.php'; ?>
<div class='widthWrapper'>
    <div class="row contentAdminTitleRow">
        <div class="sm-twelve md-eight lg-eight">
            <h1 class="page-head-title marTop30 marBottom30">STATIC PRODUCT TEMPLATES</h1>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="javascript:void(0)" data-toggle="modal" data-target="#product-template-modal">
      Add Collection Template Static
    </a>

</div>


<!-- Modal -->
<div class="modal fade" id="product-template-modal" tabindex="-1" role="dialog" aria-labelledby="product-template-modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="product-template-modalLabel">Add Product Collection Template</h4>
      </div>
      <div class="modal-body">
      
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-left:-15px; margin-right:-15px;">
    <li role="presentation" class="active"><a href="#existingTemplate" aria-controls="existingTemplate" role="tab" data-toggle="tab">Existing Template(s)</a></li>
    <li role="presentation"><a href="#newTemplate" aria-controls="newTemplate" role="tab" data-toggle="tab">New Template</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="existingTemplate">

      <div id="addCTempalte" class="radio-div marTop15 pad15 marRight15 marLeft15" style="">                        
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" "id="chk_4013" name="chk_4013" value="4013" type="checkbox">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/italian_canvas_icon.png" alt="" width="30">
                  <div class="pull-left">100% Italian Canvas</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4020" name="chk_4020" value="4020" type="checkbox">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/usamade_icon.png" alt="" width="30">
                  <div class="pull-left">Made In USA</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4022" name="chk_4022" value="4022" type="checkbox">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/warranty_icon.png" alt="" width="30">
                  <div class="pull-left">Warranty</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                <input class="pull-left" id="chk_4023" name="chk_4023" value="4023" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/cleaning_icon.png" alt="" width="30">
                <div class="pull-left">Care and Cleaning</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                          <label>
                <input class="pull-left" id="chk_4024" name="chk_4024" value="4024" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/shipping_icon.png" alt="" width="30">
                <div class="pull-left">Shipping &amp; Returns</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                          <label>
                <input class="pull-left" id="chk_4025" name="chk_4025" value="4025" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/functionaldesign_icon.png" alt="" width="30">
                <div class="pull-left">Functional Design</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4026" name="chk_4026" value="4026" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/shipping_icon_1.png" alt="" width="30">
                <div class="pull-left">Custom Bronze Hardware</div>
              </label></div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4027" name="chk_4027" value="4027" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/leather_icon.png" alt="" width="30">
                <div class="pull-left">Leather Calfskin Trim</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4043" name="chk_4043" value="4043" type="checkbox">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/nickelzippers_icon.png" alt="" width="30">
                <div class="pull-left">Polished Nickel Zippers</div>
              </label></div>
            </div>
            <br>
      </div>
  </div>

    <div role="tabpanel" class="tab-pane" id="newTemplate">
<form class="radioToggleArea marBottom30 marTop15" method="post">
            <div>
            <label>
              <input type="radio" class="toggleRadio" name="templateChoice" id="templateChoiceRadio" value="templateChoiceRadio01">
              <span>Create New Template</span>
            </label>
            <label>
              <input type="radio" class="toggleRadio"  name="templateChoice" id="templateChoiceRadio" value="templateChoiceRadio02">
              <span>Modify Existing Template</span>
            </label>
            </div>
          </form>   

              <div id="toggle_templateChoiceRadio01" data-parent="templateChoice" class="toggleRadioDiv templateChoice" style="display:none;">
                  <form method="post" id="addPTemplateFrm" name="addPTemplateFrm" action="add_ptemplate_action.php" enctype="multipart/form-data" class="textLeft">
                            <input type="hidden" id="PID" name="PID" value="10004">
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

              <div id="toggle_templateChoiceRadio02" data-parent="templateChoice" class="toggleRadioDiv templateChoice" style="display:none;">
                  






<div id="createFromTemplate01">
          <div class="radio-div marTop15 pad15 marRight15 marLeft15" style="">                        
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4013" name="newFromTemplate" value="4013" type="radio">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/italian_canvas_icon.png" alt="" width="30">
                  <div class="pull-left">100% Italian Canvas</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4020" name="newFromTemplate" value="4020" type="radio">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/usamade_icon.png" alt="" width="30">
                  <div class="pull-left">Made In USA</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4022" name="newFromTemplate" value="4022" type="radio">
                  <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/warranty_icon.png" alt="" width="30">
                  <div class="pull-left">Warranty</div>
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                <input class="pull-left" id="chk_4023" name="newFromTemplate" value="4023" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/cleaning_icon.png" alt="" width="30">
                <div class="pull-left">Care and Cleaning</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                          <label>
                <input class="pull-left" id="chk_4024" name="newFromTemplate" value="4024" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/shipping_icon.png" alt="" width="30">
                <div class="pull-left marginX10">Shipping &amp; Returns</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                          <label>
                <input class="pull-left" id="chk_4025" name="newFromTemplate" value="4025" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/functionaldesign_icon.png" alt="" width="30">
                <div class="pull-left marginX10">Functional Design</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4026" name="newFromTemplate" value="4026" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/shipping_icon_1.png" alt="" width="30">
                <div class="pull-left">Custom Bronze Hardware</div>
              </label></div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4027" name="newFromTemplate" value="4027" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/leather_icon.png" alt="" width="30">
                <div class="pull-left">Leather Calfskin Trim</div>
              </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <label>
                  <input class="pull-left" id="chk_4043" name="newFromTemplate" value="4043" type="radio">
                <img class="pull-left marginX10" style="position:relative; bottom:4px;" src="http://www.virgiljames.net//uploadedImages/Products/nickelzippers_icon.png" alt="" width="30">
                <div class="pull-left">Polished Nickel Zippers</div>
              </label></div>
            </div>
            <br>
      </div>


              <button type="button" class="btn btn-primary toggleCreateFromTemplate">Continue</button>

</div>
          <div id="createFromTemplate02" style="display:none;">
            <div class="textLeft marBottom15 bold">



<a class="textBtn toggleCreateFromTemplate" style="line-height:28px" href="javascript:void(0)">
                        <i class="icon-left-dir"></i>
                        Back
                    </a>

            </div>    
            <form method="post" id="addPTemplateFrm" name="addPTemplateFrm" action="add_ptemplate_action.php" enctype="multipart/form-data" class="textLeft">
                            <input type="hidden" id="PID" name="PID" value="10004">
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


              <button type="button" class="btn btn-primary marTop15 marBottom15">Add Product Template</button>
          </div>

              </div>

              </div>

  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Template(s)</button> </div>
    </div>
  </div>
</div>