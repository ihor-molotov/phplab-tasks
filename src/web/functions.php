<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    $first_letters_array = [];
    foreach ($airports as $airport) {
        $letter_value = substr($airport['name'], 0 , 1 );
        if(!in_array($letter_value,$first_letters_array )) {
            $first_letters_array[] = $letter_value;
        }
    }
    sort($first_letters_array);
    return $first_letters_array;
}