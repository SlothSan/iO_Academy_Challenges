<?php
//Railing is 1.5M long
//post is 10cm and every Railing needs to be connected too 2 posts. 

function fenceLength(float $length) {
    $railing = 150;
    $post = 10;
    $railPostArray = [];
    $postCount = 1;
    $railingCount = 0;
    $length -= $post;
    do {
        $length - ($railing + $post);
        $postCount++;
        $railingCount++;
    } while ($length > 0);

    $railPostArray[] = $railingCount;
    $railPostArray[] = $postCount;

    print_r($railPostArray);
}

echo fenceLength(1000);

?>