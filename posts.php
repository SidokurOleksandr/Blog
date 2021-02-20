<?php
include_once 'model.php';
include_once 'parts/header.php';
//createLog();
?>
<div class="container">
<?php
    if(isset($_GET['id'])):
        $postsArray=getPosts();
        $id=$_GET['id'];
        $title=$postsArray[$id]['title'];
        $content=$postsArray[$id]['content'];
        $date=$postsArray[$id]['date'];
        $imgPath=$postsArray[$id]['image'];
    ?>


        <h2><?= $title ?></h2>
        <p><?=$date ?></p>
        <div><img src="<?=$imgPath ?>" alt=""></div>
        <p><?= $content ?></p>
    <? else:?>
        <h1>Post not found</h1>
    <? endif; ?>
</div>
<?php include_once 'parts/footer.php';
