<?php
require_once "/application/core/class.View.php";
require_once "/application/view/ViewUserbar.php";
class ViewEvent extends View
{
    private $userBar;

    function __construct($data = null)
    {
        $this->userBar = new ViewUserbar($data);
        parent::__construct($data);
    }

    function getBody()
    {
        ?>
        <div class="content">
            <?php
            $this->userBar->getBody();
            ?>
            <div style="clear: both"></div>

            <div class="contentcontent">
                <?php
                if (null != $this->data)
                    foreach ($this->data['event'] as $event) {
                        ?>
                        <div class="userspace" groupid="<?php echo $event->groupid; ?>">
                            <div class="usrsp-content">
                                <div class="usrsp-textblock">
                                    <div class="usrsp-title"><b><?php echo $event->event; ?></b></div>
                                    <div class="usrsp-comment"><b>ежедневно</b>

                                        <p><b>10:00, 15:00, 21:00</b></p>
                                    </div>
                                    <div class="usrsp-text">
                                        <?php echo $event->detail; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="usrsp-buttons">
                                <ul class="usrsp-but">
                                    <a href="/">
                                        <li>Просмотр</li>
                                    </a>

                                    <a href="/">
                                        <li>Удалить</li>
                                    </a>
                                </ul>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                    <?php
                    }
                ?>
                <div style="clear: both"></div>
            </div>
            <div style="clear: both"></div>
        </div>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/event.css"/>';
        $this->userBar->getCss();
    }

    function getJs()
    {
        $this->userBar->getJs();
    }


}