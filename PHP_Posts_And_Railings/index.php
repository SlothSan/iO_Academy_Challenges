<?php
//Railing is 1.5M long
//post is 10cm and every Railing needs to be connected too 2 posts. 

echo '<p>Hello World</p>';

$railingLength = 1.5;
$postLength = 0.1;

echo "<p>$railingLength m is the length of a railing & $postLength m is the length of a post</p>";



function railingsAndPostsByLength(float $length, float $postLength = 0.1, float $railingLength = 1.5): array
{
    $testArray = [];
    $postCount = 1;
    $railingCount = 0;
    $length -= $postLength;
    do {
        $railingCount++;
        $postCount++;
        $length -= ($postLength + $railingLength);
    } while ($length > 0);
    $testArray['postCount'] = $postCount;
    $testArray['railingCount'] = $railingCount;
    return $testArray;
}

$testArray2 = railingsAndPostsByLength(17.00);
echo "<p>For the length you entered you will need:</p>";
echo "<p>You will need " . $testArray2['postCount'] . " posts.</p> <p>And you will need " . $testArray2['railingCount'] . " railings.";

function lengthByAmountOfPostsAndRailings(int $amountOfPosts, int $amountOfRailings, float $postLength = 0.1, float $railingLength = 1.5): float
{
    echo "<p>You inputed $amountOfPosts posts & $amountOfRailings railings";
    $length = 0.00;
    $amountOfPosts--;
    $length += $postLength; //Assume 1 post always
    do {
        $amountOfPosts--;
        $amountOfRailings--;
        $length += ($postLength + $railingLength);
    } while ($amountOfPosts > 0 && $amountOfRailings > 0); //This line is fucky
    return $length;
}
echo "<p> your fence will be " . lengthByAmountOfPostsAndRailings(12, 50) . "meters long </p>";
?>