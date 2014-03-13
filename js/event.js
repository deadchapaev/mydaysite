$(document).ready(function () {

//    $('.spoiler').hide();
//    $('<span class="revealer"></span>')
//        .insertBefore('.spoiler');
//    $('.revealer').click(function () {
//        $('.spoiler').toggle('slow');
//    });

    $('.usrsp-textblock').hide();

    $('.usrsp-head').click(function () {
        $(this).siblings('.usrsp-textblock').toggle('slow');
    });


});
