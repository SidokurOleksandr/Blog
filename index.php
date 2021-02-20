<?php
include_once 'parts/header.php';
include_once 'model.php';
$error = '';
$title=trim($_POST['title']);
$content=trim($_POST['content']);

        if($_SERVER['REQUEST_METHOD'] =='POST' && strlen($title)>0 && strlen($content)){
            $file=$_FILES['file'];

            if($file['name']===''){
                $error = 'Choose file!';
            }elseif($file['size']===0){
                $error='File is too large';
            }elseif(!preg_match('/.*\.jpg$/', $file['name'])){
                $error= 'Only JPG';
            }else{
                copy($file['tmp_name'],'images/'.$file['name']);
            }

           addPost($title, $content, $file['name']);

        }elseif($_SERVER['REQUEST_METHOD'] =='POST' && (strlen($title)==0 || strlen($content)==0)){
            $error='Заповніть всі поля!';
        }
?>
    <div class="container">
        <form action="" class="postForm" method="post" enctype="multipart/form-data">
            <fieldset class="postForm__content">
                <legend>
                    Enter new post.
                </legend>
                <label>
                    <input type="text" name="title" >
                </label>
                <label>
                    <textarea name="content" rows="7"></textarea>
                </label>
                <input type="file" name="file">
                <button type="submit">Submit</button>
                <p><?= $error ?></p>
            </fieldset>
        </form>

        <?php
        $postsArray=getPosts();
        foreach($postsArray as $id=>$post):
            ?>

            <h2><?= $post['title'] ?></h2>
            <a href="posts.php?id=<?= $id ?>">Read more...</a>
            <a href="edit.php?id=<?= $id ?>">Edit</a>
            <a href="delete.php?id=<?= $id ?>">Delete</a>
            <hr>

        <? endforeach; ?>

    </div>

<?php include_once 'parts/footer.php';
