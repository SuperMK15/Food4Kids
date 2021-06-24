<?php
    include_once 'connector.php';
?>

<!--i know the image shifting effect is still broken don't @ me-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <title>Home - Food4Kids Organizer - Waterloo Region</title>
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png">

  <link href="styles/theme.css" rel="stylesheet" type="text/css"/>
</head>

<body>
  <header class="index-page-parallax">
    <div class="menu-padding">
      <nav>
        <div class="logo"><a href="https://www.food4kidswr.ca/"><img src="images/food4Kids.webp"></a></div>
        <ul class="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="pages/calculator.php">Menu Creator</li>
          <li><a href="pages/selector.php">Item Editor</a></li>
          <li><a href="pages/menu.php">Menu Display</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <!--<div class="index-blurb-box">
      <span class="index-blurb">NOM NOM NOM</span>
    </div>-->
    <div class="index1 top">
      <h1>What can this project do</h1>
      <p>This page allows you to use all the ingredients and items that you create on this tool. There are four menus that you can edit: no restrcitions, vegetarian, halal and an other menu in case it is needed. Once created, the tables will also display statistics for each item and menu that has been stored.</p>
    </div>
    <div class="index1">
      <h1><a href="pages/calculator.php">Menu Creator</a></h1>
      <div class ="flex">
        <p>This page lets you edit, create or delete items. When you open it, you will be provided a search-bar to find the items you want to edit, before being sent to a seperate page to edit the contents.</p>
        <div class="item_editor">
          <img src="images/item-editor.png">
        </div>
      </div>
    </div>
    <div class="index1">
      <h1><a href="pages/dbEditor.php">Item Editor</a></h1>
      <div class ="flex">
        <div class="menu_creator">
          <img src="images/menu_creator.png">
        </div>
        <p>This page lets you edit, create or delete items. When you open it, you will be provided a search-bar to find the items you want to edit, before being sent to a seperate page to edit the contents.</p>
      </div>
    </div>
    <div class="index1">
      <h1><a href="pages/menu.php">Menu Display</a></h1>
      <div class ="flex">
        <p>When you create new menus, they will be displayed here. Create and display up to four different menus, each neatly organized. It has been created similarly to the current menu in place at Food4Kids.</p>
        <div class="menu_display">
          <img src="images/menu_display.png">
        </div>
      </div>
    </div>
  </main>

  
  <footer>
    <div class="social">
      <a href="https://www.instagram.com/food4kidswaterlooregion/"><img src="images/instagram.webp"></a>
      <a href="https://twitter.com/food4kidswr"><img src="images/twitter.webp"></a>
      <a href="https://www.facebook.com/f4kwr/"><img src="images/facebook.png"></a>
    </div>
    <div class="info">
      <p class="copyright">Copyright © 2021 "Our Name". All rights reserved.</p>
      <p class="location">Food4Kids Waterloo Region | 10 Washburn Dr., Unit 4, Kitchener, ON N2R1S2</p>
      <p class="contacts">Phone: 519 576 3443 | Email: ksoberle@food4kidswr.ca</p>
    </div>
  </footer>
  
  <script src="scripts/backgroundShift.js"></script>
</body>

</html>