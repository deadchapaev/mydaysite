$(document).ready(function () {
    $('.menu-content ul > li ul').click(function (event) {
        event.stopPropagation();
    }).filter('*').hide(); //filter(':not(:first)').hide();

    $('.menu-content ul > li').click(function () {
        var selfClick = $(this).find('ul:first').is(':visible');
        $(this).find('ul:first').stop(true, true).slideToggle(0);

        if ($(this).hasClass('usrmenulvl1item')) {
            $(this).removeClass('usrmenulvl1item');
            $(this).addClass('usrmenulvl1item-active');
        } else {
            $(this).removeClass('usrmenulvl1item-active');
            $(this).addClass('usrmenulvl1item');
        }
        ;

        //if(!selfClick) {
        //$(this).parent().find('> li ul:visible').slideToggle(0);
        //}
    });
});