<?php
// //Array Inbuilt functions
// //1.array_change_key_case(array,case) returns assoc array
// $arr_1 = array("name" => "Sanjeev", "age" => 23, "PLace" => "Aruppukottai");
// print_r(array_change_key_case($arr_1, CASE_UPPER));
// echo "<br>";
// /* Changes all keys in array from lower to upper */

// //2.array_chunk(array,size,preserve_keys) returns assoc array
// $cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
// print_r(array_chunk($cars, 7, false));
// echo "<br>";
// /* preserve_keys will preserve the index when it is true orelse
// it will start form 0th index for every chunks.
// It won't accepts negative value.
// If we give more length than the size of array it will split and returns the same */

// //3.array_column(array,column_key,index_key) returns assoc array
// $arr_2 = array(
//     array(
//         'id' => 5698,
//         'first_name' => 'Peter',
//         'last_name' => 'Griffin',
//     ),
//     array(
//         'id' => 4767,
//         'first_name' => 'Ben',
//         'last_name' => 'Smith',
//     ),
//     array(
//         'id' => 3809,
//         'first_name' => 'Joe',
//         'last_name' => 'Doe',
//         array(
//             'id' => 5002,
//             'first_name' => 'Jack',
//             'last_name' => 'Sparrow',
//         ),
//     ),
// );

// print_r(array_column($arr_2, 'id', 'name'));
// echo "<br>";

// /* If we give the undeclared variable in a column key, it returns nothing.
// If we give the undeclared variable in index key, it will consider the index
// and starts from 0 */

// //4. array_combine(keys,values) returns assoc array
// $fname = array("Peter" => 35, "Ben" => 23, "Joe" => 63);
// $funame = array("Peter" => 77, "Ben" => 29, "Joe" => 43);
// $age = array("35", "37", null => 34);
// print_r(array_merge($fname, $funame));
// echo "<br>";
// /* The passing arrays should have equal number of parameters orelse it will
// throw error and we can pass the null iin anyone of the array. */

// //5. array_count_values(array)
// $arr_3 = array("Apple", "Mango", "Pear", "Grapes", "apple", "Pear", " ", "");
// print_r(array_count_values($arr_3));
// echo "<br>";

// /*Null can't be counted,
// Will return the count based on case sensitive */

//6.array_diff (array,array,......) returns assoc array
$arr_4 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "white", "0" => "pink");
$arr_5 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "white", "e" => "purple");
$arr_6 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "white", "e" => "pwink");

// print_r(array_diff($arr_4, $arr_5,$arr_6));
$temp = array_push($arr_4, $arr_5);
print_r($arr_4);
echo "<br>";

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "black", "g" => "purple", "l" => "orange");
$a3 = array("a" => "red", "b" => "black", "h" => "orange", "l" => "yellow");

$result = array_diff($a1, $a2, $a3);
// print_r($result);
echo "<br>";

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"white");
// $a2=array("e"=>"red","f"=>"black","g"=>"purple");
// $a3=array("a"=>"red","b"=>"black","h"=>"white");

// $result=array_diff($a1,$a2,$a3);
// print_r($result);
/* Compare the values of two arrays, if values of 1st array is not in 2nd array
then it will print the unmatched values present in the 1st array.
CASE_SENSITIVE.
We can pass multiple arrays */

// //6.arr_diff_assoc return assoc arrays
// /* Compares both keys and values of two arrays, if values of 1st array is not in 2nd array
// then it will print the unmatched values present in the 1st array. */

// print_r(array_diff($arr_4, $arr_5));
// echo "<br>";

//7. array_fill(index,length,value) returns assoc array
$arr_3 = array_fill(1, 2, "Blue");
print_r($arr_3);
echo "<br>";
/* this will fill the array based on what parameters u gave
it accepts negative index and doesn't accept negative length */

//8.array_fill_keys($keys,)
$keys = array("a", "b", "c", 1,"d");
$a1 = array_fill_keys($keys, "blue");
print_r($a1);
echo "<br>";
/*array of values and values passes to the arguments */

// //9. array_filter($array,callfn,mode)
//     $number = array("a" => 1,0=>2,"c"=>3,"d"=>4,"e"=>5,"f"=>6);
//     function findEven($value)
//     {
//         return ($value % 2==0);
//     }
//     print_r(array_filter($number,"findEven",ARRAY_FILTER_USE_KEY));
// echo "<br>";
//10.array_flip($array)
$input = array("oranges", "apples", "a" => "pears");
$flipped = array_flip($input);

print_r($flipped);
echo"<br>";
/*If we give the values only it will return the index as a key(0th index)
  or else it will take the respective key only */
  
//11.array_intersect($arrays....) return assoc array
$array1 = array(1 => 2, 0=>4, 6, 8, 10, 12);
$array2 = array(1, 2, 4=>3, 4, 5, 6);
$array3 = array("22", 2, 3, 4, 5);

print_r(array_intersect($array1, $array2,$array3));
//var_dump(array_intersect($array2, $array1));
echo "<br>";
/* It returns the common values of each array and will be 
returning the same key what we have given in the array */

//12. Array_product
print_r(array_product($array3));

echo(min(2,4,6,8,10) . "<br>");
echo(min(22,14,68,18,15) . "<br>");
echo(min(array(4,6,8,10)) . "<br>");
echo(min(array(44,16,81,12,[1,2,3,4])));
?>
