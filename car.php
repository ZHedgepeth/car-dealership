<?php

    class Car
    {
        public $make_model;
        public $price;
        public $miles;
        public $picture;
        function __construct($model_name, $cost, $mileage, $image_path)
        {
            $this->make_model = $model_name;
            $this->price = $cost;
            $this->miles = $mileage;
            $this->picture = $image_path;
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
        if ($car->price < $_GET["price"]) {
            array_push($cars_matching_search, $car);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zach and Rebecca's Car Dealership's Homepage</title>
</head>
<body>
    <h1>Zach and Rebecca's Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>

</body>
</html>
