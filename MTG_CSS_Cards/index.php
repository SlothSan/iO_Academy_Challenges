<?php
session_start();

?>

<html lang="en">
<head>
    <title>Testing 123</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>MTG Card Testing</h1>
    <form method="post">
        <label for="name">Card Title</label>
        <input type="text" name="title" value="Enter the card title...">
        <input type="submit" value="Create Card!">
    </form>
    <?php
    if(isset($_POST['title'])) {
        $cardTitle = $_POST['title'];
        createCard(checkCardTitle($cardTitle));
    }

    function checkCardTitle(string $cardTitle): array {
        $connectionString = 'mysql:host=db; dbname=mtg_cards';
        $dbUsername = 'root';
        $dbPassword = 'password';
        $db = new PDO ($connectionString, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $queryString = 'SELECT * FROM `cards` WHERE ' . "`title` LIKE '%{$cardTitle}%'";
        $query = $db->prepare($queryString); //"preparing the query" - not executed yet.
        $query->execute(); //Executes the query and stores all the results
        $result = $query->fetch();
        return $result;

    }

    function createCard($result) {
        echo "<div class=container>";
        if ($result['color'] === 'green') {
            echo "<div class='card-container-green'>";
        } else if ($result['color'] === 'blue') {
            echo "<div class='card-container-blue'>";
        } else if ($result['color'] === 'red') {
            echo "<div class='card-container-red'>";
        } else if ($result['color'] === 'black') {
            echo "<div class='card-container-black'>";
        } else if ($result['color'] === 'white') {
            echo "<div class='card-container-white'>";
        }
        echo "<div class='top-container'>";
        echo "<div class='card-title-container'>";
        echo "<p class='card-title'>" . $result['title'] . "</p>";
        echo "</div>";
        echo "<div class='mana-cost-container'>";
        echo "<div class='mana-cost'>";
        if ($result['genericCost'] != null) {
            echo "<img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='netural mana'>";
            echo "<p class='mana-neutral-cost'>" . $result['genericCost'] ."</p>";
        }
        echo '</div>';
        if($result['greenCost'] != null) {
            $counterGreen = $result['greenCost'];
            for ($counterGreen; $counterGreen > 0; $counterGreen--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_g.png" alt="green mana">';
            }
        }
        if($result['blackCost'] != null) {

        }
        if($result['blueCost'] != null) {

        }
        if($result['redCost'] != null) {

        }
        if($result['whiteCost'] != null) {

        }

        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    ?>
</body>
</html>
