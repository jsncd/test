<?php

if (empty($random) || $newGame == TRUE ) {
    $random = rand (1, 30);
    $try = 0;
} 
echo "$random";
$try++;
print <<< HERE

<form action = "index.php" method = "post">
<input type = "text"
    name = "guess"
    value = "">

<input type = "hidden"
    name = "random"
    value = "$random">
        
<input type = "hidden"
    name = "try"
    value = "$try">

<input type = "submit"
    value = "Guess!">

</form>
HERE;

if (empty($guess)){
    print "Вгадай число від 1 до 30";
}
 else {
  
if ($guess < $random) {
    print "Ваше число меньше ніж $guess";
}

elseif ($guess > $random) {
    print "Ваше число більше ніж $guess";
}

elseif ($guess == $random) {
    print "Ти вгадав з $try спроб";

print <<< HERE

<form action = "index.php" method = "post">
<input type = "hidden"
    name = "newGame"
    value = "1">

</form>
HERE;
}

 }
 
 
?>


