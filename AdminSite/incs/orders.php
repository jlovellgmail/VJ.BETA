<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-5">
        <h1 class="page-head-title">ORDERS</h1>
    </div>
    <div class="col-xs-7">
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle w-caret" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="label">Search By </button>
        <ul class="dropdown-menu" id="orderSearchCrit">
          <li><a href="#">Order No</a></li>
          <li><a href="#">Name</a></li>
          <li><a href="#">Email</a></li>
          <li><a href="#">Phone Number</a></li>
          <li><a href="#">All</a></li>
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" aria-label="..." maxlength="99" placeholder="Search" id="searchTxt" name="searchTxt" onkeydown="searchOrders(event);">
    </div><!-- /input-group -->
    </div>

</div>
<div class="table-responsive" id="searchOrdDiv">
    <?php include "/orderSearch.php"; ?>
</div>

<!--
<nav>
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</nav>-->
