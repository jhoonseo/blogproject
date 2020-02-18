<div>
<?php
//var_dump($gets);
foreach($gets as $entry){
?>
<a href="/ci/index.php/main/get/<?=$entry->count?>">
<div style="border: 1px solid #e9e9e9">
    <div><?=$entry->title?></div>
    <div><?=$entry->time?></div>
    <div><?=$entry->name?></div>
    <div><?=$entry->content?></div>
    <div><?=$entry->edited?></div>
</div>
</a>
<?php
}
?>
