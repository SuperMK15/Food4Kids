<?php
include_once 'connector.php';

$MenuIDs = array_fill(0, 6, 0);

if (isset($_POST['loadMenus'])) {
  for ($i = 1; $i <= 5; $i++) {
    $validationText = "SELECT * FROM menus WHERE menuName='" . $_POST['menu' . $i] . "'";
    $validationQuery = mysqli_query($conn, $validationText);

    if (isset($_POST['menu' . $i]) && mysqli_num_rows($validationQuery) != 0) {
      $findID = "SELECT * FROM menus WHERE menuName='" . $_POST['menu' . $i] . "'";
      $findIDQuery = mysqli_query($conn, $findID);
      $findIDrow = mysqli_fetch_assoc($findIDQuery);
      $menuIDs[$i] = $findIDrow['basketID'];
    }
  }
}
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
          <div class="selection-form">
            <section class="submission">
            </section>
            <form method="post" action="../pages/menu.php">
              <section class="menu-type">
                <datalist id="menus">
                  <?php
                  if (true) {
                    $sql = "SELECT * FROM menus";
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
                <h3>Menu Selection</h3><br>
                <input list="menus" id="menu1" name="menu1" placeholder="Select menu" autocomplete="off">
                <h3></h3><br>
                <input list="menus" id="menu2" name="menu2" placeholder="Select menu" autocomplete="off">
                <h3></h3><br>
                <input list="menus" id="menu3" name="menu3" placeholder="Select menu" autocomplete="off">
                <h3></h3><br>
                <input list="menus" id="menu4" name="menu4" placeholder="Select menu" autocomplete="off">
                <h3></h3><br>
                <input list="menus" id="menu5" name="menu5" placeholder="Select menu" autocomplete="off">
                <h3></h3><br>
                <form method="post" action="../pages/addMenu.php">
                  <input type="submit" id="loadMenus" name="loadMenus" value="Load Menus" class="button">
                </form>
              </section>
              <?php
              $text = "SELECT * FROM menus WHERE basketID='" . $menuIDs[1] . "'";
              $query = mysqli_query($conn, $text);
              $menuResult = mysqli_fetch_assoc($query);

              echo "<tr>";
              echo "<td>" . $menuResult['menuName'] . "</td>";
              echo "</tr>";

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
          <?php
          $text = "SELECT * FROM menus WHERE basketID='" . $menuIDs[2] . "'";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);

          echo "<tr>";
          echo "<td>" . $menuResult['menuName'] . "</td>";
          echo "</tr>";

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
          <?php
          $text = "SELECT * FROM menus WHERE basketID='" . $menuIDs[3] . "'";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);

          echo "<tr>";
          echo "<td>" . $menuResult['menuName'] . "</td>";
          echo "</tr>";

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
          <?php
          $text = "SELECT * FROM menus WHERE basketID='" . $menuIDs[2] . "'";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);

          echo "<tr>";
          echo "<td>" . $menuResult['menuName'] . "</td>";
          echo "</tr>";

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
          <?php
          $text = "SELECT * FROM menus WHERE basketID='" . $menuIDs[2] . "'";
          $query = mysqli_query($conn, $text);
          $menuResult = mysqli_fetch_assoc($query);

          echo "<tr>";
          echo "<td>" . $menuResult['menuName'] . "</td>";
          echo "</tr>";

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
