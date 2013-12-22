<?php foreach($markers as $post): ?>

<article>

    <h1><?=$post['first_name']?> <?=$post['last_name']?> posted:</h1>

    <p><?=$post['content']?></p>

    <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        <?=Time::display($post['created'])?>
    </time>
    
    <?php if($user->user_id == $post['post_user_id']): ?> 
    <a href=/markers/delete/<?=$post['created']?>/<?=$post['post_user_id']?>>Delete</a> 
    <?php endif; ?>
    
    

</article>

<?php endforeach; ?>