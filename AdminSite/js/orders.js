function searchOrders(evt)
{
    if (evt.keyCode == 13)
    {
        var searchTxt = $('#searchTxt').val();
        if (searchTxt == "")
        {
            alert("Please enter a search string.");
            $('#searchTxt').focus();
            return;
        }
        if (searchType == "Order No")
        {
            if (isInteger(searchTxt) == false)
            {
                alert("Please enter a number when searching for Order No.");
                $('#searchTxt').focus();
                return;
            }
            else
            {
                searchType = "OrderNo";
            }
        }
        else if (searchType == "Phone Number")
        {
            searchType = "Phone";
        }
        $.ajax({
            type: 'POST',
            url: '/orderSearch.php',
            data: {searchType: searchType, searchTxt: searchTxt},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
                $("#ViewBtnDiv").html("VIEW MORE");
            },
            success: function (result) {
                $('#searchOrdDiv').html(result);
            }
        });
    }
}