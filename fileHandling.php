<?php
  //File handling
   
  // This line will executes if the file does exists or else, it will throw an error.
   $file = fopen("textfile.txt","r") or die("The file you searched doesnt exist");

   /* modes
   1.r-read purpose only
   2.w-erase the contents of file or creates a new file if the file doesn't exists
   3.a-file points at the end of the data, we can add the data
   4.x-creates a new file, it will throw error if the file exists.
   5.r+ - we can read or write in a file (file pointer starts at the begining)
   6.w+ - similiar to w but previous data could be erasee.
   7.a+ - similiar to a but we can read/write and append the data.
   8.x+ - similiar to x but we can read/write */

   //read
   echo fread($file,filesize("textfile.txt"));

   //print the first line of the file
    echo fgets($file,filesize("textfile.txt"));

    while(!feof($file))
    {
        echo fgets($file)."<br>";
    }
   //print each character of the file
//      echo fgetc($file);
//      //writing the data to the file
//      $randomText = "Py - Python \n";
//      fwrite($file,$randomText);
//    /*If you are doing a operation ,You should use the respective mode of descriptor
//     otherwise it will throw an error */ 
   
//     //Appending the text.
//     $myfile = fopen("textfile.txt", "a") or die("Unable to open file");
//     $txt = "Alex Doolan\n";
//     fwrite($myfile, $txt);
//     $txt = "Ricky Ponting\n";
//     fwrite($myfile, $txt);

?>