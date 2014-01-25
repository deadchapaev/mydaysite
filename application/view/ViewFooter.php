<div class="footer">
    <ul id="navigation-footer">
        <li class="main"><a href="/">ГЛАВНАЯ</a></li>
        <li class="contacts"><a href="#">КОНТАКТЫ</a></li>

        <?php
        if (null !== $data['user'] && null !== $data['user']->id) {
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