<script type="text/javascript" src="/js/general.js"></script>
<script type="text/javascript" src="/js/croppic.js"></script>
<?php include '../incs/userAccountNav.php'; ?>
<link href="/css/croppic.css" rel="stylesheet">	
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorFavorite.class.php';

$FID = $_GET['FID'];
$AID = $_GET['AID'];

$ItemName = '';
$Link = '';
$Description = '';
$FavImg = '';
$Comments = '';

if (isset($FID) && $FID != "") {
    $Favorite = new AmbassadorFavorite();
    $Favorite->initialize($FID);

    $ItemName = $Favorite->getVar("ItemName");
    $Link = $Favorite->getVar("Link");
    $Description = $Favorite->getVar("Description");
    $FavImg = $Favorite->getImgUrl();
    $Comments = $Favorite->getVar("Comments");
}
?>

<?php if (isset($FID) && $FID != "") { ?>	
    <h6 class="modalTitle caps fw-700 size6">Edit this Favorite</h6>
<?php } else { ?>
    <h6 class="modalTitle caps fw-700 size6">Add a Favorite</h6>
<?php } ?>
<form id="FavFrm" class="generalForm modalForm" method="post" action="/ambassador/addCustomFavorite_action.php?FID=<?php echo $FID; ?>&AID=<?php echo $AID; ?>">
    <label>Item Name</label>
    <input type="text" id="ItemName" name="ItemName" value="<?php echo $ItemName; ?>">
    <label>Item Link</label>
    <input type="text" value="<?php echo $Link; ?>" id="Link" name="Link">
    <label>Comments</label>
    <input type="text" value="<?php echo $Comments; ?>" id="Comments" maxlength="120" name="Comments">
    <label>Item Description</label>
    <textarea type=tinymce id="Description" name="Description"><?php echo $Description; ?></textarea>
    <div class="clearfix marTop15 posRel">
        <label>Item Image (Minimum size (300 X 300))</label>
        <div class="cropHeaderWrapper">
            <div id="croppicFavImg" ></div>
        </div>
    </div>
    <input type="Hidden" id="favImg" name="favImg" value="" />
    <input type="Hidden" id="Type" name="Type" value="C" />
    <div class="clearfix textCenter marTop15">
        <?php if (isset($FID) && $FID != "") { ?>
            <a class="fillBtn" href="javascript:validateFav();">Update Favorite</a>
        <?php } else { ?>
            <a class="fillBtn" href="javascript:validateFav();">Add Favorite</a>
        <?php } ?>
    </div>

    <?php if (isset($FID) && $FID != "") { ?>
        <div class="textLeft marTop30">
            <a class="textBtn" href="javascript:delCustomFavorite('<?php echo $FID; ?>');">x Delete Favorite</a>
        </div>
    <?php } ?>
</form>

<style>
    #croppicFavImg{
        width: 300px;  /* MANDATORY */
        height: 300px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 auto 1.5em auto;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($FavImg) && $FavImg != "") { ?>
            background-image: url(<?php echo $FavImg; ?>);
        <?php } else { ?>
            background-image: url(/img/imgplaceholder.jpg);
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
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

<script>
    // croppic script
    window.onbeforeunload = function () {
        if (cropContainerFavImg.loadedBeforeCrop)
        {
            cropContainerFavImg.reset();
        }
    };

    var cropContainerFavImg = {
        uploadUrl: '/uploadAmbImg.php',
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID":<?php echo $AID; ?>,
            "Type": "Return"
        },
        outputUrlId: 'favImg',
        resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            postloaded = true;
        },
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerFavImg = new Croppic('croppicFavImg', cropContainerFavImg);
</script>