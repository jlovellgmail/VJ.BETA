<?php
if (!isset($_SESSION)) {
    session_start();
}

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/classes/Image.class.php');
include_once($rootpath . '/incs/conn.php');

$scrollStep = 5;
if (isset($_SESSION["Home"]["scrollStart"]) and $_SESSION["Home"]["scrollStart"] != '') {
    $scrollStart = $_SESSION["Home"]["scrollStart"];
} else {
    $scrollStart = 0;
}
if (isset($_SESSION["Home"]["scrollStop"]) and $_SESSION["Home"]["scrollStop"] != '') {
    $scrollStop = $_SESSION["Home"]["scrollStop"];
} else {
    $scrollStop = 5;
}

$Query = "SELECT row_number() over(order by PostDate DESC, Title) as rnum, P.* from Posts P where DelFlag=0 and AID=0 and Publish=1 and Type='L' and PostDate <= getDate()";
$Query = "select * from (" . $Query . ") as tmp_table where rnum > $scrollStart and rnum <= $scrollStop";

$dbo = database::getInstance();
$dbo->doQuery($Query);
$postList = $dbo->loadObjectList();

if (is_array($postList)) {
    $_SESSION["Home"]["scrollStart"] = $_SESSION["Home"]["scrollStop"];
    $_SESSION["Home"]["scrollStop"] = $scrollStop + $scrollStep;
    foreach ($postList as $post) {
        $PID = $post['PID'];
        $Title = $post['Title'];
        $urlTitle = str_replace(' ', '-', $Title);
        $urlTitle = str_replace('&', '-', $urlTitle);
        $urlTitle = str_replace('?', '-', $urlTitle);
        $urlTitle = str_replace('/', '-', $urlTitle);
        $subTitle = $post['SubTitle'];
        $image = new Image($post['ImgUrl']);
        $image = $image->getImageUrl();
        ?>

        <div class="lifestyle-post-block textLeft" id="divID_<?php echo $PID; ?>">
            
            <!-- <div class="xs-four md-two" > -->
            <div class="imageContainer">


                <!--
                <div class='square-aspect-dummy'></div>
                <a class='aspect-img'
                   href="/post-view.php?from=lifestyle&PermLink=Virgil-James&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"
                   style='background-image: url(<?php echo $image; ?>);'></a>
                -->
                <a class='image'
                   href="/post-view.php?from=lifestyle&PermLink=Virgil-James&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"
                   style='background-image: url(<?php echo $image; ?>);'></a>



            </div>

            <!-- <div class="xs-eight md-ten textLeft" style='padding-left: 15px;'> -->
            <div class="textContainer">


                <a href="/post-view.php?from=lifestyle&PermLink=Virgil-James&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>">
                    
                    <!-- <h4 class="fw-600 size5"><?php 
                        //echo $Title; 
                    ?></h4>
                    -->
                    <h4 class="title"><?php echo $Title; ?></h4>

                </a>
                <p><?php echo $subTitle; ?></p>


                <!--                
                <a href="/post-view.php?from=lifestyle&PermLink=Virgil-James&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"
                   class="fw-600 size7">Read More +</a>
                -->
                <a href="/post-view.php?from=lifestyle&PermLink=Virgil-James&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"
                   class="readMoreLink">Read More</a>


            </div>


        </div>
        <?php
    }
    ?>
    <a href="/getLifestylePosts.php" class="scroll" id="last"></a>
    <?php
}
?>