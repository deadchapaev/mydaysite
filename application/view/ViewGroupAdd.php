<!--
Данный модуль реализовывает функционал добавления групп
-->
<?php
//подключим стиль
echo '<style>';
include_once "/css/addgroup.css";
echo '</style>';
?>
<div class="addivent-block">
    <div class="left-block">
        <div class="addlabel">
            Введите название новой группы событий
        </div>
        <form action="/Eventgroup/Add.ws" method="post">
            <div class="input-title">
                <INPUT type="text" name="groupname" size="70">
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

    <div class="right-block">
        <div class="right-text">
            Название группы событий следует выбирать исходя из рода планируемых Вами событий. В следующей версии сервиса
            Вам будет предложен выпадающий список с основными вариантами названий групп событий.
        </div>
    </div>
</div>