<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Virgil James Admin - Add Post</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/tables.css" />
		<link rel="stylesheet" href="../css/glyphs.css" />
		<link rel="stylesheet" href="/admin/css/contentAdmin.css" />
        <link rel="stylesheet" href="/css/robs-admin.css" />
		<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
		  <script src="js/add_ambassador.js" type="text/javascript"></script>
		  <script src="js/add_user.js" type="text/javascript"></script>
		  <script src="js/general.js" type="text/javascript"></script>
		  <script src="js/ambPosts.js" type="text/javascript"></script>
		  <script type="text/javascript" src="/tinymce-development/js/tinymce/tinymce.min.js"></script>
    </head>
    <body class="loginBody">
<textarea id="PostContent" name="PostContent" type=tinymce style="height:600px;"></textarea>
    </body>
</html>
<script>
    tinymce.init({
        selector: "textarea[type=tinymce]",
        theme: "modern",
        menubar: "edit insert format table tools",
        menu: {// this is the complete default configuration
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link image media | template hr | charmap'},
            view: {title: 'View', items: 'visualaid code'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript| formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        plugins: [
            "autolink link lists image charmap print preview hr spellchecker moxiemanager",
            "searchreplace wordcount fullscreen media insertdatetime",
            "table directionality paste textcolor code template"
        ],
    	moxiemanager_skin: 'vj',
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
        convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        content_css:["/tinymce/js/tinymce/templates/templates.css?0002-0027-2016-6","/css/common_dev.css"]  ,
		templates: [
			{
            title: "test-template",
            url: "/tinymce/js/tinymce/templates/test-template.html",
            description: "test"
			},
			{
            title: "Image Column Left / Text Column Right",
            url: "/tinymce/js/tinymce/templates/image-left-col.html",
            description: "Adds an image on the left and body copy on the right."
			},
			{
            title: "Image Column Right / Text Column Left",
            url: "/tinymce/js/tinymce/templates/image-right-col.html",
            description: "Adds an image on the right and body copy on the left."
			},
			{
            title: "Image Left",
            url: "/tinymce/js/tinymce/templates/image-float-left.html",
            description: "Adds an image on the left in the flow of a block of text."
			},
			{
            title: "Image Right",
            url: "/tinymce/js/tinymce/templates/image-float-right.html",
            description: "Adds an image on the right in the flow of a block of text."
			},
            {title: "Image - Full Width",
            url: "/tinymce/js/tinymce/templates/image-full-width.html",
            description: "Adds a full width image with rounded corners."
			},
            {title: "Images - Three Across",
            url: "/tinymce/js/tinymce/templates/three-images-across.html",
            description: "Adds three images across the full width of the content area."
			},
            {title: "Images - Two Images with Gap",
            url: "/tinymce/js/tinymce/templates/two-images-with-gap.html",
            description: "Adds two images across the full width of a page with a large gap in the middle."
			}
		],
        template_templates : [
            {
                title : "Editor Details",
                description : "Adds Editors Name and Staff ID"
            }
        ],
	    toolbar: "false",
        toolbar: [
            "undo redo | styleselect | bold | italic | link | image | fullscreen | alignleft aligncenter alignright"
        ]
    });
</script>
