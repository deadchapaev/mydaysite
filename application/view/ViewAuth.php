<div class="container">
    <div class="content">
        <div class="left-content">
            <div class="left-title"><b>Вход</b></div>
            <div class="left-text">если вы уже зарегистрированы введите пожалуйста свой <br>
                e-mail и пароль для входа
            </div>

            <form action="/Auth/Login" method="post">
                <div class="input"> email
                    <INPUT type="text" name="emailin" size="30">
                    <BR>
                    <BR>
                    пароль
                    <INPUT type="password" name="passin" size="30">
                    <BR>
                </div>
                    <BR>
                    <BR>
                <INPUT type="submit" name="submit" value="Войти">
            </form>
        </div>


        <div class="right-content">
            <div class="right-title"><b>Регистрация</b></div>
            <div class="right-text">заполните пожалуйста регистрационную форму, чтобы <br>
                зарегистрироваться на нашем сайте
            </div>

            <form action="/Auth/Reg" method="post">

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
                    <INPUT type="submit" name="submit-r" value="Зарегистрироваться">
                </div>
                <div class="right-text-bottom">После того как Вы нажмёте кнопку “Зарегистрироваться” на ваш <BR>
                    e-mail сразу будет выслано письмо со ссылкой о подтверждении <BR>
                    регистрации. Более подробную информацию о себе и настройки <BR>
                    аккаунта Вы сможете указать в личном кабинете после <BR>
                    подтверждения регистрации.
                </div>


            </form>

        </div>
    </div>
</div>
