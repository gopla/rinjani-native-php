var i = 0;
$(document).ready(function () {
    /** 
     * Script SLider
     */
    $('#slider img').show();
    showNextImg()
    setInterval('showNextImg()', 3000)

    var menu = window.location.search
    if (menu == "?menu=catalogue") {
        $("#linkCat").addClass("active");
    } else if (menu == "?menu=mycart" || menu == "?menu=checkout") {
        $("#linkCart").addClass("active");
    } else if (menu == "?menu=about") {
        $("#linkAbout").addClass("active");
    } else if (menu == "" || menu == "?menu=home") {
        $("#linkHome").addClass("active");
    } else {
        $("#linkCat").addClass("active");
    }


    /**
     * Datatables Library
     */

    $(".table").DataTable()
});

function showNextImg() {
    i++;
    $('#sliderImg' + i).appendTo('#slider').effect("slide");
    if (i == 6) {
        i = 0;
    }
}