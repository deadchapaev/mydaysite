<?php
namespace application\view;

use application\core\View;

class ViewFooter extends View
{

    function getBody()
    {
        ?>
        <div class="footer">
            <div class="footer-top">

                <div class="learn-area">
                    <div class="learn-label">
                        MakeMyDay - начни легко
                    </div>

                    <div class="learn-text">
                        Используйте наш сервис чтобы ничего не упустить
                    </div>

                    <div class="footer-button">
                        <ul class=learn-button>
                            <a href="/">
                                <li>Узнать больше</li>
                            </a>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-left">
                    <div class="footer-cont-label">
                        Обратная Связь
                    </div>

                    <div class="footer-contacts">
                        <ul>
                            <li>
                                <img src="/img/mailicon.png"> mmd@google.com
                            </li>
                            <li>
                                <img src="/img/icqicon.png"> 400747128
                            </li>
                            <li>
                                <img src="/img/skypeicon.png"> makeMyDay
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom-center">
                    <div class="footer-cont-label-center">
                        Новости проекта
                    </div>
                    <div class="footer-cont-text-center">
                        В данный момент наш сайт находится в стадии разработки, но уже в скором времени вы сможете
                        увидеть альфа-версию и даже немного потестировать
                    </div>

                </div>

                <div class="footer-bottom-right">

                </div>
            </div>
            <div class=footer-end>
                <div class="navigation-footer">
                    <ul>

                        <li class="main"><a href="/">ГЛАВНАЯ</a></li>
                        <li class="contacts"><a href="#">КОНТАКТЫ</a></li>

                        <?php
                        if (null !== $this->data['user'] && null !== $this->data['user']->id) {

                            ?>
                            <li class="exit"><a href="/User/Logout.ws">ВЫЙТИ</a></li>
                        <?php
                        } else {

                            ?>
                            <li class="exit"><a href="/User/">ВОЙТИ</a></li>
                        <?php
                        }

                        ?>
                        <li class="about"><a href="#">О НАС</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/footer.css"/>';
    }


}