<div class="addivent-block">
    <form action="/Event/Add.ws" method="post">
        <div class="input-title">
            <p><b>Введите название нового события</b><br>
                <INPUT type="text" name="event" size="147">
                <BR>
                <BR>
        </div>
        <div class="input-text">

            <p><b>Введите содержание события</b></p>

            <p>
                <textarea rows="10" cols="110" name="detail"></textarea>
            </p>

            <p><input type="submit" value="Принять"></p>


        </div>
    </form>
    <ul class="send">
        <a href="/Main">
            <li class="send-button">Назад</li>
        </a>
        <!-- <li class="send-button">Принять</li>-->
    </ul>

</div>