<?php
  include_once 'connector.php';
  if (isset($_POST['menuSearch'])) {
    $sql = "SELECT * FROM menus WHERE menuName LIKE '%" . $_POST['menuSearch'] . "%'";
  }
  if (isset($_POST['delete'])) {
    $deleteSql = "DELETE FROM menus WHERE menuName='" . $_POST['hiddenText'] . "'";
    $deleteResult = mysqli_query($conn, $deleteSql);
  }
  /*if (isset($_POST['editSubmit'])) {
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
    $updateSelect = "UPDATE items SET identifier='$uIdentifier', calories=$ucalories, protein=$uprotein, calcium=$ucalcium, iron=$uiron, vitaminA=$uvitaminA, vitaminC=$uvitaminC, sodium=$usodium, sugar=$usugar, fat=$ufat, calories=$ucalories, stock=$ustock, price=$ucost, containsNuts=$isNutFree, isVegetarian=$isVeg, isHalal=$isHalal, isBaby=$isBaby WHERE itemID = $uID";
    $updateQuery = mysqli_query($conn, $updateSelect);
  }*/
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
          <li><a href="../pages/menuSelector.php">Menu Creator</li>
          <li><a href="../pages/selector.php">Item Editor</a></li>
          <li><a href="../pages/menu.php">Menu Display</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="content">
      <div class="data1">
        <h1>Item Editor</h1>
        <div class="flex">
          <form method="post" action="../pages/addMenu.php">
            <section class="submission-addNew">
              <input type="submit" value="Add New" class="button" action="../pages/addMenu.php">
            </section>
          </form>
          <form method="post" action="">
            <div class="search-bar">
              <input list="foods" id="menuSearch" name="menuSearch" placeholder="Search here">
            </div>
          </form>
        </div>
        <div class="flex">
          <table class="searching">
            <?php
            if (!isset($_POST['menuSearch'])) {
              $sqlAll = "SELECT * FROM menus";
              $sqlQuery = mysqli_query($conn, $sqlAll);
              while ($row = mysqli_fetch_assoc($sqlQuery)) {
                echo "<tr>";
                echo "<td class='item'>" . $row['menuName'] . "</td>";
                echo "<td>";
                echo "<section class='submission-edit'>";
                echo "<form method='post' action='../pages/menuEditor.php'>";
                echo '<input type="hidden" value="' . $row['menuName'] . '" class="button" id="delete" name="hiddenText">';
                echo "<input type='submit' value='Edit' class='button' id='edit' name='edit'>";
                echo "</form>";
                echo "</section>";
                echo "</td>";
                echo "<td>";
                echo "<section class='submission-delete'>";
                echo '<form method="post">';
                echo '<input type="hidden" value="' . $row['menuName'] . '" class="button" id="delete" name="hiddenText">';
                echo '<input type="submit" value="Delete" class="button" id="delete" name="delete" onclick="confirmFunction()">';
                echo "</form>";
                echo "</section>";
                echo "</td>";
                echo "</tr>";
              }
            }
            if (isset($_POST['menuSearch'])) {
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) == 0) {
                echo "<tr>";
                echo "<td>No results found</td>";
                echo "</tr>";
              } else {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td class='item'>" . $row['menuName'] . "</td>";
                  echo "<td>";
                  echo "<section class='submission-edit'>";
                  echo "<form method='post' action='../pages/menuEditor.php'>";
                  echo '<input type="hidden" value="' . $row['menuName'] . '" class="button" id="delete" name="hiddenText">';
                  echo "<input type='submit' value='Edit' class='button' id='edit' name='edit'>";
                  echo "</form>";
                  echo "</section>";
                  echo "</td>";
                  echo "<td>";
                  echo "<section class='submission-delete'>";
                  echo '<form method="post">';
                  echo '<input type="hidden" value="' . $row['menuName'] . '" class="button" id="delete" name="hiddenText">';
                  echo '<input type="submit" value="Delete" class="button" id="delete" name="delete">';
                  echo "</form>";
                  echo "</section>";
                  echo "</td>";
                  echo "</tr>";
                }
              }
            }
            ?>
          </table>
        </div>
      </div>
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

  <script src="../scripts/confirm.js"></script>
</body>

</main>
