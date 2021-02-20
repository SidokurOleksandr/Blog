<?php
    const POSTS_FILE='db/posts.json';

    function getPosts(): array{
         $str = file_get_contents(POSTS_FILE);
        return json_decode($str, true);
    }

    function savePosts(array $posts): bool{
        $str = json_encode($posts);
        file_put_contents(POSTS_FILE, $str);
        return true;
    }

    function addPost(string $title, string $content, ?string $image){
        $date=date("d-m-Y H:i:s");
        $newPost=['title'=> $title,'date'=>$date,'content'=>$content, 'image'=>'images/'.$image];
        $filePosts = getPosts();
        array_push($filePosts, $newPost );
        savePosts($filePosts);
    }

function createLog(){
    $date= date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    $uri = $_SERVER['REQUEST_URI'];
    $referer= $_SERVER['HTTP_REFERER'];

    $record=implode('-|-',[$date, $ip, $uri, $referer]);
    $logFile=fopen('logs/'.date('Y-m-d').'.txt', 'a');
    fwrite($logFile, $record."\n");
    fclose($logFile);
}
