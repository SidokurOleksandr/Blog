<?php include_once 'parts/header.php'; ?>
<div class="container">
    <h2>Log files</h2>
    <ul>
        <?php
        $file_list= scandir('logs');
        foreach($file_list as $id=>$file):
            $log_path='logs/'.$file;
            if(is_file($log_path)):
                ?>
        <li><a href="log.php?id=<?= $id;?>"><?= $file; ?></a></li>
        <?
            endif;
        endforeach;
        ?>
    </ul>

</div>

