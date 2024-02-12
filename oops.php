<?php
const EDITION2 = 7;
echo Book::EDITION;
exit();
class Book
{
    //Acess modifiers
    /* 1.public
    2.private
    3.protected */
    public $name;
    const EDITION = 5;
    protected $author;
    private $price;

    /*   function __construct() //Default constructor (It initializes the states whenever the obj are created)
    {

    }*/

    public function __construct($name, $author, $price) //Parameterized constructor

    {
        $this->name = $name; //this keyword refers to the current(global) state of an object.
        $this->author = $author;
        $this->price = $price;
    }
    public function getAuthor() //Since it is private member we use getter methods to get the value

    {
        return $this->author;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setAuthor($Author) // Since it is a private member used to modify its value

    {
        $this->author = $Author;
    }
    public function setPrice($Price)
    {
        $this->price = $Price;
    }

    public function __destruct() // This method call when the scope exits or the progr

    {
        echo "The object is destroyed";
    }
}
//We can create the n number of objects using new keyword
$obj = new Book("Fire", "Jennings", 200); //Instantitaion
echo Book::EDITION;

echo "Book price is {$obj->getPrice()}" . "<br>";
$obj->setAuthor("Kingsley") . "<br>";
echo "Book author name is {$obj->getAuthor()}" . "<br>";

#Inheritance
class Fruit
{
    public $name;
    protected $color;
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro()
    {
        echo "The fruit is {$this->name} <br>";
        echo " the color is {$this->color}";
    }
}

// Strawberry is inheriting from Fruit
class Strawberry extends Fruit
{
    public function fruitMessage()
    {
        echo "Am I a fruit or a berry? ";
    }
}
$strawberry = new Strawberry("Strawberry", "red");
echo $strawberry->fruitMessage();
echo $strawberry->intro();

# ABSTRACTION
// Parent class
abstract class Car
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro(): string;
}

// Child classes
class Audi extends Car
{
    public function intro(): string
    {
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car
{
    public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class Citroen extends Car
{
    public function intro(): string
    {
        return "French extravagance! I'm a $this->name!";
    }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
