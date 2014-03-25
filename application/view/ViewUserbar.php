<?php
require_once "/application/core/class.View.php";

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
                        <li>Новое событие</li>
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
            <!--Встроенная разметка для всплівающего окна-->
            <div id="popup_addgroup" class="popup_block">
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
                                <li>Закрыть</li>
                            </a>
                        </ul>
                    </div>
                </form>
            </div>

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
    }


}