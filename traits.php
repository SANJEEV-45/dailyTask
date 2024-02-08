<?php declare(strict_types=1);
    class Car{
        static int $count = 10;
        protected string $model;
        public string $brand;
        private int $rpm;
        
        public function __construct(string $model, string $brand, int $rpm)
        {
            $this->model = $model;
            $this->brand = $brand;
            $this->rpm = $rpm;
        }
        
        public function getRpm() : int{
            return $this->rpm;
        }
        
        protected function intro() : string{
            return "this is from parent class";
        }
    }

//     $people = array("Peter", "Joe", "Glenn", "Cleveland");

//     echo current($people) . "<br>";
//     echo end($people) . "<br>";
//    echo next($people);
?>