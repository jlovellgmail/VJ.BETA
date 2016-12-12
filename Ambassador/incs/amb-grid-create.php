<div class='widthWrapper'>
    <div class='admin-content-wrapper xs-twelve sm-ten xl-eight marBottom60'>

        <!-- if creating: -->
        <h1 class='caps marBottom10 size5'>Add Inspiration</h1>
        <!-- if editing: -->
        <h1 class='caps marBottom10 size5'>Edit Inspiration</h1>
        <form class="generalForm" id="galleryFrm" method="post" action="">
            <input type="hidden" name="ImgUrl" id="ImgUrl" value="">
            <div class="form-group">
                <label for="firstName">Image Title</label>
                <input type="text" class="form-control" id="Title" name="Title" placeholder="Image Title" maxlength="100" value="" />
            </div>
            <div class="form-group marBottom30">
                <label>Message</label>
                <textarea type=tinymce id="Description" name="Description"><?php echo "Message goes here"; ?></textarea>
            </div>

            <div class='rel block marBottom15'>
                <label>Image Upload</label>
                <div class="xs-twelve lg-five xl-four cropHeaderWrapper">
                    <div id="croppicPostImg"></div>
                </div><div class='xs-twelve lg-seven xl-eight'>
                    <div class='rel block marBottom15'>
                        <label>Select Image Orientation</label>
                        <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' />&nbsp;&nbsp;Square</div>
                        <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' />&nbsp;&nbsp;Wide</div>
                        <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' />&nbsp;&nbsp;Tall</div>
                    </div>
                    <!-- if square: -->
                    <span><strong>Upload 800x800 pixels or larger</strong><br /></span>
                    <!-- if landscape: -->
                    <span><strong>Upload 1600x800 pixels or larger</strong><br /></span>
                    <!-- if portrait: -->
                    <span><strong>Upload 800x1600 pixels or larger</strong><br /></span>
                </div>
            </div>

            <div class='xs-twelve marBottom30'>
                <a type="button" href="javascript:void(0);" onclick="showModal('/incs/modals/modal-gallery-related-products.php');">+ Add / Edit Related Products</a>
            </div>
            <div class='xs-six textLeft'>
                <a href='javascript:delGalleryItem("")' style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Delete Inspiration</a>
            </div><div class='xs-six textRight'>
                <!-- if creating: -->
                <button type="button" onclick="validateGalleryItem()" class="admin-add-button">Submit</button>
                <!-- if editing: -->
                <button type="button" onclick="validateGalleryItem()" class="admin-add-button">Update</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea[type=tinymce]",
        theme: "modern",
        menubar: "edit insert format table tools",
        menu: {// this is the complete default configuration
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link image media | template hr | charmap'},
            view: {title: 'View', items: 'visualaid'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript| formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        plugins: [
            "autolink link lists image charmap print preview hr spellchecker moxiemanager",
            "searchreplace wordcount fullscreen media insertdatetime",
            "table directionality paste textcolor"
        ],
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
        convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        content_css: "",
        toolbar: "false",
        toolbar: [
            "undo redo | styleselect | bold | italic | link | image | fullscreen | alignleft aligncenter alignright"
        ],
                style_formats: [
                    {title: 'Body Text', block: 'span', styles: {textTransform: 'none', fontFamily: 'Gotham SSm A, Gotham SSm B, Verdana, Geneva, sans-serif'}},
                    {title: 'Block Quote', block: 'blockquote', classes: 'cc-wysiwyg clearfix', styles: {fontSize: '30px', textAlign: 'left', paddingTop: '20px', paddingBottom: '20px', margin: '20px 0 20px 0', borderTop: '1px solid #adadad', borderBottom: '1px solid #adadad', fontFamily: 'Palatino, Palatino Linotype, Palatino LT STD, Book Antiqua, Georgia, serif'}},
                    {
                        title: 'Full Width Image',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'margin': '0 0 10px 0',
                            'width': '100%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Left - 1/2',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'left',
                            'margin': '10px 30px 10px 0',
                            'width': '50%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Right - 1/2',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'right',
                            'margin': '10px 0 10px 30px',
                            'width': '50%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Left - 1/3',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'left',
                            'margin': '10px 30px 10px 0',
                            'width': '33%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Right - 1/3',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'right',
                            'margin': '10px 0 10px 30px',
                            'width': '33%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Left - 1/4',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'left',
                            'margin': '10px 30px 10px 0',
                            'width': '25%',
                            'height': 'auto'
                        }
                    },
                    {
                        title: 'Image Right - 1/4',
                        selector: 'img',
                        classes: 'img-responsive',
                        styles: {
                            'float': 'right',
                            'margin': '10px 0 10px 30px',
                            'width': '25%',
                            'height': 'auto'
                        }
                    }
                ]
    });
</script>

<style>
    #croppicPostImg {
        width: 200px; /* MANDATORY multiply by 1.2*/
        height: 200px; /* MANDATORY */
        position: relative; /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($imgUrl) && $imgUrl != "") { ?> background-image: url(<?php echo $imgUrl; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> 
        background-size: 200px 200px;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<script>
    // croppic script

    var cropContainerPostImg = {
        uploadUrl: '/admin/upload-gallery-item.php',
        cropUrl: '/admin/crop-gallery-item.php',
        outputUrlId: 'ImgUrl',
        //resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        doubleZoomControls: true,
        rotateControls: false,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onAfterImgUpload: function () {
            postloaded = true;
            $('.croppicPostImg_imgUploadForm').css({"visibility": "hidden", "position": "absolute"});
        },
        onAfterImgCrop: function () {
            $('#croppicPostImg').children('img').attr("style", "width:200px");
        }
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerPostImg = new Croppic('croppicPostImg', cropContainerPostImg);

</script>