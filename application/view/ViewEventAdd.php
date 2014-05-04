<?php
namespace application\view;

use application\core\View;

class ViewEventAdd extends View
{
    function getBody()
    {
        $this->getCss();
        ?>
        <div class="addivent-block">

            <form action="/Event/Add.ws" method="post">

                <div class="input-title-event">
                    Введите название нового события
                </div>

                <div class="input-line-event">
                    <INPUT type="text" name="event" size="91">
                </div>

                <div class="input-text-title">
                    Введите содержание события
                </div>

                <div class="input-text-event">
                    <textarea rows="10" cols="89" name="detail" id="area1"></textarea>
                </div>

                <div class="group-choice-title">
                    Выберите группу событий
                </div>


                <div class="group-choice">
                    <select name="groupid">
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

                <div class="date-choice">
                    <!--                    <select class="day" name="day">-->
                    <!--                        <option value="0">0</option>-->
                    <!--                    </select>-->
                    <!--                    <select class="month" name="month">-->
                    <!--                        <option value="0">0</option>-->
                    <!--                    </select>-->
                    <!--                    <select class="year" name="year">-->
                    <!--                        <option value="0">0</option>-->
                    <!--                    </select>-->
                    <input type="text" name="date" id="date"/>
                </div>

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
                    <input type="submit" value="Принять"> <a href="/"><input class="button-addevent" type="button"
                                                                             value="Назад"></a>
                </div>

            </form>


        </div>
    <?php
    }

    function getCss()
    {
        //подключим стиль
        echo '<link rel="stylesheet" type="text/css" href="/css/addevent.css"/>';
    }

    function getJs()
    {
        echo '<script type="text/javascript" src="/js/addevent.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/jquery.selectBox.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/nicEdit.js" charset="utf-8"></script>';
//        echo '<script type="text/javascript" src="/js/dateinput.js" charset="utf-8"></script>';
//        echo '<script type="text/javascript" src="/js/jquery.selectbox-0.2.js" charset="utf-8"></script>';
    }


}