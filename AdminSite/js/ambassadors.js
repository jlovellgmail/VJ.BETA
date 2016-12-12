$(document).ready(function () {
    $("input:checkbox").change(function () {
        var chkbID = ($(this).attr("id"));
        var IDArr = chkbID.split("_");
        var ID = 0;
        urlStr="setAmbVisibility.php";
        ID = IDArr[1];
        if ($(this).is(":checked")) {
            $.ajax({
                url: urlStr,
                type: 'POST',
                data: {AID: ID, strState: "1"}
            })
        } else {
            $.ajax({
                url: urlStr,
                type: 'POST',
                data: {AID: ID, strState: "0"}
            });
        }
    });
});