<?php
$calculated = 0;
print_r ($_SERVER);
exit;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $Operand_1 = $_POST['Operand_1'];
  $Operand_2 = (int)$_POST['Operand_2'];
  $operator = $_POST['CalculatorResult'];

//    var_dump($Operand_1);
//    var_dump($Operand_2);
//    echo is_numeric($Operand_1);
    if(is_numeric($Operand_1) && is_numeric($Operand_2))
    {
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
   } 
   else
   {
    echo "Operand is invalid"."<br>";
   } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p><input type="number" id="Operand_1" name="Operand_1" required><b>&nbsp Operand 1</b></p>
        <p><input type="number" id="Operand_2" name="Operand_2" required><b>&nbsp Operand 2</b></p>
        <p><input readonly name="calculated" value="<?php echo $calculated ?>";><b>&nbsp  Result</b></p>
        <input type="submit" value="Addition" name="CalculatorResult" >
        <input type="submit" value="Subtraction" name="CalculatorResult" >
        <input type="submit" value="Multiplication" name="CalculatorResult" >
        <input type="submit" value="Division" name="CalculatorResult">

    </form>
</body>
</html>
