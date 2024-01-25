<?php

   # EXCEPTIONS
   /*We can handle the exceptions by using 
     1.try and catch
     2.throws
     3. custom exception
    */ 
   function checkAge($age)
   {
      if($age<18)
      {
         throw new Exception ("You are not eligible for voting");
      }
      return true;
   }
   try{

      checkAge(19);
      echo "You are eligible to vote ";
   }
   catch(Exception $e)
   {
       echo $e->getFile()."<br>";
       echo "Message : {$e->getMessage()} <br>";
       echo "Line number : {$e->getLine()} <br>";
   }

   //Custom exception
   class myException extends Exception
   {
     public function message()
     {
        $error = "Error on line {$this->getLine()} in this {$this->getFile()} file";
        return $error;
     }
   } 
    $email="sanjeev.jk1710@gmail.com";
    try{
       if(!filter_var($email,FILTER_VALIDATE_EMAIL))
       {
        throw new myException($email);
       }
       echo "$email is valid email address";
    }
    catch(myException $e)
    {
       echo $e->message();
    }
    
    $arr=array("rohit","virat","rahane","pujara");
    //  echo $arr."<br>";
      print $arr."<br>";
    // print_r($arr)."<br>";


?>