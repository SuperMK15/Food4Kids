<?php
include_once 'connector.php';
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
      <h2>Add Item</h2>
      <form method="post" action="../pages/dbEditor.php" class="nutri">
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
                <th>Artifical Sugar (g)</th>
                <th>Fat (g)</th>
                <th>Stock</th>
                <th>Cost (CAD)</th>
              </tr>
              <tr>
                <td><input type="text" id="identifier" name="identifier" value="Name"></td>
                <td><input type="text" id="calories" name="calories" value="0"></td>
                <td><input type="text" id="protein" name="protein" value="0"></td>
                <td><input type="text" id="calcium" name="calcium" value="0"></td>
                <td><input type="text" id="iron" name="iron" value="0"></td>
                <td><input type="text" id="vitamina" name="vitamina" value="0"></td>
                <td><input type="text" id="vitaminc" name="vitaminc" value="0"></td>
                <td><input type="text" id="carbs" name="carbs" value="0"></td>
                <td><input type="text" id="sodium" name="sodium" value="0"></td>
                <td><input type="text" id="sugar" name="sugar" value="0"></td>
                <td><input type="text" id="sugar" name="artsugar" value="0"></td>
                <td><input type="text" id="fat" name="fat" value="0"></td>
                <td><input type="text" id="stock" name="stock" value="0"></td>
                <td><input type="text" id="cost" name="cost" value="0"></td>
              </tr>
            </table>
          </div>
        </div>
        <section class="attribute-type">
          <input type="checkbox" name="nut-free" id="nut-free">
          <label for="nut-free">Nut-Free</label>
          <input type="checkbox" name="vegetarian" id="vegetarian">
          <label for="vegetarian">Vegetarian</label>
          <input type="checkbox" name="halal" id="halal">
          <label for="halal">Halal</label>
          <input type="checkbox" name="baby" id="baby">
          <label for="baby">Baby</label>
        </section>
        <section class="submission2">
          <input type="submit" value="Update" class="button" id="update" name="update">
          <?php
          $tempName = "";
          if (isset($_POST['update'])) {
            if (str_contains($_POST['identifier'], "'") || str_contains($_POST['identifier'], "\"")) {
              echo "<h3>Error: The Symbols ' and \" are not Allowed in Item Names!</h3>";
            } else {
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

              $checkForRepeat = "SELECT itemID FROM items WHERE identifier='" . $_POST['identifier'] . "'";
              $repeatQuery = mysqli_query($conn, $checkForRepeat);

              if (mysqli_num_rows($repeatQuery) == 0) {
                $addTo = "INSERT INTO items (identifier, calories, protein, calcium, iron, vitaminA, vitaminC, carbohydrates, sodium, sugar, artSugar, fat, containsNuts, isVegetarian, isHalal, isBaby, price, stock) VALUES ('" . $_POST['identifier'] . "', " . $_POST['calories'] . ", " . $_POST['protein'] . ", " . $_POST['calcium'] . ", " . $_POST['iron'] . ", " . $_POST['vitamina'] . ", " . $_POST['vitaminc'] . ", " . $_POST['carbs'] . ", " . $_POST['sodium'] . ", " . $_POST['sugar'] . ", " . $_POST['artsugar'] . ", " . $_POST['fat'] . ", $isNutFree, $isVeg, $isHalal, $isBaby, " . $_POST['cost'] . ", " . $_POST['stock'] . ")";
                $result = mysqli_query($conn, $addTo);
              } else {
                echo "<h3> </h3><br>";
                echo "<h3>Error: The item name \"" . $_POST['identifier'] . "\" is already in use!</h3>";
              }
            }
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