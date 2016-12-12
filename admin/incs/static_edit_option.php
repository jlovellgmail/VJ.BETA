<?php include 'nav/contentAdminNav.php'; ?>

<div class="row contentAdminTitleRow">
    <div class="sm-twelve md-eight lg-eight">
        <h1 class="page-head-title">Edit Color</h1>
    </div><!--
    --><div class="sm-twelve md-four lg-four">
        <a href="#">&lt; Back to Options</a>
    </div>
</div>

<form class="form generalForm">
    <div class="row">
        <div class="sm-twelve">
            <div class="form-group">
                <label for="lineName">Color Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Color Name" value="Orange">
            </div>
        </div>
    </div>
    <div class="row form-bottom marTop15">
        <div class="sm-twelve md-six">
        <button type="button" class="btn btn-sm btn-danger">Remove</button>
    </div><!--
        --><div class="sm-twelve md-six textRight">
        <button type="button" class="btn btn-primary">Update</button>
    </div>
    </div>
</form>