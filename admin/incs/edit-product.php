<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-8">
    <h1 class="page-head-title">EDIT PRODUCT</h1>
  </div>
  <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="products.php">&lt; Back to Products</a> </div>
</div>
<form>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="productLine">Product line</label>
        <div class="select">
          <select class="form-control">
            <option class="placeholder">Select a Line</option>
            <option selected>City</option>
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
            <option selected>Reykjavik</option>
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
            <option selected>Backpack</option>
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
          <input type="text" class="form-control" id="productInputAmount" value="1,750">
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
        <input type="text" class="form-control" id="productWidth" value="33" />
      </div>
    </div>
    <div class="col-xs-6 col-sm-3">
      <div class="form-group">
        <label for="productDimensions">Height (inches / cm)</label>
        <input type="text" class="form-control" id="productHeight" value="33" />
      </div>
    </div>
    <div class="col-xs-6 col-sm-3">
      <div class="form-group">
        <label for="productDimensions">Depth (inches / cm)</label>
        <input type="text" class="form-control" id="productDepth" value="33" />
      </div>
    </div>
    <div class="col-xs-6 col-sm-3">
      <div class="form-group">
        <label for="productPrice">Weight (lbs / kg )</label>
        <input type="text" class="form-control" id="productDimensions" value="33" />
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <label for="productPrice">Product Description</label>
        <textarea class="form-control" rows="5" placeholder="Add Description"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="form-group">
        <label for="productImage">Product Image</label>
        <input type="file" id="productImageFile">
        <div class="resize-img maxw-300">
          <div><img src="http://www.virgiljames.net/img/product/black_backpack_headon.png" alt="" /></div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="form-group">
        <label for="productGallery">Product Gallery</label>
        <div> <a class="btn btn-primary btn-sm">+ Add Image</a> </div>
        <div class="row set-col-15p">
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><a href="#" data-toggle="modal" data-target="#editProductGalleryImage"><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></a></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="resize-img maxw-200 mrg-0-auto">
              <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label for="productDetailsTemplates">Collection Detail Templates</label>
        <div class="row set-col-15p">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#" data-toggle="modal" data-target="#editProductDetails"> <img class="media-object" src="images/italy-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body"> <a href="#" data-toggle="modal" data-target="#editProductDetails">
                <h4 class="media-heading">Italian Leather</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</a> </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/durable-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Ultra Strong Stitching Thread</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/laser-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Laser cut for geometric contouring</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/sheep-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Wool sewn for maximum durability</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/anvil-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Custom Steel Hardware</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/devices-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Padded pocket for iPad Air &amp; Mini</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="media">
              <div class="media-left"> <a href="#"> <img class="media-object" src="images/usa-icon.png" alt="" width="50"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading">Made in the U.S.A.</h4>
                Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
            </div>
          </div>
        </div>
        <div class="text-center"> <a class="btn btn-primary mrg-15" data-toggle="modal" data-target="#addProductDetails">+ Add Product Detail</a> </div>
      </div>
    </div>
  </div>
  <div class="row form-bottom">
    <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
      <button type="button" class="btn btn-sm btn-danger pull-left">Remove Product</button>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
  </div>
</form>

<!-- Modal -->
<div class="modal fade" id="addProductDetails" tabindex="-1" role="dialog" aria-labelledby="addProductDetailsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addProductDetailsLabel">Add Product Detail</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div class="mrg-b-20">
              <label class="mrg-r-30">
                <input type="radio" name="addProductDetailType" value="1"  />
                &nbsp;Add Detail(s) from Template
              </label>
              <label>
                <input type="radio" name="addProductDetailType" value="2" />
                &nbsp;Add Detail(s) Manually
              </label>
            </div>
            <div id="addProductDetailType1" class="radio-div" style="display: none;">
              <div class="row">
                <div class="col-xs-12">
                  <input class="pull-left mrg-r-10" type="checkbox" />
                  <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/italy-icon.png" alt="" width="30">
                  <div class="pull-left mrg-l-10">Italian Leather</div>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
                      <input class="pull-left mrg-r-10" type="checkbox" />
                      <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/durable-icon.png" alt="" width="30">
                      <div class="pull-left mrg-l-10">Ultra Strong Stitching Thread</div>
                  </label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
                      <input class="pull-left mrg-r-10" type="checkbox" />
                      <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/laser-icon.png" alt="" width="30">
                      <div class="pull-left mrg-l-10">Laser cut for geometric contouring</div>
                  </label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
	                  <input class="pull-left mrg-r-10" type="checkbox" />
	                  <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/sheep-icon.png" alt="" width="30">
	                  <div class="pull-left mrg-l-10">Wool sewn for maximum durability</div>
				  </label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
                      <input class="pull-left mrg-r-10" type="checkbox" />
                      <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/anvil-icon.png" alt="" width="30">
                      <div class="pull-left mrg-l-10">Custom Steel Hardware</div>
                  </label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
                      <input class="pull-left mrg-r-10" type="checkbox" />
                      <img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/devices-icon.png" alt="" width="30">
                      <div class="pull-left mrg-l-10">Padded pocket for iPad Air &amp; Mini</div>
               	 </label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-12">
                  <label>
                  	<input class="pull-left mrg-r-10" type="checkbox" />
                  	<img class="pull-left mrg-l-10" style="position:relative; bottom:4px;" src="images/usa-icon.png" alt="" width="30">
                  	<div class="pull-left mrg-l-10">Made in the U.S.A.</div>
                  </label>
                </div>
              </div>
            </div>
            <div id="addProductDetailType2" class="radio-div" style="display: none;">
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label for="lineName">Collection Detail</label>
                    <input type="text" class="form-control" id="collectionDetailName" placholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label for="lineName">Collection Detail Description</label>
                    <textarea class="form-control" id="collectionDetailDesc" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label for="productImage">Collection Detail Icon</label>
                    <input type="file" id="collectionDetailIcon">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProductDetails" tabindex="-1" role="dialog" aria-labelledby="editProductDetailsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editProductDetailsLabel">Edit Product Detail</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailName">Product Detail</label>
                <input type="text" class="form-control" id="productDetailName" value="Italian Leather">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailDesc">Product Detail Description</label>
                <div>
                  <textarea class="form-control" id="productDetailDesc" rows="5">Cas sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailIcon">Product Detail Icon</label>
                <input type="file" id="productDetailIcon">
                <br />
                <div class="resize-img maxw-150">
                  <div><img src="/admin/images/italy-icon.png" alt="" width="50"></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger pull-left">Remove</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProductGalleryImage" tabindex="-1" role="dialog" aria-labelledby="editProductGalleryImageLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editProductGalleryImageLabel">Edit Product Gallery Image</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailIcon">Product Gallery Image</label>
                <input type="file" id="productDetailIcon">
                <br />
                <div class="resize-img">
                  <div><img src="http://www.virgiljames.net/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" width="50"></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger pull-left">Remove</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>