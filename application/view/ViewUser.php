<?php
require_once "/application/core/class.View.php";

class ViewUser extends View
{
    function getBody()
    {
        ?>

        <div class="content">
            <div class="messarea">
                <div class="messtext">
                    <?php $user = $this->data['user']; ?>
                    Доброго времени суток, <?php echo $user->login; ?>!<br>
                    Вы на нашем сайте с <?php echo $user->regdate; ?> .
                </div>

            </div>

        </div>


    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/user.css"/>';
    }
}