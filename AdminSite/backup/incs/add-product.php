<a  href="#menu-toggle" id="menu-toggle"> &nbsp; </a>
<div class="row">
	<div class="col-xs-8">
		<h1 class="page-head-title">ADD PRODUCT</h1>
	</div>
	<div class="col-xs-4 text-right" style="padding-top:15px;">
		<a href="products.php">&lt; Back to Products</a>
	</div>
</div>

<!--SUCCESS-->
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  This action was successful.
</div>
<!--SUCCESS-->

<!--ERROR-->
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  There was an error.
</div>
<!--ERROR-->


<div class="row">
    <form>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="productLine">Product line</label>
            <div class="select">
                <select class="form-control">
                    <option class="placeholder">Select a Line</option>
                    <option>City</option>
                    <option>Classic</option>
                    <option>Signature</option>
                </select>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="productCollection">Product Collection</label>
            <div class="select">
                <select class="form-control">
                    <option class="placeholder">Select a Collection</option>
                    <option>Reykjavik</option>
                    <option>Marrakesh</option>
                    <option>Tijuana</option>
                </select>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="productType">Product Style</label>
            <div class="select">
                <select class="form-control">
                    <option class="placeholder">Select a Style</option>
                    <option>Backpack</option>
                    <option>Bracelet</option>
                    <option>Clutch</option>
                    <option>Messenger</option>
                    <option>Overnight</option>
                    <option>Satchel</option>
                    <option>Tote</option>
                    <option>Wallet</option>
                    <option>Weekender</option>
                </select>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="productPrice">Product Price</label>
            <div class="input-group">
            <div class="input-group-addon">$</div>
                <input type="text" class="form-control" id="productInputAmount" placholder="">
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <label for="productPrice">Short Description</label>
			<textarea class="form-control" rows="2" placeholder="Add Description"></textarea>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="form-group">
                <label for="productDimensions">Width (inches / cm)</label>
                <input type="text" class="form-control" id="productWidth" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="form-group">
                <label for="productDimensions">Height (inches / cm)</label>
                <input type="text" class="form-control" id="productHeight" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="form-group">
                <label for="productDimensions">Depth (inches / cm)</label>
                <input type="text" class="form-control" id="productDepth" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="form-group">
                <label for="productPrice">Weight (lbs / kg )</label>
                <input type="text" class="form-control" id="productDimensions" />
            </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <label for="productPrice">Product Description</label>
			<textarea class="form-control" rows="5" placeholder="Add Description"></textarea>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label for="productImage">Product Image</label>
            <input type="file" id="productImageFile">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-8">
          <div class="form-group">
            <label  class="mrg-b-15" for="productGallery">Product Gallery</label>
			<div><a class="btn btn-primary btn-sm">+ Add Image</a></div>
          </div>
        </div>  
        <div class="col-xs-12">
          <div class="form-group">
            <label for="productDetails">Collection Detail Templates</label>            
			<div style="margin-left:20px;">
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox01" value="option01"> Italian Leather
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox02" value="option02"> Ultra Strong Stitching Thread
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox03" value="option03"> Laser cut for geometric contouring
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox04" value="option04"> Wool sewn for maximum durability
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox05" value="option05"> Custom Steel Hardware
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox06" value="option06">Padded pocket for iPad Air &amp; Mini
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="inlineCheckbox07" value="option07"> Made in the U.S.A.
                </label>
            </div>
            <br />
            <div class="row">
                <div class="col-xs-12 mrg-b-15">
                    <label for="productDetails">Product Details</label>            
                </div>
			</div>            
            <div><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProductDetail">+ Add Product Detail</a></div>
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductDetail" tabindex="-1" role="dialog" aria-labelledby="addProductDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addProductDetailLabel">Add Product Detail</h4>
      </div>
      <div class="modal-body">
        <form>
        <div class="row">
	        <div class="col-xs-12">
	          <div class="form-group">
	            <label for="lineName">Product Detail</label>
	            <input type="text" class="form-control" id="lineName" placholder="">
              </div>
	        </div>
        </div>
        <div class="row">
	        <div class="col-xs-12">
	          <div class="form-group">
	            <label for="lineName">Product Detail Description</label>
	            <input type="text" class="form-control" id="lineName" placholder="">
              </div>
	        </div>
        </div>
        <div class="row">
	        <div class="col-xs-12">
<div class="form-group">
            <label for="productImage">Product Detail Icon</label>
            <input type="file" id="productImageFile">
          </div>	        
         </div>
        </div>
        </form>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>