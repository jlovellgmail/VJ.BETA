<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorQuestion.class.php';

$QID = $_GET['QID'];
$AID = $_GET['AID'];


$Question = '';
$Answer = '';

if (isset($QID) && $QID != "") {
    $AmbassadorQuestion = new AmbassadorQuestion();
    $AmbassadorQuestion->initialize($QID);
	
	$Question = $AmbassadorQuestion->getVar("Question");
	$Answer = $AmbassadorQuestion->getVar("Answer");
}
?>

<?php if (isset($QID) && $QID != '') { ?>
	<h6 class="modalTitle">Edit Interview Question</h6>
<?php } else { ?>
	<h6 class="modalTitle">Add Interview Question</h6>
<?php } ?>

<form class="generalForm modalForm" id="questionFrm">
    <div class="row">
        <div class="lg-twelve">
            <label>Question</label>
            <input type="text" id="Question" name="Question" value="<?php echo $Question; ?>">
            <label>Answer</label>
			<textarea type=tinymce id="Answer" name="Answer"><?php echo $Answer; ?></textarea>
        </div>
    </div>
    <br>
    <div class="generalFormSubmit textCenter">
        <button type="button" onClick="addQuestion('<?php echo $QID; ?>', '<?php echo $AID; ?>');" class="fillBtn">Save</button>
    </div>
</form>

<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea[type=tinymce]",
        theme: "modern",
        menubar: "edit insert format table tools",
        menu: {// this is the complete default configuration
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link media | template hr | charmap'},
            view: {title: 'View', items: 'visualaid'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        plugins: [
            "autolink link lists charmap print preview hr spellchecker",
            "searchreplace wordcount fullscreen insertdatetime",
            "table directionality paste textcolor"
        ],
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
		convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        toolbar: "false",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
</script>