<?php
namespace application\view;

use application\core\View;

class ViewUserAuth extends View
{
    function getBody()
    {
        ?>

        <div class="contentauth">
            <div class="left-content">
                <div class="left-title"><b> Вход</b></div>
                <div class="left-text"> если вы уже зарегистрированы введите пожалуйста свой e-mail и пароль для
                    входа
                </div>

                <form action="/User/Login" method="post">
                    <div class="input"> email
                        <INPUT type="text" name="emailin" size="30">
                        <BR>
                        <BR>
                        пароль
                        <INPUT type="password" name="passin" size="30">
                        <BR>
                    </div>

                    <button class="submitb" type="submit"> Войти</button>


                </form>
            </div>


            <div class="right-content">
                <div class="right-title"><b> Регистрация</b></div>
                <div class="right-text"> заполните пожалуйста регистрационную форму, чтобы <br>
                    зарегистрироваться на нашем сайте
                </div>

                <form action="/User/Reg" method="post">

                    <div class="input-right"><BR>
                        <BR>
                        логин
                        <INPUT type="text" name="loginr" size="30">
                        <BR>
                        <BR>
                        пароль
                        <INPUT type="password" name="passir" size="30">
                        <BR>
                        <BR>
                        email
                        <INPUT type="text" name="emailr" size="30">
                        <BR>
                        <BR>
                        имя
                        <INPUT type="text" name="namer" size="30">
                        <BR>
                        <BR>
                        фамилия
                        <INPUT type="text" name="surnr" size="30">
                        <BR>
                        <BR>
                        отчество
                        <INPUT type="text" name="fathr" size="30">
                        <BR>
                        <BR>
                        <button class="submit-r" type="submit"> Зарегестрироваться</button>
                    </div>
                    <div class="right-text-bottom"> После того как Вы завершите регистрацию на ваш
                        <BR>
                        e-mail сразу будет выслано письмо со ссылкой о подтверждении
                        регистрации. Более подробную информацию о себе и настройки
                        аккаунта Вы сможете указать в личном кабинете после
                        подтверждения регистрации.
                    </div>


                </form>

            </div>
        </div>

    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/auth.css"/>';
    }


}