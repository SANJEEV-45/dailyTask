<?php declare(strict_types=1); 
require "traits2.php";

// // Parent class
// class Vehicle {
//     protected $brand;

//     public function __construct(string $brand) {
//         $this->brand = $brand;
//     }

//     public function getBrand(): string {
//         return $this->brand;
//     }
// }

// // Single Inheritance: Car inherits from Vehicle
// class Car extends Vehicle {
//     protected $color;

//     public function __construct(string $brand, string $color) {
//         parent::__construct($brand);//If u are using in the same file u can call the parent class constructor using this keyword also
//         $this->color = $color;
//     }

//     public function getColor(): string {
//         return $this->color;
//     }
//     public function intro() : string
//     {
//         return "Hi this is from sports Car class";
//     }
// }

// //Multilevel Inheritance: SportsCar inherits from Car, which inherits from Vehicle
// class SportsCar extends Car {
//     protected $topSpeed;

//     public function __construct(string $brand, string $color, int $topSpeed) {
//         parent::__construct($brand, $color);
//         $this->topSpeed = $topSpeed;
//     }

//     public function getTopSpeed(): int {
//         return $this->topSpeed;
//     }
// }

// // Hierarchical Inheritance: Truck inherits from Vehicle
// class Truck extends Vehicle {
//     protected $loadCapacity;

//     public function __construct(string $brand, int $loadCapacity) {
//         parent::__construct($brand);
//         $this->loadCapacity = $loadCapacity;
//     }

//     public function getLoadCapacity(): int {
//         return $this->loadCapacity;
//     }
// }

class Trait_1{
     use Member;
     use Member2;
    public function intro():string{
        echo "{$this->number}";
        return $this->myName();
    }
    public function message(): void{
        echo "Hi";
    }
}
$traits = new Trait_1();
echo $traits->intro();
echo "<br>";
echo $traits->message();
?>