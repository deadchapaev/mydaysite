$(document).ready(function () {
//гармошка ивентов
    $('.usrsp-textblock').hide();
    $('.usrsp-head').click(function () {
        $(this).siblings('.usrsp-textblock').toggle('fast');
    });


});
