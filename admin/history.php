<?php
require_once '../core/init.php';
require_once './includes/header.php';
 $sql = "Select * from applications";
 $result = $db->query($sql);
 $data = $result->fetch_all(MYSQLI_ASSOC);
echo ($data[0]['applied_at']);
echo ($data[1]['applied_at']);
if($data[0]['applied_at'] > $data[1]['applied_at'])
{
    echo "greater";
}
else{
    echo "smaller";
}