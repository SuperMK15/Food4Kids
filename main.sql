CREATE TABLE Items (

  itemID INT AUTO_INCREMENT,

  identifier TEXT,
  price DECIMAL(10, 2),
  stock INT,

  calories DECIMAL(10, 2),
  protein DECIMAL(10, 2),
  calcium DECIMAL(10, 2),
  iron DECIMAL(10, 2),
  vitaminA DECIMAL(10, 2),
  vitaminC DECIMAL(10, 2),
  carbohydrates DECIMAL(10, 2),
  sodium DECIMAL(10, 2),
  sugar DECIMAL(10, 2),
  artSugar DECIMAL(10, 2),
  fat DECIMAL(10, 2),

  containsNuts INT,
  isVegetarian INT,
  isHalal INT,
  isBaby INT,

  PRIMARY KEY (itemID)
);

CREATE TABLE Menus (
  basketID INT AUTO_INCREMENT,

  itemID1 INT,
  itemID2 INT,
  itemID3 INT,
  itemID4 INT,
  itemID5 INT,
  itemID6 INT,
  itemID7 INT,
  itemID8 INT,
  itemID9 INT,
  itemID10 INT,
  itemID11 INT,
  itemID12 INT,
  itemID13 INT,
  itemID14 INT,
  itemID15 INT,
  itemID16 INT,
  itemID17 INT,
  itemID18 INT,
  itemID19 INT,
  itemID20 INT,
  itemID21 INT,
  itemID22 INT,
  itemID23 INT,
  itemID24 INT,
  itemID25 INT,

  menuName TEXT,

  PRIMARY KEY (basketID)
);

CREATE TABLE TRACKER (
  dateStarted TEXT,

  totalCalories DECIMAL(10, 2),
  totalProtein DECIMAL(10, 2),
  totalCalcium DECIMAL(10, 2),
  totalIron DECIMAL(10, 2),
  totalVitaminA DECIMAL(10, 2),
  totalVitaminC DECIMAL(10, 2),
  totalCarbohydrates DECIMAL(10, 2),
  totalSodium DECIMAL(10, 2),
  totalSugar DECIMAL(10, 2),
  totalArtSugar DECIMAL(10, 2),
  totalFat DECIMAL(10, 2),

  dateEnded TEXT
);

