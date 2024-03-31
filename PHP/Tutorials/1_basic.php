<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning PHP</title>
</head>
<body>
    <div class="container">
        Hello PHP
        <?php
        echo "Hello again, but in PHP ";

        //comment
        ?>
        <?php
        echo "Hello yet again, also in PHP ";
        echo "<br>";
        $var1 = 40;
        $var2 = 50;
        echo $var1;
        echo "<br>";
        echo $var2;
        echo "<br>";
        echo $var1 + $var2;
        echo "<br>";
        
        //operators (same as most dynamically typed languages)
        //arithmetic
        echo "Value of var1 + var2 is ";
        echo $var1 + $var2;
        echo "<br>";
        echo "Value of var1 - var2 is ";
        echo $var1 - $var2;
        echo "<br>";
        echo "Value of var1 * var2 is ";
        echo $var1 * $var2;
        echo "<br>";
        echo "Value of var1 / var2 is ";
        echo $var1 / $var2;
        echo "<br>";
        
        //assignment
        $newVar = $var1;
        // $newVar += $var1;
        // $newVar -= $var1;
        // $newVar /= $var1;
        // $newVar *= $var1;
        echo "value of newvar is ";
        echo $newVar;
        echo "<br>";

        //comparision
        echo "Value of 1 == 4 is";
        echo var_dump(1==4);  //var_dump() function dumps information about one or more variables. The information holds type and value of the variable(s).

        echo "<br>";
        
        //increment/decrement
        // echo $var1++;
        echo $var1--;
        // echo ++$var1;
        // echo --$var1;
        echo "<br>";
        echo $var1;

        //logical(truth tables)
        // and && both should be true to get true
        // or || either one
        // xor
        // not !
        $myVar = (true and true);
        // $myVar = (false and true);
        // $myVar = (false and false);
        // $myVar = (true and false);
        echo "<br>";
        echo var_dump($myVar);
        echo "<br>";
        ?>
        <?php
        define('PI',3.14);
        //datatypes

        //string
        $varstr = "This is a string";
        echo var_dump($varstr);
        echo "<br>";
        // integer
        $varstr = 67;
        echo var_dump($varstr);
        echo "<br>";
        // float
        $varstr = 67.1;
        echo var_dump($varstr);
        echo "<br>";
        // boolean
        $varstr = true;
        echo var_dump($varstr);
        echo "<br>";
        // array
        // object

        //constant(go to line 81)
        echo PI;
        ?>
    </div>
</body>
</html>