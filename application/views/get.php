
<form method="post" action="/ci/index.php/main/edit/<?=$get->password?>/<?=$get->count?>">
    <input class="name" type="text" value="<?=$get->name?>" placeholder="name" name="name">
    <input class="title" type="text" value="<?=$get->title?>" placeholder="title" name="title">
    <textarea class="content" type="text" placeholder="content" name="content" required><?=$get->content?></textarea> 
    <input type="password" class="writer_password" placeholder="password" name="password">
    <input type="submit" class="submit" value="수정완료" name="submit">
</form>

