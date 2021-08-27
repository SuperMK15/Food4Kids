<?php
include_once 'connector.php';
if (isset($_POST['edit'])) {
  $editSelect = "SELECT * FROM items WHERE identifier='" . $_POST['hiddenText'] . "'";
  $editQuery = mysqli_query($conn, $editSelect);
}

$triedToHack = false;
$failedEntry = false;
if (isset($_POST['editSubmit'])) {
  if (str_contains($_POST['updateIdentifier'], "'") || str_contains($_POST['updateIdentifier'], "\"")) {
    $triedToHack = true;
    $editSelect = "SELECT * FROM items WHERE identifier='" . $_POST['failedEditText'] . "'";
    $editQuery = mysqli_query($conn, $editSelect);
  } else {
    $checkForRepeat = "SELECT * FROM items WHERE identifier='" . $_POST['updateIdentifier'] . "'";
    $repeatQuery = mysqli_query($conn, $checkForRepeat);
    $repeatQueryVal = mysqli_fetch_assoc($repeatQuery);

    if (mysqli_num_rows($repeatQuery) >= 1 && $repeatQueryVal['itemID'] != $_POST['itemID']) {
      $editSelect = "SELECT * FROM items WHERE identifier='" . $_POST['failedEditText'] . "'";
      $editQuery = mysqli_query($conn, $editSelect);
      $failedEntry = true;
      $failedEntryName = $_POST['failedEditText'];
    } else {
      $uIdentifier = $_POST['updateIdentifier'];
      $ucalories = $_POST['calories'];
      $uprotein = $_POST['protein'];
      $ucalcium = $_POST['calcium'];
      $uiron = $_POST['iron'];
      $uvitaminA = $_POST['vitamina'];
      $uvitaminC = $_POST['vitaminc'];
      $ucarbohydrates = $_POST['carbs'];
      $usodium = $_POST['sodium'];
      $usugar = $_POST['sugar'];
      $uartsugar = $_POST['artSugar'];
      $ufat = $_POST['fat'];
      $ucalories = $_POST['calories'];
      $ustock = $_POST['stock'];
      $ucost = $_POST['cost'];
      $uID = $_POST['itemID'];

      $isNutFree = 0;
      $isVeg = 0;
      $isHalal = 0;
      $isBaby = 0;
      if (isset($_POST['nut-free'])) {
        $isNutFree = 1;
      }
      if (isset($_POST['halal'])) {
        $isHalal = 1;
      }
      if (isset($_POST['vegetarian'])) {
        $isVeg = 1;
      }
      if (isset($_POST['baby'])) {
        $isBaby = 1;
      }
      $updateSelect = "UPDATE items SET identifier='$uIdentifier', calories=$ucalories, protein=$uprotein, calcium=$ucalcium, iron=$uiron, vitaminA=$uvitaminA, vitaminC=$uvitaminC, sodium=$usodium, sugar=$usugar, artSugar=$uartsugar, fat=$ufat, calories=$ucalories, stock=$ustock, price=$ucost, containsNuts=$isNutFree, isVegetarian=$isVeg, isHalal=$isHalal, isBaby=$isBaby WHERE itemID = $uID";
      $updateQuery = mysqli_query($conn, $updateSelect);

      header("Location: ./selector.php");
      exit();
    }
  }
}
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
      <h1>Item Editor</h1>
      <h2>Edit Item</h2>
      <!--<form method="post" action="../pages/selector.php" class="nutri">-->
      <form method="post" class="nutri">
        <div class="flex">
          <div class="display-table">
            <table>
              <tr>
                <th>Item</th>
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
                <th>Stock (#)</th>
                <th>Cost (CAD)</th>
              </tr>
              <tr>
                <?php
                if (mysqli_num_rows($editQuery) != 0) {
                  $counter = 0;
                  while ($editRow = mysqli_fetch_assoc($editQuery)) {
                    echo '<td><input type="text" id="nutrition" name="updateIdentifier" value="' . $editRow['identifier'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="calories" value="' . $editRow['calories'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="protein" value="' . $editRow['protein'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="calcium" value="' . $editRow['calcium'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="iron" value="' . $editRow['iron'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="vitamina" value="' . $editRow['vitaminA'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="vitaminc" value="' . $editRow['vitaminC'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="carbs" value="' . $editRow['carbohydrates'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="sodium" value="' . $editRow['sodium'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="sugar" value="' . $editRow['sugar'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="artSugar" value="' . $editRow['artSugar'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="fat" value="' . $editRow['fat'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="stock" value="' . $editRow['stock'] . '"></td>';
                    echo '<td><input type="text" id="nutrition" name="cost" value="' . $editRow['price'] . '"></td>';
                    echo '<input type="hidden" id="nutrition" name="itemID" value=' . $editRow['itemID'] . '>';
                  }
                }
                ?>
              </tr>
            </table>
          </div>
        </div>
        <section class="attribute-type">
          <?php
          if ($failedEntry || $triedToHack) {
            $editSelect = "SELECT * FROM items WHERE identifier='" . $_POST['failedEditText'] . "'";
            $editQuery = mysqli_query($conn, $editSelect);
            $editRow = mysqli_fetch_assoc($editQuery);
          } else if (!$triedToHack) {
            $editSelect = "SELECT * FROM items WHERE identifier='" . $_POST['hiddenText'] . "'";
            $editQuery = mysqli_query($conn, $editSelect);
            $editRow = mysqli_fetch_assoc($editQuery);
          }

          if ($editRow['containsNuts'] == 1) {
            echo '<input type="checkbox" name="nut-free" id="nut-free" checked>';
            echo '<label for="nut-free"> Nut-Free </label>';
          } else {
            echo '<input type="checkbox" name="nut-free" id="nut-free">';
            echo '<label for="nut-free"> Nut-Free </label>';
          }
          if ($editRow['isVegetarian'] == 1) {
            echo '<input type="checkbox" name="vegetarian" id="vegetarian" checked>';
            echo '<label for="vegetarian"> Vegetarian </label>';
          } else {
            echo '<input type="checkbox" name="vegetarian" id="vegetarian">';
            echo '<label for="vegetarian"> Vegetarian </label>';
          }
          if ($editRow['isHalal'] == 1) {
            echo '<input type="checkbox" name="halal" id="halal" checked>';
            echo '<label for="halal"> Halal </label>';
          } else {
            echo '<input type="checkbox" name="halal" id="halal">';
            echo '<label for="halal"> Halal </label>';
          }
          if ($editRow['isBaby'] == 1) {
            echo '<input type="checkbox" name="baby" id="Baby" checked>';
            echo '<label for="Baby"> Baby </label>';
          } else {
            echo '<input type="checkbox" name="baby" id="Baby">';
            echo '<label for="Baby"> Baby </label>';
          }

          ?>
        </section>
        <section class="submission2">
          <input type="submit" value="Update" class="button" name="editSubmit">
          <?php
          if ($failedEntry) {
            echo "<h3> </h3><br>";
            echo "<h3>Error: The item name \"" . $_POST['updateIdentifier'] . "\" is already in use!</h3>";
          }

          if ($triedToHack) {
            echo "<h3>Error: The Symbols ' and \" are not Allowed in Item Names!</h3>";
          } else {
            echo '<input type="hidden" value="' . $editRow['identifier'] . '" class="button" id="failedEdit" name="failedEditText">';
          }
          ?>
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