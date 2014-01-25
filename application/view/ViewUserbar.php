<div class="userbar">

    <div class="eventbuttons">
        <ul class=userbuttonadd>
            <a href="/Event/Add">
                <li>Новое событие</li>
            </a>

            <a href="/Event/AddGroup">
                <li>Новая группа</li>
            </a>
        </ul>
    </div>


    <div class="leftarrow">
        <a href=""></a>
    </div>
    <ul class=usergroup>
        <a href="">
            <li>Все</li>
        </a>
        <?php
        if (null !== $data && null !== $data['eventgroup'] && count($data['eventgroup']) > 0 && count($data['event'])) {
            ?>

            <?php foreach ($data['eventgroup'] as $eventgroup) { ?>
                <a href="">
                    <li><?php echo $eventgroup->groupname; ?></li>
                </a>
            <?php } ?>

        <?php
        }
        ?>
    </ul>
    <div class="rightarrow">
        <a href=""></a>
    </div>


</div>