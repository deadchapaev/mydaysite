<div class="header">

    <?php include "ViewCalendar.php"; ?>

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
            if (null !== $data['user'] && null !== $data['user']->id) {
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
    if (null !== $data['user'] && null !== $data['user']->id) {
        ?>
        <div class="authorization"> Вы зашли как <b><?php echo $data['user']->login; ?> </b></div>
    <?php } ?>

</div>