<?php
require_once "/application/core/class.View.php";
class ViewUser extends View
{
    function getBody()
    {
        ?>
        <div class="container">
            <div class="content">
                <?php $user = $this->data['user']; ?>
                Доброго времени суток, <?php echo $user->login; ?>!<br>
                Вы на нашем сайте с <?php echo $user->regdate; ?> .
            </div>
        </div>

    <?php
    }
}