<?php include 'nav/contentAdminNav.php'; ?>

<div class="row contentAdminTitleRow">
    <div class="sm-twelve md-eight lg-eight">
        <h1 class="page-head-title">Add Product</h1>
    </div><!--
    --><div class="sm-twelve md-four lg-four">
        <a href="#">&lt; Back to Products</a>
    </div>
</div>

<form class="generalForm" method="post" id="addProductFrm" action="add_product_action.php?PID=" enctype="multipart/form-data">
    <div class="row dynamicCol dynamicColLoose">
        <div class="sm-twelve md-three">
            <div class="form-group">
                <label for="productLine">Product Group</label>
                <div class="select">
                    <select class="form-control" onchange="getCollections()">
                        <option class="placeholder" value="0">Select a Line</option>

                        <option value="11">Group 1</option>

                        <option value="10">Group 2</option>

                        <option value="12">Group 3</option>
                    </select>
                </div>
            </div>
        </div><!--
        --><div class="sm-twelve md-three">
            <div class="form-group">
                <label for="productLine">Product Line</label>
                <div class="select">
                    <select id="LID" name="LID" class="form-control" onchange="getCollections()">
                        <option class="placeholder" value="0">Select a Line</option>

                        <option value="11">City</option>

                        <option value="10">Classic</option>

                        <option value="12">Signature</option>
                    </select>
                </div>
            </div>
        </div><!--
		--><div class="sm-twelve md-three">
            <div id="collectionsDiv"><div class="form-group">
                    <label for="productCollection">Product Collection</label>
                    <div class="select">
                        <select id="CID" name="CID" onchange="colSelectGetCTemplates()" class="form-control">
                            <option class="placeholder" value="0">Select a Collection</option>
                            <option value="2005">Reykjavik</option>
                            <option value="2006">Santa Fe</option>
                        </select>
                    </div>
                </div>
            </div>
        </div><!--
		--><div class="sm-twelve md-three" id="styleDiv">
            <div class="form-group">
                <label for="productStyle">Product Style</label>
                <div class="select">
                    <select id="SID" name="SID" class="form-control" onchange="showProductDetails()">
                        <option class="placeholder" value="0">Select a Style</option>
                        <option value="537">Backpack</option>
                        <option value="532">Beach Bag</option>
                        <option value="543">Bracelet</option>
                        <option value="538">Clutch</option>
                        <option value="533">Cross Body</option>
                        <option value="534">Document Holder</option>
                        <option value="539">Drawstring</option>
                        <option value="540">Overnight</option>
                        <option value="541">Satchel</option>
                        <option value="535">Toiletry Kit</option>
                        <option value="536">Tote</option>
                        <option value="542">Wallet</option>
                        <option value="531">Weekender</option>
                    </select>
                </div>
            </div>
        </div><!--
        --><div id="productDetailsDiv" style="">
            <div class="sm-twelve md-three">
                <div class="form-group">
                    <label for="productType">Product Type</label>
                    <select class="form-control" name="Type" id="Type">
                        <option class="placeholder" value="0">Select a Product Type</option>
                        <option value="">Bag</option>
                        <option value="">Accessory</option>
                    </select>
                </div>
            </div><!--
            --><div class="sm-twelve md-nine">
                <label for="productType">Product Options</label>
                    <div class="button-group button-group-inline button-group-multi-select">
                        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                            COLOR(S) <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-value="option-01-01" tabIndex="-1"><input type="checkbox"/> Blue</a></li>
                            <li><a href="#" data-value="option-01-02" tabIndex="-1"><input type="checkbox"/> Gold</a></li>
                            <li><a href="#" data-value="option-01-03" tabIndex="-1"><input type="checkbox"/> Orange</a></li>
                            <li><a href="#" data-value="option-01-04" tabIndex="-1"><input type="checkbox"/> Plum</a></li>
                            <li><a href="#" data-value="option-01-05" tabIndex="-1"><input type="checkbox"/> Tan</a></li>
                        </ul>
                    </div>
                    <div class="button-group button-group-inline button-group-multi-select">
                    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                        SIZES(S) <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-value="option-02-01" tabIndex="-1"><input type="checkbox"/> Extra-Small</a></li>
                        <li><a href="#" data-value="option-02-02" tabIndex="-1"><input type="checkbox"/> Small</a></li>
                        <li><a href="#" data-value="option-02-03" tabIndex="-1"><input type="checkbox"/> Medium</a></li>
                        <li><a href="#" data-value="option-02-04" tabIndex="-1"><input type="checkbox"/> Large</a></li>
                        <li><a href="#" data-value="option-02-05" tabIndex="-1"><input type="checkbox"/> Extra-Large</a></li>
                    </ul>
                </div>
            </div><!--
			--><div class="sm-twelve md-three">
                <div class="form-group">
                    <label for="productGender">Gender</label>
                    <select class="form-control" name="Gender" id="Gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div><!--
				--><div class="sm-twelve md-three">
                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" id="Price" name="Price" placholder="" value="">
                    </div>
                </div>
            </div><!--
				--><div class="sm-twelve">
                <div class="form-group">
                    <label for="productPrice">Short Description</label>
                    <textarea class="form-control" maxlength="500" rows="2" id="ShortDescription" name="ShortDescription" placeholder="Add Description"></textarea>
                </div>
            </div><!--
				--><div class="sm-six md-three">
                <div class="form-group">
                    <label for="productDimensions">Width (inches / cm)</label>
                    <div class="row dynamicCol">
                        <div class="sm-six">
                            <small>Inches</small>
                            <input type="text" class="form-control" id="Width" name="Width" placeholder="Inches" value="">
                        </div><!--
                    		--><div class="sm-six">
                            <small>Centimeters</small>
                            <input type="text" class="form-control" id="WidthCM" name="WidthCM" placeholder="Centimeters" value="">
                        </div>
                    </div>
                </div>
            </div><!--
				--><div class="sm-six md-three">
                <div class="form-group">
                    <label for="productDimensions">Height (inches / cm)</label>
                    <div class="row dynamicCol">
                        <div class="sm-six">
                            <small>Inches</small>
                            <input type="text" class="form-control" id="Height" name="Height" placeholder="Inches" value="">
                        </div><!--
							--><div class="sm-six">
                            <small>Centimeters</small>
                            <input type="text" class="form-control" id="HeightCM" name="HeightCM" placeholder="Centimeters" value="">
                        </div>
                    </div>
                </div>
            </div><!--
				--><div class="sm-six md-three">
                <div class="form-group">
                    <label for="productDimensions">Depth (inches / cm)</label>
                    <div class="row dynamicCol">
                        <div class="sm-six">
                            <small>Inches</small>
                            <input type="text" class="form-control" id="Depth" name="Depth" placeholder="Inches" value="">
                        </div><!--
							--><div class="sm-six">
                            <small>Centimeters</small>
                            <input type="text" class="form-control" id="DepthCM" name="DepthCM" placeholder="Centimeters" value="">
                        </div>
                    </div>
                </div>
            </div><!--
				--><div class="sm-six md-three">
                <div class="form-group">
                    <label for="productPrice">Weight</label>
                    <div class="row dynamicCol">
                        <div class="sm-six">
                            <small>Pounds</small>
                            <input type="text" class="form-control" id="Weight" name="Weight" placeholder="Pounds" value="">
                        </div><!--
                    		--><div class="sm-six">
                            <small>Kilograms</small>
                            <input type="text" class="form-control" id="WeightKG" name="WeightKG" placeholder="Kilograms" value="">
                        </div>
                    </div>
                </div>
            </div><!--
        		--><div class="sm-twelve">
                <div class="form-group">
                    <label for="productPrice">Primary Material(s)</label>
                    <textarea class="form-control" rows="5" id="PrimaryMaterial" name="PrimaryMaterial" placeholder="Add Primary Material(s)"></textarea>
                </div>
            </div><!--
				--><div class="sm-twelve">
                <div class="form-group">
                    <label for="productPrice">Product Description</label>
                    <textarea class="form-control" rows="5" id="Description" name="Description" placeholder="Add Description"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="imageDiv" style="">
        <div class="sm-twelve">
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" id="ImgUrl" name="ImgUrl">
            </div>
            <div class="flexImage mrg-t-15" style="max-width:300px;">
                <div><img id="img_ImgUrl" src="" alt=""></div>
            </div>
        </div>

    </div>
