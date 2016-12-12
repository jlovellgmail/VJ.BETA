
<?php $page = "userAccount"; ?>
<?php $page2 = "ambInspirations"; ?>
<?php include '../incs/userAccountNav.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorInspiration.class.php';

$IID = $_GET['IID'];

$ImageTitle = '';
$Message = '';
$ImgUrl = '';
$ImgType = '';

if (isset($IID) && $IID != "") {
    $Inspiration = new AmbassadorInspiration();
    $Inspiration->initialize($IID);

    $ImageTitle = $Inspiration->getVar("ImageTitle");
    $Message = $Inspiration->getVar("Message");
    $ImgUrl = $Inspiration->getImgUrl();
    $ImgType = $Inspiration->getVar("ImgType");
}
?>
<div class='widthWrapper'>
    <div class='admin-content-wrapper xs-twelve sm-ten xl-eight marBottom60'>
        <?php if (isset($IID) && $IID != "") { ?>	
        		<h1 class='caps marBottom10 size5'>Edit Inspiration</h1>
        <?php } else { ?>      
        		<h1 class='caps marBottom10 size5'>Add Inspiration</h1>
        <?php } ?>
        <form class="generalForm" id="InspFrm" method="post" action="/Ambassador/ambInspiration_action.php?IID=<?php echo $IID; ?>&AID=<?php echo $AID; ?>">
            <input type="hidden" name="ImgUrl" id="ImgUrl" value="<?php echo $ImgUrl; ?>">
            <div class="form-group">
                <label for="firstName">Image Title</label>
                <input type="text" class="form-control" id="ImageTitle" name="ImageTitle" placeholder="Image Title" maxlength="100" value="<?php echo $ImageTitle; ?>" />
            </div>
            <div class="form-group marBottom30">
                <label for="firstName">Message</label>
                <textarea type="tinymce" class="form-control" id="Message" name="Message" placeholder="Message" maxlength="500"><?php echo $Message; ?></textarea>
            </div>

            <div id="cropDiv" class='rel block marBottom15'>
                <?php include $rootpath."/Ambassador/incs/inspirationCrop.php"; ?>
            </div>

            <?php if (isset($IID) && $IID != "") { ?>
            			<div class='xs-twelve marBottom30'>
                			<a type="button" href="javascript:void(0);" onclick="showModal('/incs/modals/modal-inspiration-related-products.php?IID=<?php echo $IID; ?>');">+ Add / Edit Related Products</a>
            			</div>
            <?php } ?>
            <div class='xs-six textLeft'>
                <a href='javascript:delInspiration("<?php echo $IID; ?>")' style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Delete Inspiration</a>
            </div><div class='xs-six textRight'>
                <?php if (isset($IID) && $IID != "") { ?>	
                		<button type="button" onclick="validateInspiration()" class="admin-add-button">Update</button>
                <?php } else { ?>
                		<button type="button" onclick="validateInspiration()" class="admin-add-button">Submit</button>
                <?php } ?>
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
