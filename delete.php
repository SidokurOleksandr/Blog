<?php
include_once 'parts/header.php';
include_once 'model.php';
//createLog();
    if(isset($_GET['id'])){
        $postsArray= getPosts();
        foreach($postsArray as $id=>$post){
            if($id == $_GET['id']){
                unset($postsArray[$id]);
                echo 'Deleted successfully!';
            }
        }
        savePosts($postsArray);
    }
include_once 'parts/footer.php';
