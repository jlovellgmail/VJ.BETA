$(document).ready(function () {
    //loadContent(colType);
});
/*
function holdUp() {
    var col = getUrlVars()["col"];
    var line = getUrlVars()["line"];
    $('#lineProducts').load('incs/collProducts.php?rnd=' + Math.random() * 11 + "&col=" + col + "&line=" + line + "&colid=" + ColID);
}

function holdUpBack() {
    var col = getUrlVars()["col"];
    $('#lineProducts').load('/collection/incs/' + col + '.php?rnd=' + Math.random() * 11);
}

function loadContent() {
    $('.itemBtn-1').addClass('opacityHide');
    $('.itemBtn-1').removeClass('itemBtnInactive');
    $('.backBtnWrapper').removeClass('opacityHide');
    $('.backBtnWrapper').addClass('opacityShow');
    $('.copyPanel').fadeOut();
    setTimeout(holdUp, 750);
    $('.selItemBg-1').addClass('selItemBgShow');
}

window.onpopstate = function (event) {
    var tmpPath = location.href;
    //var tmpPathArr = tmpPath.split("type=");
    //loadContent(tmpPathArr[1]);
    loadContent();
};

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

//  Clicking View Collection Button
$(document).on('click', '.itemBtn-1', function () {
    setTimeout(holdUp, 750);
    $('.itemBtn-1').addClass('opacityHide');
    $('.itemBtn-1').removeClass('itemBtnInactive');
    var col = getUrlVars()["col"];
    var line = getUrlVars()["line"];
    $('.selItemBg-1').addClass('selItemBgShow');
    $('.backBtnWrapper').removeClass('opacityHide');
    $('.backBtnWrapper').addClass('opacityShow');

    history.pushState('', 'Mens', '/collection/details.php?col=' + col + '&line=' + line);
    //e.preventDefault();
});

//  Clicking the Back Button
$(document).on('click', '.backBtnWrapper', function () {
    $('.copyPanel').fadeOut();
    setTimeout(holdUpBack, 750);
    $('.selItemBg').removeClass('selItemBgShow');
    $('.itemBtn-1').toggleClass('opacityHide');
    $('.itemBtn-1').toggleClass('itemBtnInactive');
    $('.selItemBg-1').removeClass('selItemBgShow');
    $('.backBtnWrapper').removeClass('opacityShow');
    $('.backBtnWrapper').addClass('opacityHide');
});*/

//  Collection slider JS
//  /*

$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:true,
    margin:0,
    items:1,
    nav:true,
    dots:false,
    animateOut:'fadeOut'
  });
});

/*
function holdUp_OLD() {
    var col = getUrlVars()["col"];
    var line = getUrlVars()["line"];
    var type = getUrlVars()["type"];
    //alert('incs/collProducts.php?rnd='+Math.random()*11+"&col="+col+"&line="+line+"&type="+type+"&colid="+ColID);
    $('#lineProducts').load('incs/collProducts.php?rnd=' + Math.random() * 11 + "&col=" + col + "&line=" + line + "&type=" + type + "&colid=" + ColID);
}
*/

/*
function loadContent_OLD(colType)
{
    if (colType == 'mens')
    {
        $('.itemBtn-1').addClass('itemBtnActive');
        $('.itemBtn-1').removeClass('itemBtnInactive');
        $('.itemBtn-1').siblings('.itemBtn').removeClass('itemBtnActive');
        $('.itemBtn-1').siblings('.itemBtn').addClass('itemBtnInactive');
        $('.backBtnWrapper').removeClass('opacityHide');
        $('.backBtnWrapper').addClass('opacityShow');
        $('.copyPanel').fadeOut();

        setTimeout(holdUp, 750);

        $('.selItemBg-1').addClass('selItemBgShow');
        $('.selItemBg-2, .selItemBg-3').removeClass('selItemBgShow');
    }
    else if (colType == 'womens')
    {
        $('.itemBtn-2').addClass('itemBtnActive');
        $('.itemBtn-2').removeClass('itemBtnInactive');
        $('.itemBtn-2').siblings('.itemBtn').removeClass('itemBtnActive');
        $('.itemBtn-2').siblings('.itemBtn').addClass('itemBtnInactive');
        $('.backBtnWrapper').removeClass('opacityHide');
        $('.backBtnWrapper').addClass('opacityShow');
        $('.copyPanel').fadeOut();

        setTimeout(holdUp, 750);

        $('.selItemBg-2').addClass('selItemBgShow');
        $('.selItemBg-1, .selItemBg-3').removeClass('selItemBgShow');
    }
    else if (colType == 'accessories')
    {
        $('.itemBtn-3').addClass('itemBtnActive');
        $('.itemBtn-3').removeClass('itemBtnInactive');
        $('.itemBtn-3').siblings('.itemBtn').removeClass('itemBtnActive');
        $('.itemBtn-3').siblings('.itemBtn').addClass('itemBtnInactive');
        $('.backBtnWrapper').removeClass('opacityHide');
        $('.backBtnWrapper').addClass('opacityShow');
        $('.copyPanel').fadeOut();

        setTimeout(holdUp, 750);

        $('.selItemBg-3').addClass('selItemBgShow');
        $('.selItemBg-1, .selItemBg-2').removeClass('selItemBgShow');
    }

}*/

//  Clicking any Gender Button
/*
$(document).on('click', '.itemBtn', function () {
    $(this).addClass('itemBtnActive');
    $(this).removeClass('itemBtnInactive');
    $(this).siblings('.itemBtn').removeClass('itemBtnActive');
    $(this).siblings('.itemBtn').addClass('itemBtnInactive');
    $('.backBtnWrapper').removeClass('opacityHide');
    $('.backBtnWrapper').addClass('opacityShow');
    $('.copyPanel').fadeOut();
});*/

/*
$(document).on('click', '.itemBtn-2', function () {
    setTimeout(holdUp, 750);

    $('.selItemBg-2').addClass('selItemBgShow');
    $('.selItemBg-1, .selItemBg-3').removeClass('selItemBgShow');
    var col = getUrlVars()["col"];
    var line = getUrlVars()["line"];
    history.pushState('', 'Mens', '/collection/details.php?col=' + col + '&line=' + line + '&type=womens');
    //e.preventDefault();
});*/
/*
$(document).on('click', '.itemBtn-3', function () {
    setTimeout(holdUp, 750);

    $('.selItemBg-3').addClass('selItemBgShow');
    $('.selItemBg-1, .selItemBg-2').removeClass('selItemBgShow');
    var col = getUrlVars()["col"];
    var line = getUrlVars()["line"];
    history.pushState('', 'Mens', '/collection/details.php?col=' + col + '&line=' + line + '&type=accessories');
    //e.preventDefault();
});*/

/*
$(document).on('click', '.itemBtnInactive', function () {
    $(this).siblings('.itemBtn').addClass('itemBtnInactive');
});*/