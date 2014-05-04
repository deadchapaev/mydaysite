<?php
namespace application\view;

use application\core\View;

class ViewUserbar extends View
{
    function getBody()
    {
        if (null !== $this->data['user']->id) {
            ?>
            <div class="userbar">

                <div class="eventbuttons">
                    <ul class=mainbutton>
                        <!--                        <a href="/Event/Add">-->
                        <li class="poplight-event" rel="popup_addevent" href="#?w=600">Новое событие</li>
                        <!--                        <a href="/Eventgroup">-->
                        <li class="poplight" rel="popup_addgroup" href="#?w=480">Новая группа</li>
                    </ul>
                </div>

                <?php
                if (null !== $this->data && null !== $this->data['eventgroup'] && count($this->data['eventgroup']) > 0 && count($this->data['event']) > 0) {
                    //Выводить ли стрелочки :)
                    $drowArrows = (count($this->data['eventgroup']) > 4);

                    if ($drowArrows) {
                        ?>
                        <div class="leftarrow">
                            <a href=""></a>
                        </div>
                    <?php } ?>
                    <ul class="usergroup">

                        <li class="checked">Все</li>

                        <?php foreach ($this->data['eventgroup'] as $eventgroup) { ?>

                            <li groupid="<?php echo $eventgroup->id; ?>"><?php echo $eventgroup->groupname; ?></li>

                        <?php } ?>
                    </ul>

                    <?php if ($drowArrows) {
                        ?>
                        <div class="rightarrow">
                            <a href=""></a>
                        </div>
                    <?php } ?>

                <?php
                }
                ?>
            </div>
            <!--Встроенная разметка для всплывающего окна добавления группы-->
            <div id="popup_addgroup" class="popup_add_block">

                <div class="popup_group_header">
                    <div class="popupg_header_title"> Добавление новой группы</div>
                    <div id="close_window_g"><a href="/">x</a></div>
                </div>

                <div class="addlabel">
                    Введите название новой группы событий
                </div>
                <form id="form" action="/Eventgroup/Add.ws" method="post">
                    <div class="input-title">
                        <INPUT id="name" type="text" name="groupname" size="70">
                    </div>

                    <div class="submit-buttons">
                        <ul class="submit-but">
                            <li><input type="submit" value="Добавить"></li>
                            <a href="/event">
                                <li>Назад</li>
                            </a>
                        </ul>
                    </div>
                </form>
            </div>

            <!--Встроенная разметка для всплывающего окна добавления события BEGIN**************************************************-->
            <div id="popup_addevent" class="popup_event_block">

                <div class="popup_header">
                    <div class="popup_header_title"> Добавление нового события</div>
                    <div id="close_window"><a href="/">x</a></div>
                </div>


                <form action="/Event/Add.ws" method="post">

                    <div class="input-title-event">
                        Введите название нового события
                    </div>


                    <INPUT type="text" name="event" id="lineevent_input" size="91">

                    <div class="input-text-title">
                        Введите содержание события
                    </div>

                    <textarea rows="10" cols="68" name="detail" id="addevent_textarea"></textarea>

                    <div class="group-choice-title">
                        Выберите группу событий
                    </div>

                    <div class="group-choice">
                        <select name="groupid" id="group-choice">
                            <?php
                            if (null != $this->data)
                                foreach ($this->data['eventgroup'] as $eventgroup) {
                                    ?>
                                    <option
                                        value="<?php echo $eventgroup->id; ?>"><?php echo $eventgroup->groupname; ?></option>
                                <?php
                                }
                            ?>
                        </select>

                    </div>

                    <div class="date-choice-title">
                        Выберите дату
                    </div>

                    <input type="text" name="date" id="date"/>

                    <div class="group-choice-time">
                        Выберите время события
                    </div>

                    <div class="time-choice">
                        <select class="hour" name="hour">
                            <option value="0">0</option>
                        </select>
                        <select class="minute" name="minute">
                            <option value="0">0</option>
                        </select>
                    </div>

                    <div class="input-buttons-event">
                        <input type="submit" value="Принять"> <a href="/"><input class="button-addevent"
                                                                                 type="button"
                                                                                 value="Назад"></a>
                    </div>
                </form>
            </div>


            <!--*********************************END*****************************************************************-->
        <?php
        }
        ?>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/userbar.css"/>';
    }

    function getJs()
    {
        echo '<script type="text/javascript" src="/js/menu.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/userbar.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/jquery.selectBox.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/nicEdit.js" charset="utf-8"></script>';
    }


}