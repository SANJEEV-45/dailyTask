<?php declare(strict_types=1);
require "inheritance.php";

// class SUV extends Car {
//         public static int $torque;
//         public function __construct (string $model, string $brand,int $rpm)
//        {
//            parent::__construct($model,$brand, $rpm);
           
//        }
//        public function intro() : string{
//         return "Hi this is from child class";
//        }
//     }

//     class SportsCar extends Car {
//         protected $topSpeed;
    
//         public function __construct(string $model, string $brand,int $rpm, int $topSpeed) {
//             parent::__construct($model,$brand,$rpm);
//             // return parent:
//         }

//         public function message() : void{
//             $this->intro();
//         }
    
//     }
//     $myCar = new SUV("RUV","Toyata",2500);
//     //print_r ($myCar);
//     echo $myCar->getRpm();
//     echo SUV::$torque = 1000;
    
    trait Member{
       public int $number=10;
       public function myName(){
          return "Hi this is from member trait";
       }

    }


?>