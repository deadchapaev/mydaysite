<?php
namespace application\view;

use application\core\View;

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
                    Ваш последний визит:  <?php echo $user->regdate; ?>.
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