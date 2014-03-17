/**
 * Функция для работы меню
 */
$(document).on('click', '.usergroup > li', function ($this) {

    //получим идентификтаор группы
    $groupid = $(this).attr('groupid');

    $(this).removeClass('checked');
    $(this).addClass('checked');
    //поубираем чекед с соседних элементов
    $(this).siblings().each(function (index) {
        if ($(this).attr('groupid') != $groupid) {
            $(this).removeClass('checked');
        }
    });

    //скорем-покажем выбранную группу
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
            //откроем все
            $(this).slideDown(0, function () {
            });
        }
    });
});

$(document).on('click', '.rightarrow', function () {
    right_carusel();
    addMenuActions();
});

$(document).on('click', '.leftarrow', function () {
    left_carusel();
    addMenuActions();
});

function left_carusel() {
    $a = $(".usergroup  li").size();
    $(".usergroup  li").eq($a - 1).clone().prependTo(".usergroup");
    $(".usergroup  li").eq($a).remove();
}

function right_carusel() {
    $(".usergroup  li").eq(0).clone().appendTo(".usergroup");
    $(".usergroup  li").eq(0).remove();

}