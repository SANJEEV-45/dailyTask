<?php
   class Book{
      //Acess modifiers
      /* 1.public 
         2.private
         3.protected */
      public $name;
      protected $author;
      private $price;

    /*   function __construct() //Default constructor (It initializes the states whenever the obj are created)
       {
          
       }*/   

      function __construct($name,$author,$price) //Parameterized constructor
      {
          $this->name = $name;   //this keyword refers to the current(global) state of an object.
          $this->author= $author;
          $this->price = $price;
      }
      function getAuthor() //Since it is private member we use getter methods to get the value
      {
        return $this->author;
      }
      function getPrice()
      {
        return $this->price;
      }
      function setAuthor($Author)
      {
         $this->author = $Author;
      }
      function setPrice($Price)
      {
        $this->price = $Price;
      }
    }
     $obj = new Book("Fire","Jennings",200); //Instantitaion

     echo "Book price is {$obj->getPrice()}"."<br>";
     $obj->setAuthor("Kingsley")."<br>";;
     echo "Book author name is {$obj->getAuthor()}"."<br>";

?>