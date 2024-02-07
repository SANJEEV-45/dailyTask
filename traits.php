<?php declare(strict_types=1);
    class Car{
        public string $model;
        public string $brand;
        public int $cylinder;
        public int $rpm;
        
        function __construct(string $model, string $brand, int $cylinder, int $rpm)
        {
            $this->model = $model;
            $this->brand = $brand;
            $this->cylinder = $cylinder;
            $this->rpm = $rpm;
        }
        function carspeed():void {
            echo "{$this->model} runs at {$this->rpm}";
        }  
        function getCarname():string{
            return "{$this->brand} {$this->model}";
        }
    }

    class Volkswagen {
        public string $torque;
        public function __construct (int $torque)
       {
           parent::getCarname(); 
           $this->torque = $torque;
       }
    }
    $myCar = new Car("A6","Audi",4,6500);
    echo $myCar->model;
    echo "<br>";
    echo "{$myCar->getCarname()}";
    echo"<br>";


?>