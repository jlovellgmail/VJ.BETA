// vjNav JS Take 4 - 2015-07-23-1450h

var win = $(window),
        nbg = $('.navBgWrapper'),
        nbr = $('.navBurger'),
        

        // JL
        // this and below is temp fix while scrollWaypoint is removed
        //sw = $('.scrollWaypoint'),


        mi = $('.menu-item'),
        scrollNavEligible = false, // scrollChange eligibility
        mobileMenu = false, // is mobileMenu open?
        

        // JL
        //pos = sw.offset().top,
        sw = $(window);
        pos = $(window).scrollTop();


        cartDropStatus = false,
        userDropStatus = false;

//	navigation changes on scroll
var sticky = function () {


    //JL
    // temp fix
    //if ($(window).scrollTop() > sw.offset().top) {                                // If page is scrolled past .scrollWaypoint,
    if (true) {



        scrollNavEligible = true;												// then change scrollNavEligible variable to 'true'
        // console.log('scrollNavEligible is now ' + scrollNavEligible);
        if (mobileMenu == false) {												// If the menu isn't open,
            $('.navBgWrapper').addClass('navBgScroll');							// class for styling the nav when scrolled down the page
            $('.navDropdownContainer').removeClass('navDropdownTop');
            $('.navDropdownContainer').addClass('navDropdownScroll');
            $('.desktop-burger').addClass('go-burger-go');
		    $('.navBgWrapper').removeClass('navBgBurgerSummon');
        } else {
            return;
        }
    } else {																	// If the page isn't scrolled past .scrollWaypoint,
        scrollNavEligible = false;												// then change scrollNavEligible variable to 'false'
        // console.log('scrollNavEligible is now ' + scrollNavEligible);
        if (mobileMenu == false) {												// If the menu isn't open,
            $('.navBgWrapper').removeClass('navBgScroll')						// then make the top background bar clear, remove the drop shadow
            $('.navDropdownContainer').removeClass('navDropdownScroll');
            $('.navDropdownContainer').addClass('navDropdownTop');
            $('.desktop-burger').removeClass('go-burger-go');
        }
    }
}

// weird scroll burger functionality that nobody has ever used
$('.desktop-burger').click(function () {
    $('.navBgWrapper').removeClass('navBgScroll');
    $('.navBgWrapper').addClass('navBgBurgerSummon');
    $('.desktop-burger').removeClass('go-burger-go');
});

//	xBurger script
$('.burgerButton').click(function () {											// burger is clicked
    $('.navBgWrapper').toggleClass('navBgOpen');								// toggle the fullscreen background (probably white)
    $('.navLinksWrapper').toggleClass('navLinksMobile');						// style for fullscreen mobile nav
    mobileMenu = !mobileMenu;													// toggle boolean value for the menu being open or closed,
    // console.log('mobileMenu is changed to ' + mobileMenu);
    if (mobileMenu == true) {													// when menu opens, it does the same thing no matter where it is on the page
        $('.navBgWrapper').addClass('navBgScroll');
        $('.navBurgerWrapper').addClass('burgerActive');
        $('.navDropdownContainer').removeClass('navDropdownTop');
        $('.navDropdownContainer').removeClass('navDropdownScroll');
        $('.navDropdownContainer').addClass('navDropdownMenu');
        $('.navDropdownCart').addClass('navDropdownMobileMenu');
        $('.mobileNavFooter').removeClass('hide');
        // console.log('mobileMenu is open');
    } else {
        $('.navBurgerWrapper').removeClass('burgerActive');						// when menu is closed, it restores different classes based on page position
        $('.navDropdownContainer').removeClass('navDropdownMobileMenu');
        $('.navDropdownCart').removeClass('navDropdownMobileMenu');
        $('.mobileNavFooter').addClass('hide');
        // console.log('mobileMenu is closed,');
        if (scrollNavEligible == true) {										// If the curent scroll position on the page is below .scrollWaypoint,
            $('.navBgWrapper').addClass('navBgScroll');							// style
            $('.navDropdownContainer').addClass('navDropdownScroll');
            // console.log('and it returned the nav to scroll mode');
            return;																// and return.
        } else {
            $('.navBgWrapper').removeClass('navBgScroll');						// style
            $('.navDropdownContainer').addClass('navDropdownTop');
            // console.log('and it returned the nav to top mode');
        }
    }
});

$( document ).ready(function() {
    if ($(window).width() >= 641) {
        $('.footerLinks').removeClass('hide');
    } else {
        $('.footerLinks').addClass('hide');
    }
});

