<?php

    require_once(__DIR__."/../vendor/autoload.php");
    require_once(__DIR__."/../src/CAR.php");

    $app = new Silex\Application();

    $app->get("/car", function() {
        return "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <link href='css/styles.css' rel='stylesheet' type='text/css'>
            <title>Find Your Ride</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find Your Special Vehicle or Magical Creature</h1>
                <form action='/viewcars'>
                    <div class='form-group'>
                        <label for='price'>What is the most you're willing to pay??</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='miles'>How well traveled do you like your vehicle.. ps.. more the merrier?</label>
                        <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Car Me!</button>
                </form>
            </div>
        </body>
        </html>"
        ;
    });
    $app->get("/viewcars", function() {
      $porsche = new Car("2014 Porsche 911", 114991, 7864, "img/porsche.jpg");
      $ford = new Car("2011 Ford F450", 55995, 14241, "img/ford.jpg");
      $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "img/lexus.jpg");
      $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "img/mercedes.jpg");
      $subaru = new Car("2016 Subaru Outback", 45999, 2975, "img/subaru.jpg");
      $unicorn = new Car("2500 BC Magical Unicorn", 3300000, 1000000, "img/unicorn.jpg");
      $volvo = new Car("Volvo: Wallander Edition", 65000, 500, "img/volvo.jpg");
      // return "<img src ='". $volvo->getPicture() ."'>";
      $cars = array($porsche, $ford, $lexus, $mercedes, $subaru, $unicorn, $volvo);

      $cars_matching_search = array();
      foreach ($cars as $car) {
          if (($car->getPrice() < $_GET["price"]) && ($car->getMiles() < $_GET["miles"])) {
              array_push($cars_matching_search, $car);
          }
      }
      $output = "<!DOCTYPE html>
      <html>
      <head>
          <meta charset='utf-8'>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <link href='css/styles.css' rel='stylesheet' type='text/css'>
          <title>Zach and Rebecca's Car Dealership's Homepage</title>
      </head>
      <body>
          <h1>Zach and Rebecca's Car Dealership</h1>
          <div class='container'>";
      foreach($cars as $car) {
        $car_price = $car->getPrice();
        $car_make_model = $car->getMakeModel();
        $car_miles = $car->getMiles();
        $car_picture = $car->getPicture();
        $output .= "<h1>" . $car_make_model . "</h1>";
        $output .= "<p>" . "Price: " . $car_price . "</p>";
        $output .= "<p>" . "Miles: " . $car_miles . "</p>";
        $output .= "<img src = '". $car_picture ."'>";
      }
      $output .= '</div>
                </body>
              </html>';
      return $output;
    });

    return $app;
?>
