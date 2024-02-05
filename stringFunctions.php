<?php
  //1.strrev (returns string)
  $str = strrev("Hello world");
  echo "strrev = $str";
  echo "<br>";

  //2.str_word_count(returns an array)
  $str_1 = str_word_count("Hello this is from Chennai ",1);
  print_r ($str_1);
  echo "<br>";

  //3.strlen (returns an integer)
  $str_2 = strlen("Chennai");
  echo "strlen = $str_2";
  echo "<br>";

  //4.strspn (returns an integer)
  /*retuns the length of the initial segment of a string consisting 
  entire characters contained within a given string. */
  $str_3 = strspn("Hello world!","kHelo",0,11);
  echo "strspn = $str_3";
  echo "<br>";

  //5.strcspn(returns an integer)
  /*retuns the position of the initial chatracter of a string consisting 
  entire characters contained within a given string. */
  $str_4 = strcspn("Hello world!","ixd    txt");
  echo "strcspn = $str_4";
  echo "<br>";
//   strcmp();
//   strcasecmp();
  echo strchr("Hello World","World",true);
  echo strstr("Hello World","World",true);
//addclashes
// The addslashes() function returns a string with backslashes in front of predefined characters.

// The predefined characters are:

//     single quote (')
//     double quote (")
//     backslash (\)
//     NULL

//substr_comapare
?>