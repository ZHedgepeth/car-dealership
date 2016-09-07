<?php

    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $picture;
        function __construct($model_name, $cost, $mileage, $image_path)
        {
            $this->make_model = $model_name;
            $this->price = $cost;
            $this->miles = $mileage;
            $this->picture = $image_path;
        }
        function getMakeModel()
        {
            return $this->make_model;
        }
        function getPrice()
        {
            return $this->price;
        }
        function getMiles()
        {
            return $this->miles;
        }
        function getPicture()
        {
            return $this->picture;
        }
        function setMakeModel($new_make_model)
        {
            $this->make_model = (string) $new_make_model;
        }
        function setPrice($new_price)
        {
            $this->price = (float) $new_price;
        }
        function setMiles($new_miles)
        {
            $this->miles = (int) $new_miles;
        }
        function setPicture($new_picture)
        {
            $this->picture = (string) $new_picture;
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7864, "img/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14241, "img/ford.jpg");
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "img/lexus.jpg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "img/mercedes.jpg");
    $subaru = new Car("2016 Subaru Outback", 45999, 2975, "img/subaru.jpg");
    $unicorn = new Car("2500 BC Magical Unicorn", 3300000, 1000000, "img/unicorn.jpg");
    $volvo = new Car("Volvo: Wallander Edition", 65000, 500, "img/volvo.jpg");

    $cars = array($porsche, $ford, $lexus, $mercedes, $subaru, $unicorn, $volvo);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if (($car->getPrice() < $_GET["price"]) && ($car->getMiles() < $_GET["miles"])) {
            array_push($cars_matching_search, $car);
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Zach and Rebecca's Car Dealership's Homepage</title>
</head>
<body>
    <h1>Zach and Rebecca's Car Dealership</h1>
    <div class="container">
        <?php
            if (empty($cars_matching_search)) {
                echo "<h2> Sorry no cars for you today! </h2>";
            } else {
                foreach ($cars_matching_search as $car) {
                    $car_make_model = $car->getMakeModel();
                    $car_price = $car->getPrice();
                    $car_miles = $car->getMiles();
                    $car_picture = $car->getPicture();
                    echo "<h3> $car_make_model </h3>";
                    echo "<img src='$car_picture'>";
                    echo "<ul>";
                        echo "<li> $$car_price </li>";
                        echo "<li> Miles: $car_miles </li>";
                    echo "</ul>";
                    }
                }

        ?>
    </div>
</body>
</html>