INSERT INTO Items(identifier, calories, protein, calcium, iron, vitaminA, vitaminC, carbohydrates, sodium, sugar, artSugar, fat, containsNuts, isVegetarian, isHalal, isBaby, price, stock)
  VALUES
         ('Canned Stuffed Eggplant (400g)', 125, 1, 0, 0, 0, 0, 14, 1, 0, 0, 7, 0, 1, 1, 1, 4.19, 50),
        ('Alwadi Fava Beans Canned (398ml)', 357, 24, 0, 0, 0, 0, 63, 1, 5, 0, 1, 0, 1, 1, 1, 3.22, 50),
        ('Saidoon White Pita (5pk)', 150, 5, 0, 8, 0, 0, 33, 50, 1, 0, 0, 0, 1, 1, 1, 0.99, 50),
        ('Campbells Wedding Soup', 120, 8, 4, 8, 4, 0, 14, 780, 2, 0, 4, 0, 0, 0, 1, 0.6, 50),
        ('Muffins', 340, 5, 4, 10, 0, 0, 45, 420, 24, 0, 15, 0, 1, 1, 1, 0.75, 50),
        ('Chocolate Chip Muffins', 50, 0.3, 0, 0, 0, 45, 14, 0, 11, 0, 0, 0, 1, 1, 1, 0.66, 50),
        ('Goldfish Snackpackplain', 130, 3, 2, 6, 0, 0, 19, 240, 0, 0, 4.5, 0, 1, 1, 1, 0.28, 50),
        ('Dare Cookies', 140, 1, 1, 4, 0, 0, 19, 90, 9, 0, 7, 0, 1, 1, 1, 0.4, 50),
        ('Quakers Instant Oatmeal (2x)', 160, 4, 2, 6, 0, 0, 33, 140, 11, 0, 2, 0, 1, 1, 1, 4.88, 50),
        ('Honey Nut Cheerios', 140, 3, 10, 20, 10, 10, 30, 210, 12, 0, 2, 1, 1, 1, 1, 0.33, 50),
        ('Juice Box Apple (250ml)', 80, 0, 2, 2, 0, 80, 21, 10, 19, 0, 0, 0, 1, 1, 1, 1.95, 50),
        ('Milk 2 Go - Single Serve', 100, 7, 25, 0, 8, 0, 10, 95, 10, 0, 4, 0, 1, 1, 1, 0.88, 50),
        ('Apple', 52, 0.28, 0, 0.13, 0, 5, 13.8, 1, 10.4, 0, 0.2, 0, 1, 1, 1, 0.4, 50),
        ('Peach', 40, 1, 0, 2, 0, 10, 10, 0, 8, 0, 0.3, 0, 1, 1, 1, 0.8, 50),
        ('Pepper', 25, 1, 2, 4, 0, 310, 6, 2, 0, 0, 0.2, 0, 1, 1, 1, 1, 50),
        ('Mini Carrots - One Cup', 35, 1, 2, 2, 120, 10, 8, 65, 5, 0, 0, 0, 1, 1, 1, 0.61, 50),
        ('Canned Zwan (335g)', 240, 14, 30, 8, 0, 4, 6, 1140, 0, 0, 18, 0, 0, 1, 0, 2.87, 50),
        ('Alwadi Fava & Chickpeas Canned (398ml)', 110, 6.5, 0, 0, 0, 0, 14, 0, 0, 0, 2, 0, 1, 1, 1, 0.99, 50),
        ('Indomie Chicken Noodles (1 pack)', 170, 4, 0, 8, 4, 0, 23, 680, 1, 0, 6, 0, 0, 1, 1, 13.67, 50),
        ('Alphagetti (398ml)', 150, 6, 4, 10, 6, 0, 26, 620, 8, 0, 3, 0, 1, 1, 1, 0.97, 50),
        ('Kirkland Canned Chicken (354g)', 60, 13, 0, 0, 0, 0, 0, 190, 0, 0, 1, 0, 0, 0, 1, 12.79, 50),
        ('Rice-a-Roni Various (227g)', 230, 7, 2, 20, 0, 2, 51, 1070, 2, 0, 1, 0, 0, 0, 0, 1.97, 50),
        ('Ozery FRENA BUN (2 pc)', 170, 7, 2, 13, 0, 0, 32, 240, 2, 0, 1.5, 0, 1, 1, 1, 4, 50),
        ('Goldfish Plain', 90, 2, 2, 2, 0, 0, 13, 170, 0, 0, 3.5, 0, 1, 1, 1, 0.28, 50),
        ('Motts Fruitsations Snacks (226g)', 80, 0, 0, 0, 0, 100, 19, 30, 9, 0, 0, 0, 1, 1, 1, 0.2, 50),
        ('Ozery Mini Rounds (2 pc)', 60, 2, 0, 6, 0, 0, 13, 70, 3, 0, 0, 0, 1, 1, 1, 4.49, 50),
        ('Kirkland Microwave Popcorn', 500, 6, 0, 0, 0, 0, 46, 600, 0, 0, 32, 0, 1, 1, 0, 0.3, 50),
        ('Cereal - Honey Bunches Oats', 210, 4, 0, 50, 0, 0, 43, 220, 11, 0, 3, 0, 1, 1, 0, 0.66, 50),
        ('Fuji Apple', 100, 0.3, 1, 1, 0, 5, 24, 1.6, 18.5, 0, 0.3, 0, 1, 1, 1, 0.59, 50),
        ('Pear', 112, 0.7, 1, 2, 0, 9, 26.6, 1.8, 18.5, 0, 0.7, 0, 1, 1, 1, 0.87, 50),
        ('Zucchini', 33, 2, 3, 0, 4, 47, 5, 6, 3, 0, 0, 0, 1, 1, 1, 0.97, 50),
        ('Cedar Falafel Mix', 200, 8, 8, 15, 0, 0, 24, 50, 6, 0, 0, 0, 1, 1, 0, 1.67, 50),
        ('Canned Hummus & Tahini (398ml)', 29, 1, 2, 3, 0, 0, 4, 210, 1, 0, 1, 0, 1, 1, 0, 24, 50),
        ('Dare Chocolate Cookie (2x)', 140, 1, 1, 4, 0, 0, 19, 90, 9, 0, 7, 0, 1, 1, 0, 0.4, 50),
        ('Campbells Chicken Noodle', 120, 7, 2, 6, 8, 0, 15, 650, 3, 0, 3, 0, 0, 0, 1, 0.5, 50),
        ('Canned Turkey (156g)', 70, 9, 2, 4, 0, 2, 0, 330, 0, 0, 4, 0, 0, 0, 1, 1.67, 50),
        ('Ozery Breakfast Round (2 pc)', 220, 9, 2, 10, 0, 0, 37, 210, 3, 0, 4, 0, 1, 1, 1, 38, 50),
        ('Kirkland Trail Mix', 300, 9, 6, 6, 0, 0, 26, 100, 20, 0, 18, 1, 1, 1, 0, 24.99, 50),
        ('Kellogs Rice Crispy', 90, 1, 0, 4, 0, 0, 17, 105, 8, 0, 2.5, 0, 1, 1, 0, 0.25, 50),
        ('English Muffin (2x)', 130, 5, 4, 10, 0, 0, 24, 220, 1, 0, 1.5, 0, 1, 1, 1, 0.5, 50),
        ('DADS Oatmeal Cookies (2x)', 170, 2, 0, 6, 0, 0, 28, 140, 13, 0, 6, 1, 1, 1, 0, 0.3, 50),
        ('Kiwi', 61, 1, 1, 0, 0, 43, 15, 3, 9, 0, 0, 0, 1, 1, 1, 0.67, 50),
        ('Red Pepper', 39, 1.5, 0, 2, 10, 181, 9, 3, 2, 0, 0, 0, 1, 1, 1, 1.3, 50),
        ('Potatoes ', 278, 7, 4, 18, 1, 48, 63, 30, 4, 0, 0, 0, 1, 1, 1, 0.89, 50),
        ('Cedar Canned Chickpeas (540ml)', 210, 8, 6, 20, 0, 0, 36, 230, 1, 0, 4, 0, 1, 1, 1, 1.99, 50),
        ('Campbells Tomato Soup', 110, 2, 2, 3, 0, 0, 22, 750, 16, 0, 1.5, 0, 1, 1, 1, 0.97, 50),
        ('Campbells Vegetable Soup ', 90, 2, 2, 6, 8, 0, 19, 750, 7, 0, 1, 0, 0, 0, 1, 0.97, 50),
        ('Canned Tuna', 60, 15, 0, 3, 0, 0, 0, 125, 0, 0, 0.3, 0, 0, 1, 1, 1.14, 50),
        ('Quakers Oatmeal', 160, 4, 2, 6, 0, 0, 33, 140, 11, 0, 2, 0, 1, 1, 1, 4.88, 50),
        ('Wowbutter (8g)', 50, 1.75, 1, 1.5, 0, 0, 8, 25, 0.75, 0, 3.75, 0, 1, 1, 0, 0.09, 50),
        ('Kind Protein Bars', 200, 5, 4, 10, 0, 0, 17, 140, 5, 0, 15, 0, 1, 1, 0, 1.39, 50),
        ('Mini Wheats Cereals', 200, 5, 2, 15, 0, 0, 46, 0, 11, 0, 1, 0, 1, 1, 1, 4.97, 50),
        ('Banana', 135, 1, 7, 0, 4, 13, 34, 1, 18, 0, 0, 0, 1, 1, 1, 0.28, 50);
        
INSERT INTO Menus(itemID1, itemID2, itemID3, itemID4, itemID5, itemID6, itemID7, itemID8, itemID9, itemID10, itemID11, itemID12, itemID13, itemID14, itemID15, itemID16, itemID17, itemID18, itemID19, itemID20, itemID21, itemID22, itemID23, itemID24, itemID25)
  VALUES
    (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
