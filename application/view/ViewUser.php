<div class="container">
    <div class="content">
        <?php $user = $data['user']; ?>
        Доброго времени суток, <?php echo $user->login; ?>!<br>
        Вы на нашем сайте с <?php echo $user->regdate; ?> .
    </div>
</div>
