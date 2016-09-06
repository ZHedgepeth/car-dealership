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
