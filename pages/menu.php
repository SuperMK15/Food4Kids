<?php
include_once 'connector.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <title>Menu Display - Food4Kids Waterloo</title>
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
    <div class="menu1">
      <h1>Menu Display</h1>
      <div class="flex">
        <table class="finalMenu">
          <tr>
            <td>NO RESTRICTIONS MENU</td>
          </tr>
          <?php
          $text = "SELECT * FROM menus WHERE basketID = 1";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);
          for ($x = 1; $x <= 25; $x++) {
            $textI = "SELECT * FROM items WHERE itemID =" . $menuResult['itemID' . $x];
            $queryI = mysqli_query($conn, $textI);
            if (mysqli_num_rows($queryI) != 0) {
              $itemResult = mysqli_fetch_assoc($queryI);
              echo "<tr>";
              echo "<td class='BLUE'>" . $itemResult['identifier'] . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </table>
        <table class="finalMenu">
          <tr>
            <td>HALAL MENU</td>
          </tr>
          <?php
          $text = "SELECT * FROM menus WHERE basketID = 2";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);
          for ($x = 1; $x <= 25; $x++) {
            $textI = "SELECT * FROM items WHERE itemID =" . $menuResult['itemID' . $x];
            $queryI = mysqli_query($conn, $textI);
            if (mysqli_num_rows($queryI) != 0) {
              $itemResult = mysqli_fetch_assoc($queryI);
              echo "<tr>";
              echo "<td class='RED'>" . $itemResult['identifier'] . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </table>
        <table class="finalMenu">
          <tr>
            <td>VEGETARIAN MENU</td>
          </tr>
          <?php
          $text = "SELECT * FROM menus WHERE basketID = 3";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);
          for ($x = 1; $x <= 25; $x++) {
            $textI = "SELECT * FROM items WHERE itemID =" . $menuResult['itemID' . $x];
            $queryI = mysqli_query($conn, $textI);
            if (mysqli_num_rows($queryI) != 0) {
              $itemResult = mysqli_fetch_assoc($queryI);
              echo "<tr>";
              echo "<td class='GREEN'>" . $itemResult['identifier'] . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </table>
        <table class="finalMenu">
          <tr>
            <td>BABY MENU</td>
          </tr>
          <?php
          $text = "SELECT * FROM menus WHERE basketID = 4";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);
          for ($x = 1; $x <= 25; $x++) {
            $textI = "SELECT * FROM items WHERE itemID =" . $menuResult['itemID' . $x];
            $queryI = mysqli_query($conn, $textI);
            if (mysqli_num_rows($queryI) != 0) {
              $itemResult = mysqli_fetch_assoc($queryI);
              echo "<tr>";
              echo "<td class='YELLOW'>" . $itemResult['identifier'] . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </table>
        <table class="finalMenu">
          <tr>
            <td>OTHER MENU</td>
          </tr>
          <?php
          $text = "SELECT * FROM menus WHERE basketID = 5";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);
          for ($x = 1; $x <= 25; $x++) {
            $textI = "SELECT * FROM items WHERE itemID =" . $menuResult['itemID' . $x];
            $queryI = mysqli_query($conn, $textI);
            if (mysqli_num_rows($queryI) != 0) {
              $itemResult = mysqli_fetch_assoc($queryI);
              echo "<tr>";
              echo "<td class='BROWN'>" . $itemResult['identifier'] . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </table>
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
