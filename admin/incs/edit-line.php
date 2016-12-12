<a href="#menu-toggle" id="menu-toggle"><img src="images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
	<div class="col-xs-8">
		<h1 class="page-head-title">EDIT LINE</h1>
	</div>
	<div class="col-xs-4 text-right" style="padding-top:15px;">
		<a href="lines.php">&lt; Back to Lines</a>
	</div>
</div>

<form>
<div class="row">
<div class="col-xs-12">
  <div class="form-group">
    <label for="lineName">Line Name</label>
    <input type="text" class="form-control" id="lineName" value="City">
  </div>
</div>
<div class="col-xs-12 col-sm-12">
  <div class="form-group">
    <label for="lineTagline">Tagline</label>
	<textarea class="form-control" rows="3">Uncover the influence of our favorite destinations on timeless design.</textarea>
  </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="lineHeroImage">Hero Image</label>
    <input type="file" id="lineHeroImageFile">
    <br />
    <div class="resize-img">
        <div><img src="http://www.virgiljames.net/img/slider/vj_city_landscape.jpg" class="img-responsive" alt="Responsive image"></div>    
    </div>
  </div>
</div>
</div>
<div class="row form-bottom">   
    <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
    	<button type="button" class="btn btn-sm btn-danger pull-left">Remove Line</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
 </div> 
</form>
