<?php
include_once 'connector.php';

if (isset($_POST['editValues'])) {
    $updateFields = array("", "calories", "protein", "calcium", "iron", "vitaminA", "vitaminC", "carbs", "sodium", "sugar", "artSugar", "fat", "cost");

    for ($i = 1; $i <= 12; $i++) {
        $updateText = "UPDATE recommendedvals SET " . $updateFields[$i] . "=" . $_POST['field' . $i];
        $updateQuery = mysqli_query($conn, $updateText);
    }
}

$pullRecommededValsText = "SELECT * FROM recommendedvals WHERE valsID = 1";
$pullRecommededValsQuery = mysqli_query($conn, $pullRecommededValsText);
$recommendedVals = mysqli_fetch_array($pullRecommededValsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>Item Editor - Food4Kids Organizer - Waterloo Region</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/favicon.png">

    <link href="../styles/theme.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <div class="menu-padding">
            <nav>
                <div class="logo"><a href="https://www.food4kidswr.ca/"><img src="../images/food4Kids.webp"></a></div>
                <ul class="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../pages/calculator.php">Menu Creator</li>
                    <li><a href="../pages/selector.php">Item Editor</a></li>
                    <li><a href="../pages/menu.php">Menu Display</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="data1">
            <h1>Recommended Values</h1>
            <h2>Edit Values</h2>
            <form method="post" class="nutri">
                <div class="flex">
                    <div class="display-table">
                        <table>
                            <tr>
                                <th>Calories (#)</th>
                                <th>Protein (g)</th>
                                <th>Calcium (%)</th>
                                <th>Iron (%)</th>
                                <th>Vitamin A (%)</th>
                                <th>Vitamin C (%)</th>
                                <th>Carbs (g)</th>
                                <th>Sodium (mg)</th>
                                <th>Natural Sugar (g)</th>
                                <th>Artificial Sugar (g)</th>
                                <th>Fat (g)</th>
                                <th>Cost (CAD)</th>
                            </tr>
                            <tr>
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    if ($i >= 3 && $i <= 6) echo '<td><input type="text" id="nutrition" onkeydown="return false" name="field' . $i . '" value="' . $recommendedVals[$i] . '"></td>';
                                    else echo '<td><input type="text" id="nutrition" name="field' . $i . '" value="' . $recommendedVals[$i] . '"></td>';
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <section class="submission2">
                    <form method="post" action="./recommendedValueEditor.php">
                        <input type="submit" value="Update" class="button" name="editValues">
                    </form>
                </section>
            </form>
        </div>
    </main>

    <footer>
        <div class="social">
            <a href="https://www.instagram.com/food4kidswaterlooregion/"><img src="https://cdn2.iconfinder.com/data/icons/social-media-applications/64/social_media_applications_3-instagram-128.png"></a>
            <a href="https://twitter.com/food4kidswr"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Twitter3_colored_svg-128.png"></a>
            <a href="https://www.facebook.com/f4kwr/"><img src="https://cdn2.iconfinder.com/data/icons/social-media-applications/64/social_media_applications_1-facebook-128.png"></a>
        </div>
        <div class="info">
            <p class="copyright">Copyright © 2021 "Our Name". All rights reserved.</p>
            <p class="location">Food4Kids Waterloo Region | 10 Washburn Dr., Unit 4, Kitchener, ON N2R1S2</p>
            <p class="contacts">Phone: 519 576 3443 | Email: ksoberle@food4kidswr.ca</p>
        </div>
    </footer>
</body>

</html>