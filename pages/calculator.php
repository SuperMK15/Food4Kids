<?php
include_once 'connector.php';
$pullingMenuCode = "";
$menuNumber = 0;
$amountNeeded = 0;
if (isset($_POST['stockSubmit'])) {
  $selectMenu = "SELECT * FROM menus WHERE basketID =" . $_POST['menuNumber'];
  $selectQuery = mysqli_query($conn, $selectMenu);
  $selectResult = mysqli_fetch_assoc($selectQuery);
  for ($x = 1; $x <= 25; $x++) {
    $stockSelect = "SELECT * FROM items WHERE itemID =" . $selectResult['itemID' . $x];
    $stockQuery = mysqli_query($conn, $stockSelect);
    if (mysqli_num_rows($stockQuery) != 0) {
      $stockRow = mysqli_fetch_assoc($stockQuery);
      $currentStock = $stockRow['stock'];
      $newStock = intval($currentStock) - intval($_POST['amountNeeded']);
      if ($newStock < 0) {
        $newStock = 0;
      }
      $stockSelect = "UPDATE items SET stock = $newStock WHERE itemID =" . $stockRow['itemID'];
      $stockQueryUpdate = mysqli_query($conn, $stockSelect);
    }
  }
}
$menuName = "";
if (isset($_POST['menu-type-num-submit'])) {
  //basket1 is noRestrictions
  //basket2 is halal
  //basket3 is veg
  //basket4 is baby
  //basket5 is other
  if (isset($_POST['menu'])) {
    $findID = "SELECT * FROM menus WHERE menuName='" . $_POST['menu'] . "'";
    $findIDQuery = mysqli_query($conn, $findID);
    $findIDrow = mysqli_fetch_assoc($findIDQuery);
    $menuNumber = $findIDrow['basketID'];
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = $menuNumber";
    $menuName = $_POST['menu'];
  }
  /*if (isset($_POST['no-restrictions'])) {
    $menuNumber = 1;
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = 1";
  } elseif (isset($_POST['halal'])) {
    $menuNumber = 2;
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = 2";
  } elseif (isset($_POST['vegetarian'])) {
    $menuNumber = 3;
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = 3";
  } elseif (isset($_POST['baby'])) {
    $menuNumber = 4;
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = 4";
  } else {
    $menuNumber = 5;
    $pullingMenuCode = "SELECT * FROM menus WHERE basketID = 5";
  }*/
  if (isset($_POST['bagNum'])) {
    $amountNeeded = $_POST['bagNum'];
  }
}
if (isset($_POST['item1']) and isset($_POST['calSubmit'])) {
  $sqlCal = "SELECT * FROM items WHERE identifier ='" . $_POST['item1'] . "'";
  $resultCal = mysqli_query($conn, $sqlCal);
}
$tCalories = 0;
$tProtein = 0;
$tCalcium = 0;
$tIron = 0;
$tvitaminA = 0;
$tvitaminC = 0;
$tCarbohydrates = 0;
$tSodium = 0;
$tSugar = 0;
$tArtSugar = 0;
$tFat = 0;
$tPrice = 0.00;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <title>Menu Creator - Food4Kids Organizer - Waterloo Region</title>
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
    <div class="calc1">
      <h1>Menu Creator</h1>
      <div class="flex">
        <div class="selection-form">
          <form method="post" action="../pages/calculator.php">
            <section class="menu-type">
              <datalist id="menus">
                <?php 
                  if (!isset($_POST['menu'])) {
                    $sql = "SELECT * FROM menus WHERE menuName LIKE '%" . $_POST['menu'] . "%'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['menuName'] . "'></option>";
                        $counter++;
                      }
                    }
                  }
                ?>
              </datalist>
              <input list="menus" id="menu" name="menu" placeholder="Select menu">
            </section>
            <input list="rando" id="food" name="bagNum" placeholder="Enter number of bags">
            <section class="submission">
              <input type="submit" value="Open" class="button" name="menu-type-num-submit">
            </section>
          </form>
          <div class="select-menu">
            <?php
            if ($menuName != "") {
              echo "<p>" . $menuName . "</p>";
            }
            /*switch ($menuNumber) {
              case 1:
                echo "<p>No Restrictions Menu</p>";
                break;
              case 2:
                echo "<p>Halal Menu</p>";
                break;
              case 3:
                echo "<p>Vegetarian Menu</p>";
                break;
              case 4:
                echo "<p>Baby Menu</p>";
                break;
              case 5:
                echo "<p>Other Menu</p>";
                break;
              default:
                echo "<p>Please Select a Menu</p>";
                break;
            }*/
            ?>
          </div>
          <ul>
            <form method="post" action="../pages/calculator.php">
              <datalist id="foods">
                <?php
                if (!isset($_POST['item1'])) {
                  $sql = "SELECT * FROM items WHERE identifier LIKE '%" . $_POST['item1'] . "%'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['identifier'] . "'></option>";
                      $counter++;
                    }
                  }
                }
                ?>
              </datalist>
              <?php
              echo "<input type='hidden' name='basketNum' value='" . $menuNumber . "'>";
              if ($pullingMenuCode != "") {
                $pullingMenuQuery = mysqli_query($conn, $pullingMenuCode);
                $row = mysqli_fetch_assoc($pullingMenuQuery);
                for ($x = 1; $x <= 25; $x++) {
                  echo "<li>";
                  $itemIdentifier = null;
                  if ($row['itemID' . $x] != 0) {
                    $mitemID = $row['itemID' . $x];
                    $itemQuery = "SELECT * FROM items WHERE itemID = $mitemID";
                    $itemResult = mysqli_query($conn, $itemQuery);
                    if (mysqli_num_rows($itemResult) != 0) {
                      $itemRow = mysqli_fetch_assoc($itemResult);
                      $itemIdentifier = $itemRow['identifier'];
                    }
                  }
                  echo '<input list="foods" id="food" name="item' . $x . '" placeholder="Select item" value="' . $itemIdentifier . '">';
                  echo "</li>";
                }
                echo '<section class="submission">';
                echo '<input type="submit" value="Update" class="button" name="calSubmit">';
                echo '</section>';
              }
              ?>
            </form>
            <?php
            if (isset($_POST['calSubmit'])) {
              for ($x = 1; $x <= 25; $x++) {
                $convertTextToID = "SELECT itemID FROM items WHERE identifier='" . $_POST['item' . $x] . "'";
                $convertQuery = mysqli_query($conn, $convertTextToID);
                if (mysqli_num_rows($convertQuery) != 0) {
                  $convertRow = mysqli_fetch_assoc($convertQuery);
                  $id = $convertRow['itemID'];
                  $updateSelect = "UPDATE menus SET itemID" . $x . " = $id WHERE basketID = " . $_POST['basketNum'];
                  $updateQuery = mysqli_query($conn, $updateSelect);
                } else {
                  $updateSelect = "UPDATE menus SET itemID" . $x . " = 0 WHERE basketID = " . $_POST['basketNum'];
                  $updateQuery = mysqli_query($conn, $updateSelect);
                }
              }
            }
            ?>
            <?php
            if ($menuNumber != 0) {
              echo '<form method="post" action="../pages/calculator.php">';
              echo '<section class="submission">';
              echo '<input type="hidden" name="menuNumber" value="' . $menuNumber . '" >';
              echo '<input type="hidden" name="amountNeeded" value="' . $amountNeeded . '" >';
              echo '<input type="submit" value="Clear Stock" class="button" name="stockSubmit">';
              echo '</section>';
              echo '</form>';
            }
            ?>
          </ul>
        </div>
        <div class="calc-table">
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
              <th>Cost (CAD)</th>
              <th>Amount Needed</th>
            </tr>
            <?php
            if ($pullingMenuCode == "") {
              echo "<tr>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "<td>Empty</td>";
              echo "</tr>";
            } else {
              $pullingMenuQuery = mysqli_query($conn, $pullingMenuCode);
              $row = mysqli_fetch_assoc($pullingMenuQuery);
              for ($x = 1; $x <= 25; $x++) {
                if ($row['itemID' . $x] != 0) {
                  $mitemID = $row['itemID' . $x];
                  $itemQuery = "SELECT * FROM items WHERE itemID = $mitemID";
                  $itemResult = mysqli_query($conn, $itemQuery);
                  if (mysqli_num_rows($itemResult) != 0) {
                    $itemRow = mysqli_fetch_assoc($itemResult);
                    echo "<tr>";
                    echo "<td>" . $itemRow['identifier'] . "</td>";
                    echo "<td>" . $itemRow['calories'] . "</td>";
                    echo "<td>" . $itemRow['protein'] . "</td>";
                    echo "<td>" . $itemRow['calcium'] . "</td>";
                    echo "<td>" . $itemRow['iron'] . "</td>";
                    echo "<td>" . $itemRow['vitaminA'] . "</td>";
                    echo "<td>" . $itemRow['vitaminC'] . "</td>";
                    echo "<td>" . $itemRow['carbohydrates'] . "</td>";
                    echo "<td>" . $itemRow['sodium'] . "</td>";
                    echo "<td>" . $itemRow['sugar'] . "</td>";
                    echo "<td>" . $itemRow['artSugar'] . "</td>";
                    echo "<td>" . $itemRow['fat'] . "</td>";
                    echo "<td>" . floatval($itemRow['price']) . "</td>";
                    $stockNeeded = intval($amountNeeded) - intval($itemRow['stock']);
                    if ($stockNeeded > 0) {
                      echo "<td>" . $stockNeeded . "</td>";
                    } else {
                      echo "<td>None</td>";
                    }
                    $tCalories = $tCalories + $itemRow['calories'];
                    $tProtein = $tProtein + $itemRow['protein'];
                    $tCalcium = $tCalcium + $itemRow['calcium'];
                    $tIron = $tIron + $itemRow['iron'];
                    $tvitaminA = $tvitaminA + $itemRow['vitaminA'];
                    $tvitaminC = $tvitaminC + $itemRow['vitaminC'];
                    $tCarbohydrates = $tCarbohydrates + $itemRow['carbohydrates'];
                    $tSodium = $tSodium + $itemRow['sodium'];
                    $tSugar = $tSugar + $itemRow['sugar'];
                    $tArtSugar = $tArtSugar + $itemRow['artSugar'];
                    $tFat = $tFat + $itemRow['fat'];
                    $tPrice = $tPrice + $itemRow['price'];
                    echo "</tr>";
                  }
                }
              }
            }
            ?>
            <tr>
              <th>Total</th>
              <?php
              echo "<th>$tCalories</th>";
              echo "<th>$tProtein</th>";
              echo "<th>$tCalcium</th>";
              echo "<th>$tIron</th>";
              echo "<th>$tvitaminA</th>";
              echo "<th>$tvitaminC</th>";
              echo "<th>$tCarbohydrates</th>";
              echo "<th>$tSodium</th>";
              echo "<th>$tSugar</th>";
              echo "<th>$tArtSugar</th>";
              echo "<th>$tFat</th>";
              echo "<th>$tPrice</th>";
              echo "<th></th>";
              ?>
            </tr>
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
</body>

</html>
