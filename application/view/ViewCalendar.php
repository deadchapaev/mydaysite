<?php
namespace application\view;

use application\core\View;

class ViewCalendar extends View
{

    function getBody()
    {
        ?>

        <div class="calendarlayout">
            <div class="calendar-header">
                <div class="back-arrow"></div>
                <div class="month-year-header">JSIsDisabled</div>
                <div class="forw-arrow"></div>
            </div>

            <table class="calendargrid">
                <tr>
                    <th>ВС</th>
                    <th>ПН</th>
                    <th>ВТ</th>
                    <th>СР</th>
                    <th>ЧТ</th>
                    <th>ПТ</th>
                    <th>СБ</th>
                </tr>
                <?php
                for ($i = 0; $i < 6; $i++) {
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php

                }?>

            </table>
            <div class="calendar-selecteddate">
                <div class="line"></div>
                <br>

                <H1>JSIsDisabled</H1>

                <H2>JSIsDisabled</H2>

                <H3>текущая дата:</H3>

                <div class="curdate">
                    <a href="/">JSIsDisabled</a>
                </div>

            </div>
        </div>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/calendar.css"/>';
    }

    function getJs()
    {
        //подключим функционал
        echo '<script type="text/javascript" src="/js/calendar.js" charset="utf-8"></script>';
    }


}