<div class="content">
    <div class="message">
        <div class="messagetxt">
            <?php

            if (!(null === $data['msg'])) {
                echo $data['msg'];
            } else {
                echo 'Неизвестная ошибка!';
            }
            ?>

        </div>

        <div class="messagebutton">
            <ul>
                <a href="/">
                    <li>Назад</li>
                </a>
            </ul>
        </div>

    </div>


</div>
