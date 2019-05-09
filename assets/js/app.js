var i = 0;
$(document).ready(function () {
    /** 
     * Script SLider
     */
    $('#slider img').show();
    showNextImg()
    setInterval('showNextImg()', 3000)

    /**
     * 
     * Script Hide Span
     * 
     */
    $('#linkLogout span').hide();
    $('#linkLogout').hover(function () {
        $('#linkLogout span').show();

    }, function () {
        $('#linkLogout span').hide();
    });

    $('#linkCat span').hide();
    $('#linkCat').hover(function () {
        $('#linkCat span').show();

    }, function () {
        $('#linkCat span').hide();
    });

    $('#linkCart span').hide();
    $('#linkCart').hover(function () {
        $('#linkCart span').show();

    }, function () {
        $('#linkCart span').hide();
    });

    $('#linkAbout span').hide();
    $('#linkAbout').hover(function () {
        $('#linkAbout span').show();

    }, function () {
        $('#linkAbout span').hide();
    });
    /**
     * 
     * End Script Hide Span
     */


});

function showNextImg() {
    i++;
    $('#sliderImg' + i).appendTo('#slider').effect("slide");
    if (i == 3) {
        i = 0;
    }
}