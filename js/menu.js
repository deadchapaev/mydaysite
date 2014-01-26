$(document).ready(function () {


    //$('.usergroup > li').click(function (event) {
    $('.usergroup > li').click(function ($this) {
        //alert($(this).attr('groupid'));
        $index = $(this).attr('groupid');

        $(".userspace").each(function (index) {
            if (null != $index) {
                if ($(this).attr('groupid') == $index) {
                    $(this).slideToggle("userspace", function () {
                    });
                }
            } else {
                $(this).slideToggle("userspace", function () {
                });
            }

        });

        /*
         $(".userspace").slideToggle("userspace", function () {
         });*/
    });

});