</form>

<div class="modal fade" id="optionModal01" tabindex="-1" role="dialog" aria-labelledby="optionModal01Label">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Color Options</h4>
            </div>
            <div class="modal-body">
                <div class="three-col-css">
                    <ul class="list-unstyled label-plain">
                        <li><label><input name="option-A1" type="checkbox" value="option-A1"> Blue</label></li>
                        <li><label><input name="option-A2" type="checkbox" value="option-A2"> Gold</label></li>
                        <li><label><input name="option-A3" type="checkbox" value="option-A3"> Orange</label></li>
                        <li><label><input name="option-A4" type="checkbox" value="option-A4"> Plum</label></li>
                        <li><label><input name="option-A5" type="checkbox" value="option-A5"> Tan</label></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="optionModal02" tabindex="-1" role="dialog" aria-labelledby="optionModal02Label">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Size Options</h4>
            </div>
            <div class="modal-body">
                <div class="three-col-css">
                    <ul class="list-unstyled label-plain">
                        <li><label><input name="option-b01" type="checkbox" value="option-b01"> Extra-Small</label></li>
                        <li><label><input name="option-b02" type="checkbox" value="option-b02"> Small</label></li>
                        <li><label><input name="option-b03" type="checkbox" value="option-b03"> Medium</label></li>
                        <li><label><input name="option-b04" type="checkbox" value="option-b04"> Large</label></li>
                        <li><label><input name="option-b05" type="checkbox" value="option-b05"> Extra-Large</label></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->