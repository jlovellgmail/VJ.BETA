window.onload = function () {
    $.getScript("/js/jquery.reel.js");
};


$('select').each(function () {
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());

    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }

    var $listItems = $list.children('li');

    $styledSelect.click(function (e) {
        e.stopPropagation();
        $('div.select-styled.active').each(function () {
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });

    $listItems.click(function (e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });

    $(document).click(function () {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});

// $(document).on('click', '.class1, .class2, .class3', function () {
//     $('.classa').removeClass('classb');
// });

function addToCart(pid) {


    // JL
    // var qty = $("#itemQty").val();
    var qty = 1;


    if (qty > 0) {
        //window.location = "/cart/addProduct.php?pid=" + pid + "&qty=" + qty;
        $.ajax({
            type: 'GET',
            url: "/cart/addProduct.php?pid=" + pid + "&qty=" + qty,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                $.ajax({
                    type: 'GET',
                    url: "/incs/navCart.php?from=AJAX",
                    error: function (xhr, status, error) {
                        alert(status);
                        alert(xhr.responseText);
                    },
                    success: function (result) {
                        $("#CartNavContainer").html(result);
                        $('#navDropdownToggle_cartID').click(function () {
                            $(this).next('.navDropdown').slideToggle().toggleClass("navDropdownVisible");;
                            $(".navDropdownToggle").not(this).next('.navDropdown').hide().removeClass("navDropdownVisible");

                        });

                        $('.navDropdownToggleClose').click(function () {
                            $(this).closest('.navDropdown').hide();
                        });

                        $(document).click(function (e) {
                            var target = $(e.target);
                            var container = $(".navDropdown");
                            if (!container.is(e.target) && container.has(e.target).length === 0) {
                                if (target.attr("class") != "icon-basket" && target.attr("class")!="icon-torso") {
                                    $('.navDropdown').hide();
	                                }
                            }
                        });
                        $("#navDropdownDiv_cartID").slideDown();
						$('.navDropdownToggle .icon-angle-down').addClass("hoverArrow");			

                    }
                });
            }
        });
    }
}