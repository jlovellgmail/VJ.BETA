<?php
$active_page = 'lifestyle';
$active_subpage = 'imggrid';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Virgil James Admin - Lifestyle Gallery</title>

    <?php include '../incs/head-links.php'; ?>

    <link rel='stylesheet' href='../js/jquery-ui/jquery-ui.min.css' />
    <link rel='stylesheet' href='/css/content-admin.css' />
    <link rel='stylesheet' href='/css/lifestyle.css' />
    <link rel='stylesheet' href='/css/ca-img-grid.css' />

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>

            <?php //include 'incs/nav/robs-admin-nav.php'; ?>

            <div class='widthWrapper admin-content-wrapper xs-twelve sm-ten md-eleven xl-ten marBottom60'>

                <div class='admin-panel-controls marBottom15'>
                    <div class='xs-twelve textRight'>
                        <a class='textBtn' style='line-height: 28px;' href='img-grid-editor.php'>+ Add Image</a>
                    </div>
                </div>

                <div class='gallery-wrapper' style='border: 1px solid #eee;'>
                    <div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--

                    == Additional static images below to be removed ==

                    --><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
                        <div class='gallery-img leafCorners3'>
                            <div class='square-aspect-dummy'></div>
                            <div class='aspect-img' style='background-image: url(/img/dev-static-lifestyle-gallery/horse.jpg);'>
                                <div class='hover-pane'>
                                    <div class='title-wrapper tableWrapper'>
                                        <div class='cellWrapper'>
                                            <span class='gallery-img-title size5' title='hello'>Here's Some Talking Horses</span>
                                        </div>
                                    </div>
                                    <div class='gallery-img-button-wrapper'>
                                        <a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modalLifestyleGallery.php');">View</a><!-- 
                                     --><a class='gallery-img-edit size7' href='img-grid-editor.php'>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>

</body>
</html>