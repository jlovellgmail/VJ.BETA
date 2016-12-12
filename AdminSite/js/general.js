function validateEmail(email)
{
    var valid = true;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    var splitDomain = email.split('@');
    if (splitDomain.length > 1)
    {
        var domainPart = splitDomain[1];
        var splitDot = domainPart.split('.');
        var splitHyphen = domainPart.split('-');
        var re = new RegExp("[^0-9a-zA-z.-]");
    }
    else
    {
        //alert ("Please enter a valid e-mail address.");
        return false;
    }
    if (splitDomain.length > 2)
    {
        valid = false;
    }
    else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 1 >= email.length)
    {
        valid = false;
    }
    else if (re.test(domainPart))
    {
        valid = false;
    }
    else if (splitHyphen[0] == "" || splitHyphen[splitHyphen.length - 1] == "")
    {
        valid = false;
    }
    
    for (var i = 0; i < splitDot.length; i++)
    {
        if (splitDot[i] == "")
        {
            valid = false;
            i = splitDot.length;
        }
    }

    if (valid == false)
    {
      //  alert ("Please enter a valid e-mail address.");
        return false;
    }
    else
    {
        return true;
    }
}

function isInteger(s) {
    var i;
    for (i = 0; i < s.length; i++) {
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9")))
            return false;
    }
    // All characters are numbers.
    return true;
}

function validateUrl(url)
{
    var re = new RegExp("^(http|https)\://|www\.([0-9a-zA-z\.\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
    if (re.test(url))
    {
        return true
    }
    else
    {
        return false;
    }
}

function validateFacebook(url)
{
    valid1 = url.indexOf("http://www.facebook.com/") == 0;
    valid2 = url.indexOf("https://www.facebook.com/") == 0;
    valid3 = url.indexOf("www.facebook.com/") == 0;
    if (!valid1 && !valid2 && !valid3)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validateTwitter(url)
{
    valid1 = url.indexOf("http://www.twitter.com/") == 0;
    valid2 = url.indexOf("https://www.twitter.com/") == 0;
    valid3 = url.indexOf("www.twitter.com/") == 0;
    valid4 = url.indexOf("http://twitter.com/") == 0;
    valid5 = url.indexOf("https://twitter.com/") == 0;
    valid6 = url.indexOf("twitter.com/") == 0;
    if (!valid1 && !valid2 && !valid3 && !valid4 && !valid5 && !valid6)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validateLinkedIn(url)
{
    valid1 = url.indexOf("http://www.linkedin.com/") == 0;
    valid2 = url.indexOf("https://www.linkedin.com/") == 0;
    valid3 = url.indexOf("www.linkedin.com/") == 0;
    if (!valid1 && !valid2 && !valid3)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function (m) {
        return map[m];
    });
}

function openTab(UrlStr) {
    window.open(UrlStr);
}