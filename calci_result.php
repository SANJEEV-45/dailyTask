<?php declare(strict_types=1);
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $Operand_1 = (int)$_POST['Operand_1'];
  $Operand_2 = (int)$_POST['Operand_2'];
  $operator = $_POST['CalculatorResult'];
//    var_dump($Operand_1);
//    var_dump($Operand_2);
//    echo is_numeric($Operand_1);
    if(is_numeric($Operand_1) && is_numeric($Operand_2))
    {
      $calculated = 0;
      switch($operator)
      {
        case "Addition":     
            $calculated = $Operand_1 + $Operand_2;   
            break;  
        case "Subtraction":  
            $calculated = $Operand_1 - $Operand_2;   
            break;  
        case "Multiplication":  
            $calculated = $Operand_1 * $Operand_2;   
            break;  
        case "Division":  
            $calculated = $Operand_1 / $Operand_2;   
            break;  
        default:
            echo " Invalid Calculation "."<br>";
            break;
      }
      echo $calculated;
   } 
   else
   {
    echo "Operand is invalid"."<br>";
   } 
}

?>