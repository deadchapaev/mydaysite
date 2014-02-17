<?php
require_once "/application/core/class.View.php";
class ViewInfo extends View
{
    function getBody()
    {
        ?>
        <div class="content">
            <div class="message">
                <div class="messagetxt">
                    <?php

                    if (!(null === $this->data['msg'])) {
                        echo $this->data['msg'];
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
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/regresult.css"/>';
    }


}
