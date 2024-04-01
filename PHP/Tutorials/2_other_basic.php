<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Still Learning PHP</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 80%;
        background-color: grey;
        margin: auto;
    }
</style>

<body>
    <div class="container">
        <h1>Lets learn about PHP</h1>
        <p>Can you go to the party</p>
        <?php
        $age = 34;
        if ($age > 18) {
            echo "You can go to party";
        } else if ($age == 7) {
            echo "You are 7 years old";
        } else {
            echo "You can no go to the party";
        }
        echo "<br>";

        //arrays
        $languages = array("Python", "C++", "PHP");
        echo $languages[0];
        echo "<br>";
        echo count($languages);
        echo "<br>";

        // loops
        $i = 0;
        while ($i <= 10) {
            echo "<br>The value of a is: ";
            echo $i;
            $i++;
        }

        // iterating arrays in PHP using while loop
        $i = 0;
        while ($i < count($languages)) {
            echo "<br>value of language is ";
            echo $languages[$i];
            $i++;
        }

        // do while loop
        $i = 20;
        do {
            echo "<br>value of i is ";
            echo $i;
            $i++;
        } while ($i < 10);

        // for loop
        for ($i = 60; $i < 10; $i++) {
            echo "<br>value of i from the for loop is: ";
            echo $i;
        }

        //foreach loop
        foreach ($languages as $value) {
            echo "<br>The value from foreach loop is ";
            echo $value;
        }

        //function
        echo "<br>";
        function print5()
        {
            echo "FIVE";
        }
        print5();

        function print_number($number)
        {
            echo "<br> your number is ";
            echo $number;
        }
        print_number(53);
        print_number(51);
        print_number(43);
        print_number(264);
        ?>
        <?php
        $str = "This is a string";
        echo $str;
        echo "<br>";
        $len = strlen($str);
        echo "length of this string is ";
        echo $len;
        echo "<br>";
        echo "length of this string is " . $len;
        echo "<br>";
        echo "the number of words in this string is " . str_word_count($str);
        strrev($str); //reverse
        strpos($str, "this"); //position in string
        str_replace("is", "at", $str);//replace
        ?>
    </div>
</body>

</html>