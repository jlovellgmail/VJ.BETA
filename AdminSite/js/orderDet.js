$(document).ready(function () {
    $("#UpdOrdBtn").click(function () {
       
        var OrdStatus = $("#OrdStatusDropDown").val();
        var TrackingNo = $("#TrackingNo").val();
        var OrdID = $("#OrdIDHidden").val();
        var postData = "OrdStatus="+OrdStatus+"&TrackingNo="+TrackingNo+"&OrdID="+OrdID;
        $.ajax({
            type: 'POST',
            url: 'updateOrd.php?rnd=' + Math.random() * 11 + "&OrdID=" + OrdID,
            data: postData,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                $("#UpdMsg").show();
            }
        });
    });
});
