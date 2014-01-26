$(document).ready(function () {


    $('.usergroup > li').click(function ($this) {

        //получим идентификтаор группы
        $groupid = $(this).attr('groupid');

        $(this).removeClass('checked');
        $(this).addClass('checked');

        $(this).siblings().each(function (index) {
            if ($(this).attr('groupid') != $groupid) {
                $(this).removeClass('checked');
            }
        });

        $(".userspace").each(function (index) {
            if (null != $groupid) {
                if ($groupid == $(this).attr('groupid')) {
                    $(this).slideDown(0, function () {
                    });
                } else {
                    $(this).slideUp(0, function () {
                    });
                }
            } else {
                $(this).slideDown(0, function () {
                });
            }
        });
    });

});