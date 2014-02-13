<?php
if (null !== $data['user']->id) {
    ?>
    <div class="userbar">

        <div class="eventbuttons">
            <ul class=mainbutton>
                <a href="/Event/Add">
                    <li>Новое событие</li>
                </a>

                <a href="/Eventgroup">
                    <li>Новая группа</li>
                </a>
            </ul>
        </div>

        <?php
        if (null !== $data && null !== $data['eventgroup'] && count($data['eventgroup']) > 0 && count($data['event']) > 0) {
            //Выводить ли стрелочки :)
            $drowArrows = (count($data['eventgroup']) > 4);

            if ($drowArrows) {
                ?>
                <div class="leftarrow">
                    <a href=""></a>
                </div>
            <?php } ?>
            <ul class="usergroup">

                <li class="checked">Все</li>

                <?php foreach ($data['eventgroup'] as $eventgroup) { ?>

                    <li groupid="<?php echo $eventgroup->id; ?>"><?php echo $eventgroup->groupname; ?></li>

                <?php } ?>
            </ul>

            <?php if ($drowArrows) {
                ?>
                <div class="rightarrow">
                    <a href=""></a>
                </div>
            <?php } ?>

        <?php
        }
        ?>


    </div>

<?php
}
?>