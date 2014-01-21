<div class="content">
    <div class="message">
        <div class="messagetxt">
            <?php
                if (!(null ===$_SESSION['errMsg'])) {
                    echo $_SESSION['errMsg'];
                    //unset($_SESSION["errMsg"]);    
                } else {
                    echo 'Неизвестная ошибка!';
                }
                
            ?>
        </div>

        <div class="messagebutton">
            <ul>
                <a href="/auth"><li>Назад</li></a>
            </ul>
        </div>

    </div>

    
</div>
