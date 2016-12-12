$(document).ready(function () {
    $("input:checkbox").change(function () {
        var chkbID = ($(this).attr("id"));
        var IDArr = chkbID.split("_");
        var ID = 0;
        if (IDArr[0] == "feat") {
            urlStr="setProductFeature.php";
        } else if (IDArr[0] == "hidden") {
            urlStr="setProductVisibility.php";
        }

        ID = IDArr[1];
        if ($(this).is(":checked")) {
            $.ajax({
                url: urlStr,
                type: 'POST',
                data: {PID: ID, strState: "1"}
            })
        } else {
            $.ajax({
                url: urlStr,
                type: 'POST',
                data: {PID: ID, strState: "0"}
            });
        }
    });
});

function relatedProd(PID) {

    $.ajax({
        type: 'get',
        url: '/relatedProducts.php?rnd=' + Math.random() * 11 + "&pid=" + PID,
        data: {},
        error: function (xhr, status, error) {
            //alert(status);
            //alert(xhr.responseText);
        },
        success: function (result) {
            $("#relatedProductModalContent").html(result);
            $("#setRelatedProdModal").modal();
        }
    });
}

function addRelatedProd() {
    var DataSer = $("#setRelatedProdFrm").serialize();
    $.ajax({
        type: 'POST',
        url: 'addRelatedProducts_action.php?rnd=' + Math.random() * 11,
        data: DataSer,
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            //alert(result);
            $("#setRelatedProdModal").modal('hide')
        }
    });
}