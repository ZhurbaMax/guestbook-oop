<div class="body-content container mlogin">
    <h1>Вход</h1>
    <div>
        <form method="POST">
            <div style="color: red;">
                <?php if (!empty($vars['errors'])) :?>
                    <?php foreach ($vars['errors'] as $error) :?>
                        <p><?php echo $error;?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div>
                <label>Логин или Email:</label>
                <div>
                    <input type="text" name="user_name" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"/>
                </div>
            </div>
            <div>
                <label>Пароль:</label>
                <div>
                    <input type="password" name="password" required="" value=""/>
                </div>
            </div>
            <div>
                <br/>
                <input class="button" type="submit" name="submit" value="Войти">
            </div>
        </form>
    </div>
</div>
