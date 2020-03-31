
<div id="comments-header">
    <h1><?php echo $vars['title'];?></h1>
</div>
<div id="comments-form">
    <h3>Пожалуйста оставте свой коментарий</h3>
    <form method="POST">
        <div>
            <label>Оставте коментарий</label>
            <div>
                <textarea name="comment"> </textarea>
            </div>
        </div>
        <div>
            <br>
            <input type="submit" name="submit" value="Написать">
        </div>
    </form>
</div>
<div class="comments_wrap2">
    <h2>Комментарии:</h2>
    <!--<ul>
        <li>
            <span>User</span>
            <span>24.03.2020</span>
            <div>Текст ответа 2й вложенности</div>
            <input type="submit" name="submit" value="Ответить">
        </li>
    </ul>-->
    <?php if (!empty($vars['comments'])):?>
    <?php foreach ($vars['comments'] as $comment) : ?>

        <p <?php if ($comment['user_id'] == $_SESSION['user_id']) {
            echo 'style="font-weight: bold;"';
        }?>><span class="comment-date-user"><?php echo $comment['username'] . "</br>";?> </span> <span class="comment-date">(<?php echo $comment['created_at'] ;?>)</br>
            </span> <?php echo $comment['comment'];?>
        </p>

        <form method="POST" id="form1" style="display: none;">
            <div>Ответ:</div>
            <textarea name="comment"></textarea>
            <input type="submit" name="submit" value="Ответить">
        </form>
        <input type="button" value="Ответить" onclick="disp(document.getElementById('form1'))" />
    <?php endforeach;?>
    <?php else: ?>
    <h2>No comments</h2>
    <?php endif;?>
</div>



