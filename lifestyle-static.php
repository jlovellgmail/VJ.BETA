<!doctype html>
<?php $page = "lifestyle"; ?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Virgil James Lifestyle</title>
    <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Virgil James"/>
    <meta name="description" content="With headquarters in Los Angeles, California, Virgil James is the place to shop for luxury bags and accessories."/>

    <?php include '/incs/head-links.php'; ?>
    <script src="/js/lifestyle.js"></script>
    <link rel="stylesheet" href="/css/ambassadors.css">
    <link rel="stylesheet" href="/css/lifestyle.css">

    <script src="/js/owl/dev/dist/owl.carousel.js"></script>
    <link rel="stylesheet" href="/js/owl/dev/dist/assets/owl.lifestyle-event-slider.css">

</head>
<body>
<div class="sdWrapper">
    <div class="sdContent">

        <?php include '/incs/nav.php'; ?>
        <?php include '/incs/lifestyle-static.php'; ?>

    </div>
    <?php include '/incs/footer.php'; ?>
    <?php include '/incs/footer-links.php'; ?>
</div>

<script src="/js/instafeed.min.js"></script>

<script type="text/javascript">
    var feed = new Instafeed({
        get: 'tagged',
        tagName: 'vjworld',
        clientID: '57ee56fd73be48bc87ae962f50eaa540',
        accessToken: '2013705843.57ee56f.1195de60e66844a2b7767d5b38dc68e7',
        userId: '2013705843'
    });
    feed.run();
</script>
<!-- accessToken: '2013705843.57ee56f.1195de60e66844a2b7767d5b38dc68e7' -->

<script>
    var owl = $('.event-slider');
    owl.owlCarousel({
        nav:true,
        loop:true,
        margin:0,
        responsive:{
            0:{
                items:1
            },
            741:{
                items:2
            }
        }
    });
</script>

</div>
</body>
</html>