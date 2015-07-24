<?php 

extend('welcome_message');

startblock('body');



$token = $this->mypassword->getRandomToken(16);

printf("\r\n<p>Here's our token: %s\r\n</p>".PHP_EOL, $token);

/**
 * Now, let's generate a random number.  This works just like `rand()` in that you
 * can provide a min and a max to the function to put boundaries on the generated
 * number's range.
 */
$number = $this->mypassword->getRandomNumber();

printf("\r\n<p>Here's a random number from 0 to PHP_INT_MAX: %d\r\n</p>", $number);

/**
 * Let's bound that to between 10 and 100...
 */
$number = $this->mypassword->getRandomNumber(10, 100);

printf("\r\n<p>Here's a random number from 10 to 100: %d\r\n</p>", $number);

/**
 * And we can also pick a random element from an array
 *
 * This is similar to array_rand, except that it uses a cryptographic secure RNG
 * (which is likely overkill for most applications)
 */
$array = array('ab', 'bc', 'cd', 'de', 'ef', 'fg', 'gh');
$element = $this->mypassword->getRandomArrayElement($array);

printf("\r\n<p>Here's a random array element: %s\r\n</p>", $element);

/**
 * And we can randomize an array
 */
$array = array('a', 'b', 'c', 'd', 'e', 'f');
$newArray = $this->mypassword->shuffleArray($array);

printf("\r\n<p>Here's a randomized array: \r\n</p>");

print_r($newArray);

printf("\r\n<p>And here's the same arrays with incremental keys:\r\n</p>");

print_r(array_values($newArray));

/**
 * And we can randomize a string
 */

$string = 'abcdef';
$newString = $this->mypassword->shuffleString($string);

printf("\r\n<p>Here's our randomized string: %s\r\n</p>", $newString);

/**
 * Now, lets do some password hashing.
 */
$password = 'Password';

$hash = $this->mypassword->createPasswordHash($password);

printf("\r\n<p>Here's a hashed password: %s\r\n</p>", $hash);

/**
 * Let's verify the password.  To show that nothing is saved, let's create a new
 * instance of the PasswordLib class.
 */
$PasswordLib2 = new \PasswordLib\PasswordLib;

$result = $PasswordLib2->verifyPasswordHash($password, $hash);

printf("\r\n<p>The result of the password check was: %s\r\n</p>", $result ? 'successful' : 'not successful');

/**
 * Let's use a different format.  Let's try using Drupal's password hash
 */

$hash = $this->mypassword->createPasswordHash($password, '$S$');

printf("\r\n<p>Here's a Drupal hashed password: %s\r\n</p>", $hash);

/**
 * Let's verify the password.  To show that nothing is saved, let's create a new
 * instance of the PasswordLib class.
 */

$result = $PasswordLib2->verifyPasswordHash($password, $hash);

printf("\r\n<p>The result of the Drupal password check was: %s\r\n</p>", $result ? 'successful' : 'not successful');


/**
 * Let's use PBKDF2
 */

$hash = $this->mypassword->createPasswordHash($password, '$pbkdf$');

printf("\r\n<p>Here's a PBKDF2 hashed password: %s\r\n</p>", $hash);

/**
 * Let's verify the password.  To show that nothing is saved, let's create a new
 * instance of the PasswordLib class.
 */

$result = $PasswordLib2->verifyPasswordHash($password, $hash);

printf("\r\n<p>The result of the PBKDF2 password check was: %s\r\n</p>", $result ? 'successful' : 'not successful');


/**
 * Let's set the cost of bcrypt off its default:
 */
$result = $this->mypassword->createPasswordHash($password, '$2a$', array('cost' => 4));

printf("\r\n<p>The result of BCrypt with reduced cost was: %s\r\n</p>", $result);

/**
 * Let's set the cost of bcrypt off its default, again:
 */
$result = $this->mypassword->createPasswordHash($password, '$2a$', array('cost' => 5));

printf("\r\n<p>The result of BCrypt with reduced cost was: %s\r\n</p>", $result);

endblock();

end_extend();
?>