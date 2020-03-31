<div class="body-content container mlogin">
    <h1>Регистрация</h1>
    <div>
        <form method="POST">
            <div style="color: red;">
                <?php if(!empty($vars['errors'])):?>
                    <?php foreach ($vars['errors'] as $error) :?>
                        <p><?php echo $error;?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div>
                <label>Логин:</label>
                <div>
                    <input type="text" name="user_name" id="username" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"/>
                    <span id="username_error" style="color: red;"></span>
                </div>
            </div>
            <div>
                <label>Email:</label>
                <div>
                    <input type="email" name="email" id="email" required="" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : '');?>"/>
                    <span id="email_error" style="color: red;"></span>
                </div>
            </div>
            <div>
                <label>Имя:</label>
                <div>
                    <input type="text" name="first_name" required="" value="<?php echo (!empty($_POST['first_name']) ? $_POST['first_name'] : '');?>"/>
                </div>
            </div>
            <div>
                <label>Фамилия:</label>
                <div>
                    <input type="text" name="last_name" required="" value="<?php echo (!empty($_POST['last_name']) ? $_POST['last_name'] : '');?>"/>
                </div>
            </div>
            <div>
                <label>Страна:</label>
                <div>
                    <select class="select" name="country" >
                        <option value="Укажите страну">Укажите страну</option>
                        <option value="Украина">Украина</option>
                        <option value="Англия">Англия</option>
                        <option value="Беларусь">Беларусь</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Город:</label>
                <div>
                    <select class="select" name="city">
                        <option value="Укажите город">Укажите город</option>
                        <option value="Киев">Киев</option>
                        <option value="Львов">Львов</option>
                        <option value="Ливерпуль">Ливерпуль</option>
                        <option value="Манчестер">Манчестер</option>
                        <option value="Минск">Минск</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Пол:</label>
                <div>
                    <select class="select" name="gender">
                        <option value="Укажите пол">Укажите пол</option>
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                        <option value="Всякое бывает">Всякое бывает</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Пароль:</label>
                <div>
                    <input type="password" name="password" required="" value=""/>
                </div>
            </div>
            <div>
                <label>Подтвердите пароль:</label>
                <div>
                    <input type="password" name="confirm_password" required="" value=""/>
                </div>
            </div>
            <div>
                <br/>
                <input class="button" type="submit" name="submit" id="submit" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</div>


