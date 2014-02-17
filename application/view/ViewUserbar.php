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
                        <a href="/Event/Add">
                            <li>Новое событие</li>
                        </a>

                        <a href="/Eventgroup">
                            <li>Новая группа</li>
                        </a>
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
    }


}