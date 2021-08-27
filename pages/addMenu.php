<?php
include_once 'connector.php';

$leftBlank = false;
$repeatedName = false;

if (isset($_POST['addSubmit'])) {
  $checkForRepeatText = "SELECT basketID FROM menus WHERE menuName='" . $_POST['newMenuName'] . "'";
  $checkForRepeatQuery = mysqli_query($conn, $checkForRepeatText);

  if (mysqli_num_rows($checkForRepeatQuery) != 0 || strlen(trim($_POST['newMenuName'])) == 0) {
    if (mysqli_num_rows($checkForRepeatQuery) != 0) {
      $repeatedName = true;
      $repeatedNameDisplay = $_POST['newMenuName'];
    } else if (strlen(trim($_POST['newMenuName'])) == 0) {
      $leftBlank = true;
    }

    $items = array_fill(0, 30, "");
    for ($i = 1; $i <= 25; $i++) {
      $items[$i] = $_POST["item" . $i];
    }
  } else {
    $addingMenuText = "INSERT INTO menus (menuName) VALUES ('" . $_POST['newMenuName'] . "')";
    $addingMenuQuery = mysqli_query($conn, $addingMenuText);
    for ($x = 1; $x <= 25; $x++) {
      $convertTextToID = "SELECT itemID FROM items WHERE identifier='" . $_POST['item' . $x] . "'";
      $convertQuery = mysqli_query($conn, $convertTextToID);
      if (mysqli_num_rows($convertQuery) != 0) {
        $convertRow = mysqli_fetch_assoc($convertQuery);
        $id = $convertRow['itemID'];
        $updateSelect = "UPDATE menus SET itemID" . $x . " = $id WHERE menuName = '" . $_POST['newMenuName'] . "'";
        $updateQuery = mysqli_query($conn, $updateSelect);
      } else {
        $updateSelect = "UPDATE menus SET itemID" . $x . " = 0 WHERE menuName = '" . $_POST['newMenuName'] . "'";
        $updateQuery = mysqli_query($conn, $updateSelect);
      }
    }
    header("Location: ./calculator.php");
    exit();
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
      <h1>Add Menu</h1>
      <div class="flex">
        <div class="selection-form">
          <div class="select-menu">
            <form method="post">
              <p>Type Menu Name:</p>
              <?php
              if($repeatedName) {
                echo '<input type="text" id="food" name="newMenuName" value="' . $repeatedNameDisplay . '" autocomplete="off">';
              } 
              else {
                echo '<input type="text" id="food" name="newMenuName" placeholder="Menu Name" autocomplete="off">';
              }
              if ($leftBlank) {
                echo "<h5>Error: Please Do Not Leave Menu Name Blank!</h5>";
              } else if ($repeatedName) {
                echo "<h5>Error: The Name \"" . $repeatedNameDisplay . "\" Has Already Been Used!</h5>";
              }
              ?>
              <p>Items</p>
          </div>
          <ul>
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
            if ($repeatedName || $leftBlank) {
              for ($x = 1; $x <= 25; $x++) {
                echo "<li>";
                echo '<input list="foods" id="food" name="item' . $x . '" placeholder="Select item" value="' . $items[$x] . '">';
                echo "</li>";
              }
              echo '<section class="submission4">';
              echo '<input type="submit" value="Add" class="button" name="addSubmit">';
              echo '</section>';
            } else {
              for ($x = 1; $x <= 25; $x++) {
                echo "<li>";
                $itemIdentifier = null;
                echo '<input list="foods" id="food" name="item' . $x . '" placeholder="Select item" value="' . $itemIdentifier . '">';
                echo "</li>";
              }
              echo '<section class="submission4">';
              echo '<input type="submit" value="Add" class="button" name="addSubmit">';
              echo '</section>';
            }
            ?>
            </form>
          </ul>
        </div>
        <div class="calc-table">
          <table>
            <tr class = "textWHITE">
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
            <tr>
              <?php for($i = 0; $i < 14; $i++) echo "<td>Empty</td>"; ?>
            </tr>
            <tr class = "textWHITE">
              <th>Total</th>
              <?php for($i = 0; $i < 12; $i++) echo "<th>0</th>"; ?>
              <th></th>
            </tr>
            <tr>
              <th class="textWHITE">Recommended</th>
              <?php
              for ($i = 1; $i <= 12; $i++) echo '<th class="textWHITE">' . $recommendedVals[$i] . '</th>';
              echo '<th></th>';
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
