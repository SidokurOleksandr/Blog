<?php
include_once 'parts/header.php';
include_once 'model.php';

//createLog();

$title=trim($_POST['title']);
$content=trim($_POST['content']);
$err='';
$postsArray=getPosts();
$id=$_GET['id'];

        if($_SERVER['REQUEST_METHOD']=='POST' && isset($id)){
                if( isset($postsArray[$id]) && strlen($title)>0 && strlen($content)>0){
                    $postsArray[$id]['title']=$title;
                    $postsArray[$id]['content']=$content;
                    $file=$_FILES['file'];
                    if($file['name']===''){
                        $err = 'Choose file!';
                    }elseif($file['size']===0){
                        $err='File is too large';
                    }elseif(!preg_match('/.*\.jpg$/', $file['name'])){
                        $err= 'Only JPG';
                    }else{
                        $postsArray[$id]['image']='images/'.$file['name'];
                        copy($file['tmp_name'],'images/'.$file['name']);
                    }


                }else{
                    echo $_SERVER['REQUEST_METHOD'];
                    $err='Fill all the fields!';
                }
            //print_r($postsArray);
            savePosts($postsArray);
            //print_r($data);
        }elseif($_SERVER['REQUEST_METHOD']=='GET' && isset($id)  ){
            echo 'GET';
            $title = $postsArray[$id]['title'];
            $content =$postsArray[$id]['content'];
        }


        /*value="<?=$title?>"
         * <?= $content ?>
         * */
        ?>
    <form action="" class="postForm" method="post" enctype="multipart/form-data">
            <fieldset class="postForm__content">
                <legend>
                    Enter new post.
                </legend>
                <label>
                    <input type="text" name="title" value="<?= $title; ?>">
                </label>
                <label>
                    <textarea name="content" rows="7" ><?= $content; ?></textarea>
                </label>
                <input type="file" name="file">
                <button type="submit">Submit</button>
                <p><?= $err; ?></p>
            </fieldset>
        </form>
<? include_once 'parts/footer.php';
