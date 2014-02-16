<!--
Данный модуль является выводом календаря в правом верхнем углу сайта
-->
<?php
//подключим стиль
echo '<style>';
include_once "/css/calendar.css";
echo '</style>';
//подключим функционал
echo '<script type="text/javascript">';
include_once '/js/calendar.js';
echo '</script>';
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