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
                <?php
                if (null != $data)
                    foreach ($data['eventgroup'] as $eventgroup) {
                        ?>
                        <option value="<?php echo $eventgroup->id; ?>"><?php echo $eventgroup->groupname; ?></option>
                    <?php
                    }
                ?>
            </select>

        </div>

        <div class="input-buttons-event">
            <input type="submit" value="Принять"> <a href="/"><input class="button-addevent" type="button"
                                                                     value="Назад"></a>
        </div>

    </form>


</div>