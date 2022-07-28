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
            $counterBlack = $result['blackCost'];
            for ($counterBlack; $counterBlack > 0; $counterBlack--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_b.png" alt="black mana">';
            }
        }
        if($result['blueCost'] != null) {
            $counterBlue = $result['blueCost'];
            for ($counterBlue; $counterBlue > 0; $counterBlue--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_u.png" alt="blue mana">';
            }
        }
        if($result['redCost'] != null) {
            $counterRed = $result['redCost'];
            for ($counterRed; $counterRed > 0; $counterRed--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_r.png" alt="red mana">';
            }
        }
        if($result['whiteCost'] != null) {
            $counterWhite = $result['whiteCost'];
            for ($counterWhite; $counterWhite > 0; $counterWhite--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_w.png" alt="white mana">';
            }
        }

        echo "</div>";
        echo "</div>";//End of top-container !
        echo "<div class='card-art-container'>";
                    echo "<img class='card-art' src='./imgs/cardArt/" . $result['cardArt'] . "'" . " >";
        echo "</div>"; //end of card art
        echo "<div class='card-type-container'>"; //Start of card type container
                    echo "<div class='card-type-title-container'>";
                        echo "<p class='card-type'>" . $result['cardType'] . "</p>";
                    echo "</div>";
                    echo "<div class='card-type-setLogo-container'>";
                        if($result['setLogo'] === 'common') {
                            echo "<img class='card-set-logo' src='./imgs/M15_setIcons/m15_setIcon_common.jpeg' alt='common'>";
                        }
                        if($result['setLogo'] === 'uncommon') {
                            echo "<img class='card-set-logo' src='./imgs/M15_setIcons/m15_setIcon_uncommon.jpeg' alt='common'>";
                        }
                        if($result['setLogo'] === 'rare') {
                            echo "<img class='card-set-logo' src='./imgs/M15_setIcons/m15_setIcon_rare.jpeg' alt='common'>";
                        }
                        if($result['setLogo'] === 'mythicRare') {
                            echo "<img class='card-set-logo' src='./imgs/M15_setIcons/m15_setIcon_mythicRare.jpeg' alt='common'>";
                        }
                   echo "</div>";
        echo"</div>"; //End of card type container
        echo "</div>";
        echo "</div>";

        echo "</div>";
        echo "</div>";
    }

    ?>
</body>
</html>