$('.navFootLink').click(function () {
    $('.navBgWrapper').removeClass('navBgOpen');
    $('.navLinksWrapper').removeClass('navLinksMobile');
    mobileMenu = false;
    $('.navBurgerWrapper').removeClass('burgerActive');
    $('.navDropdownContainer').removeClass('navDropdownMobileMenu');
    $('.navDropdownCart').removeClass('navDropdownMobileMenu');
    $('.mobileNavFooter').addClass('hide');
    if (scrollNavEligible == true) {
        $('.navBgWrapper').addClass('navBgScroll');
        $('.navDropdownContainer').addClass('navDropdownScroll');
        return;
    } else {
        $('.navBgWrapper').removeClass('navBgScroll');
        $('.navDropdownContainer').addClass('navDropdownTop');
    }
});

//  responsive restrictions on desktop/mobile menu - these apply DURING resize only!
window.onresize = function () {
    if ($(window).width() >= 641) {
        // console.log('The window is at least 641px wide.');
        mobileMenu = false;
        $('.navBgWrapper').removeClass('navBgOpen');
        $('.navLinksWrapper').removeClass('navLinksMobile');
        $('.navBurgerWrapper').removeClass('burgerActive');
        $('.navDropdownContainer').removeClass('navDropdownMobileMenu');
        $('.navDropdownCart').removeClass('navDropdownMobileMenu');
        $('.mobileNavFooter').addClass('hide');
        $('.footerLinks').removeClass('hide');
        if (scrollNavEligible == true) {
            $('.navBgWrapper').addClass('navBgScroll');
            $('.navDropdownContainer').addClass('navDropdownScroll');
            return;
        } else {
            $('.navBgWrapper').removeClass('navBgScroll');
            $('.navDropdownContainer').addClass('navDropdownTop');
        }
    } else {
        $('.navDropdownContainer').removeClass('navDropdownTop');
        $('.navDropdownContainer').removeClass('navDropdownScroll');
        $('.navDropdownContainer').addClass('navDropdownMenu');
        $('.navDropdownCart').addClass('navDropdownMobileMenu');
        $('.footerLinks').addClass('hide');
        // console.log('The window is less than 641px wide.');
    }
};


$(window).scroll(sticky);														// Run the jewels...

//	Hover Arrows
$('.aboutLink').hover(function () {
    if (mobileMenu == false) {
        $('.aboutHoverArrow').toggleClass('hoverArrow');
    }
});
$('.lifestyleLink').hover(function () {
    if (mobileMenu == false) {
        $('.lifestyleHoverArrow').toggleClass('hoverArrow');
    }
});
$('.collectionsLink').hover(function () {
    if (mobileMenu == false) {
        $('.collectionsHoverArrow').toggleClass('hoverArrow');
    }
});
$('.shopLink').hover(function () {
    if (mobileMenu == false) {
        $('.shopHoverArrow').toggleClass('hoverArrow');
    }
});
$('.ambassadorsLink').hover(function () {
    if (mobileMenu == false) {
        $('.ambassadorsHoverArrow').toggleClass('hoverArrow');
    }
});



/*DROPDOWNS JC - JULY 23 2015*/
$(function () {
    $('.navDropdownToggle').click(function () {
	


        // JL
        /*
		if ($(this).next('.navDropdown').is(':hidden')) {
            $(this).next('.navDropdown').siblings(".navDropdownToggle").children(".icon-angle-down").css("display","block");
        }
        else {
            $(this).next('.navDropdown').siblings(".navDropdownToggle").children(".icon-angle-down").css("display","none");
        }

		$(this).next('.navDropdown').slideToggle();	
		$('.navDropdownToggle').not(this).next('.navDropdown').hide().siblings(".navDropdownToggle").children(".icon-angle-down").css("display","none");		
        */
        if ($(this).next('.navDropdown').is(':hidden')) {
            $(this).next(".navDropdown").css("display", "initial");
        }
        else {
            $(this).next(".navDropdown").css("display", "none");
        }



	});

    $('.navDropdownToggleClose').click(function () {
        $(this).closest('.navDropdown').hide();
    });

    $(document).click(function (e) {
        var target = $(e.target);
        var container = $('.navDropdown');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
             if (target.attr('class')!='icon-basket' && target.attr('class')!='icon-torso'){
                $('.navDropdown').hide().siblings(".navDropdownToggle").children(".icon-angle-down").css("display","none");
             }
        } 
    });

});


// $('.cartActiveArrow').addClass('caaActive');
// $('.cartActiveArrow').removeClass('caaActive');