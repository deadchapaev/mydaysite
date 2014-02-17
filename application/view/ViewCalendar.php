<!--
Данный модуль является выводом календаря в правом верхнем углу сайта
-->
<?php
require_once "/application/core/class.View.php";
class ViewCalendar extends View
{

    function getBody()
    {
        ?>

        <div class="calendarlayout">
            <div class="calendar-header">
                <div class="back-arrow"></div>
                <div class="month-year-header">Сентябрь 2013</div>
                <div class="forw-arrow"></div>
            </div>
            <div class="calendar-welcome"></div>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="calendar-selecteddate">
                <div class="line"></div>
                <br>

                <H1>22</H1>

                <H2>сентябрь 2013</H2>
                <ul>
                    <li>заварить чай</li>
                    <li>дописать проект</li>
                    <li>сходить к врачу</li>
                    <li>побегать</li>
                </ul>
                <H3>больше событий</H3>
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