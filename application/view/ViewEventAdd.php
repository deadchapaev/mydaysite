<div class="addivent-block">

    <form action="/Event/Add.ws" method="post">

        <div class="input-title-event">
            Введите название нового события
        </div>

        <div class="input-line-event">
            <INPUT type="text" name="event" size="127">
        </div>

        <div class="input-text-title">
            Введите содержание события
        </div>

        <div class="input-text-event">
            <textarea rows="10" cols="110" name="detail"></textarea>
        </div>

        <div class="group-choice-title">
            Выберите группу событий
        </div>

        <div class="group-choice">
            <select>
                <option value="1">Работа</option>
                <option value="2">Дом</option>
                <option value="3">Семья</option>
                <option value="1">Без группы</option>
            </select>

        </div>

        <div class="input-buttons-event">
            <input type="submit" value="Принять"> <a href="/"><input class="button-addevent" type="button" value="Назад"></a>
        </div>

    </form>


</div>