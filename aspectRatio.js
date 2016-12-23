$(document).ready(setAspect);
function setAspect(){
    var image = $(".imageContainer");
    var newHeight = image.width() * 0.5680272108843537;
    $(".landingFrame").css("max-height", (newHeight + 96)+"px");
}