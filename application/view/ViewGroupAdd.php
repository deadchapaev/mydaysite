<div class="addivent-block">
    <form action="/Eventgroup/Add.ws" method="post">
        <div class="input-title">
            <p><b>Введите название новой группы</b><br>
                <INPUT type="text" name="groupname" size="147">
                <BR>
                <BR>
        </div>
        <div class="input-text">

            <p><b>Введите описание назначения новой группы</b></p>

            <p>
                <textarea rows="10" cols="110" name="detail"></textarea>
            </p>

            <p><input type="submit" value="Принять"></p>

        </div>

        <ul class="send">
            <a href="/Main">
                <li class="send-button">Назад</li>
            </a>
            <!--<li class="send-button">Принять</li>-->
        </ul>
    </form>
</div>