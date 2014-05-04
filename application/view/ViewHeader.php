<?php
namespace application\view;

use application\core\View;

class ViewHeader extends View
{
    private $viewCalendar;

    function __construct($data = null)
    {
        parent::__construct($data);
        $this->viewCalendar = new ViewCalendar($data);
    }

    function getBody()
    {
        ?>
        <div class="header">

            <?php
            $this->viewCalendar->getBody();
            ?>

            <div class="logo"><b>MakeMy</b>Day</div>
            <div class="logotxt"><b>Мы</b> поможем Вам <br>
                максимально <b>эффективно</b><br>
                <b>спланировать</b> свой день<br>
            </div>
            <div class="buttonbar-content">
                <ul>
                    <a href="/">
                        <li>ГЛАВНАЯ</li>
                    </a>
                    <a href="#">
                        <li>КОНТАКТЫ</li>
                    </a>
                    <a href="#">
                        <li>О НАС</li>
                    </a>

                    <?php
                    if (null !== $this->data['user'] && null !== $this->data['user']->id) {
                        ?>
                        <a href="/User/Logout.ws">
                            <li> ВЫЙТИ</li>
                        </a>
                    <?php
                    } else {
                        ?>
                        <a href="/User/">
                            <li> ВОЙТИ</li>
                        </a>
                    <?php

                    }
                    ?>

                </ul>
            </div>

            <?php
            if (null !== $this->data['user'] && null !== $this->data['user']->id) {
                ?>
                <div class="authorization"> Вы зашли как <a href="/User">
                        <b><?php echo $this->data['user']->login; ?> </b>
                    </a></div>
            <?php } ?>

        </div>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/header.css"/>';
        echo '<link rel="stylesheet" type="text/css" href="/css/auth.css"/>';
        $this->viewCalendar->getCss();
    }

    function getJs()
    {
        $this->viewCalendar->getJs();

    }


}