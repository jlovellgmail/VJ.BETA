<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
if (!isset($_SESSION)) {
    session_start();
}
$tragetDiv = '';

if (isset($_GET['PID']) && $_GET['PID'] != '') {
    $_SESSION["Home"]["scrollStart"] = 0;
    $tragetDiv = "divID_" . $_GET['PID'];
} else {
    $_SESSION["Home"]["scrollStart"] = 0;
    $_SESSION["Home"]["scrollStop"] = 5;
}

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/Lifestyle.class.php';
include $rootpath . '/classes/AmbassadorPost.class.php';
include $rootpath . '/classes/AmbassadorEvent.class.php';

$lifestyle = new Lifestyle();
$lifestylePosts = $lifestyle->getLifestylePosts();
$lifestyleEvents = $lifestyle->getLifestyleEvents();

$eventsCount = count($lifestyleEvents);
$postCount = count($lifestylePosts);

$query = "{call F_GetLifestyleGalleryItems}";
$dbo->doQuery($query);
$gallery = $dbo->loadObjectList();
?>


<!-- <div class='lifestyle-content-wrapper widthWrapper'> -->
<div>

    <?php if ($postCount > 0) { ?>
        
        <!-- <div class='rel sm-twelve xl-eight marBottom45'> -->
        <div>

            <!-- <div class='sm-twelve'> -->
            <div>
                
                <!-- <div class='title-block-pad'> -->
                <div>

                    <div class="lifestyle-section-title-block">


                        <!--
                        <h3 class="ital fw-300">Virgil James Lifestyle</h3>
                        <h2 class="caps size45">Journal</h2>
                        -->
                        <div class="part1">Lifestyle</div>
                        <div class="part2">Journal</div>


                    </div>
                </div>


                <!-- <div class="journal-rows-wrapper" id="lifestylePosts" data-ui="jscroll-default"> -->
                <div id="lifestylePosts" data-ui="jscroll-default">

                    <?php include "/getLifestylePosts.php"; ?>

                </div>
                
                <div class="next jscroll-next-parent" style="display: none;">
                </div>


            </div>
        </div>
    <?php } ?>
</div>








<script>
    $('.events-list-btn, .event-list-close').on('click', function () {
        $('.event-view-all-holster').toggleClass('truncate').toggleClass('expand');
        $('.events-list-btn, .event-list-close, .event-view-all-holster-top').toggleClass('hide');
        $('.events-list-bg').toggleClass('hide');
        // $('.lifestyle-content-wrapper').toggleClass('landing-margin');
    });

    $('#lifestylePosts').jscroll({nextSelector: 'a.scroll:last'});
</script>



<script>
    $('.flippy-01').click(function () {
        $('.index-slide').toggleClass('flippyshow');
    })

    $(document).on('click', '.flip-card-blur-bg-lifestyle', function () {
        $('.index-slide').removeClass('flippyshow');
    });

    $(document).on('click', '.index-slide', function (e) {
        e.stopPropagation();
    });
</script>

<script>

    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    if( isMobile.any() ) {
        $(".index-slide, .flip-card-blur-bg, .flip-card-blur-bg-lifestyle").css("background-attachment","scroll");
    } else {
        $(".index-slide, .flip-card-blur-bg, .flip-card-blur-bg-lifestyle").css("background-attachment","fixed");
    };

</script>

<!--
<script>
    $(document).ready(function () {
        $(".image-grid-wrapper .img-grid-pad-wrapper:first-child .aspect-img").addClass('img-grid-first-corner');
        $(".image-grid-wrapper .img-grid-pad-wrapper:last-child .aspect-img").addClass('img-grid-last-corner');
    });
</script>
-->

<?php if ($tragetDiv != '') {
    ?>
    <script>
        $(document).ready(function () {
            var scrollTo = $("#<?php echo $tragetDiv; ?>");
            $('html,body').animate({scrollTop: scrollTo.offset().top - ($(window).height() / 2) + (scrollTo.height() / 2)});
        });
    </script>



    <?php
}
?>
