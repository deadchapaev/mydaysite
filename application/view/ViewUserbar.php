<div class="userbar">

    <div class="eventbuttons">
        <ul class=userbuttonadd>
            <a href="/Event/Add">
                <li>Новое событие</li>
            </a>

            <a href="/Eventgroup">
                <li>Новая группа</li>
            </a>
        </ul>
    </div>

    <div class="eventgroups">
        <div class="leftarrow">
            <a href=""/>
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
            <a href=""/>
        </div>
    </div>


</div>
