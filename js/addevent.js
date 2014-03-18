$(document).ready(function () {
    /*выпадающий календарь*/
    $("#date").datepicker();

    /*стилизация select*/
    $("select").selectBox();

//    new nicEditor({
//            fullPanel: true
//        }
//    ).panelInstance("area1");
    new nicEditor({iconsPath: '/css/images/nicEditorIcons.gif'}).panelInstance('area1');
});