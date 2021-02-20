<table>
    <tr>
        <th>Час</th>
        <th>IP</th>
        <th>URI</th>
        <th>Referer</th>
    </tr>
    <?php
        $file_id=$_GET['id'];
        $log_files=scandir('logs');
        if(array_search($log_files[$file_id],$log_files)!=='FALSE'):
            $file_array= file('logs/'.$log_files[$file_id]);
            foreach($file_array as $id=>$log):
                $log_array=explode('-|-', $log);
    ?>
                <tr>
                    <td><?= $log_array[0]; ?></td>
                    <td><?= $log_array[1]; ?></td>
                    <td><?= $log_array[2]; ?></td>
                    <td><?= $log_array[3]; ?></td>
                </tr>
    <?      endforeach;
        endif; ?>
</table>


