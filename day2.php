<?php
#  DATATYPES
    /* 
      Scalar: 
       1.int
       2.string
       3.boolean
       4.decimal
      Compound:
       1.Object
       2.Array
      Speacial Datatype:
       1.Resource
       2.NULL
    */
    $var = 8;//(int)
    var_dump($var);
    $demo="demo"; //(string)
    var_dump($demo);
    $num = 10.0;//(double)
    var_dump($num);
    $bool=true;//default value(false)
    var_dump($bool);
    $fruits=array("apple","orange","mango");
    var_dump($fruits);

    # CONTROL STATEMENTS
    /* Decision statements
       1.if
       2.if-else
       3.else-if
       4.nested if
    */
    //if
    $num=5;
    if($num<=10)
    {
       echo"Given num is less than 10"."<br>";// Whenever we have one condition we go for if.
    }

    //if-else
    $age=19;
    if($age>18) //Whenever we have two statements in which anyone has to be executed we go for if-else
    {
        echo"Eligible for vote";
    }
    else
    {
        echo"Not eligible for vote";
    }

    //else-if
    
    $mark=85;
    if($mark>=60 && $mark<=70)
    {
        echo"Your grade is C"; 
    }
    else if($mark>=71 && $mark<=80)
    {
        echo"Your grade is B";  // Whenever we have multiple conditions we go for else-if
    }
    else if($mark>=81 && $mark<=90)
    {
        echo"Your grade is A";
    }

    //nested-if
    $num_1=10;
    if ($num_1 > 10) {
       echo "Above 10";
       if ($num_1 > 20) {
          echo " and also above 20";
       } else {
          echo " but not above 20";
       }
    }
    echo"<br>";
    /* Looping statements
       1.while
       2.do while
       3.for
       4.for each
       5.switch
    */

    //while
    $temp_1 = 1;
    while ($temp_1 < 6) { 
      echo $temp_1."<br>";           
      $temp_1++;
    } 
    echo"<br>";/* First the condition will be checked and the statement
         will be executed till the condition fails */

    //do while
    $temp_2=1;
    do {
      if ($temp_2 == 3) break;
      echo $temp_2;
      $temp_2++;
    } while ($temp_2 < 6);
    echo"<br>";/* First the statement will be executed and the condition
         will be checked, loop continues till the condition fails */
    
    //for 
    $sum=0;
    for($num_2=1;$num_2<=5;$num_2++)
    {
        $sum+=$num_2;
    }
    echo $sum;
    echo"<br>";

    //for each"
    $games=array("action" => "pubg","cards" => "soltaire", "strategy"=>"COC");
    foreach($games as $key=>$element)
    {
        echo"$key".":"."$element";
        echo"<br>";
    }

    # FUNCTION
    /*1. No arguement function
      2.Parameterized function
      3.Variadic function
    */
    //No argument function
    function myFunction() {
        echo "This text comes from a function";
      }

    myFunction();
    echo "<br>";

    //Parameterized function
    function myFunction_1($var)
    {
        $var_2=5;
        $var_2+=$var;
        return $var_2;
    }
    echo myFunction_1(8);
    echo "<br>";
    
    //Variadic function  
    /*In this method we can pass the 'n' no of parameters and 
    when it comes to formal argument, use the variadic function keyword ...*/
    function myFunction_3(...$var)
    {
        $sum=0;
        foreach($var as $i)
        {
            $sum+=$i;
        }
        return $sum;
    }
    echo myFunction_3(1,2,3,4,5);
    echo "<br>";

    #  ARRAYS
    /* 1.1-D array
       2.Multi dimensional array
       3.Associative array
    */
    // 1-D array
    $arr=array(1,2,3,4,5);
    foreach($arr as $i)
    {
        echo $i."<br>";
    }

    //Dead code
    /*$myArr = array("Volvo", 15, ["apples", "bananas"]);

    // calling the function from the array item:
    print_r ($myArr[1]);

    $Cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
    print_r(array_chunk($Cars,4));
    */
?>