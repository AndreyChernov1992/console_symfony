<?php
namespace Console\App;

class Reverse 
{
    public function reverse($string) 
    {
        $reversedStrings = explode(" ", $string);

    foreach ($reversedStrings as &$word) 
    {
        $chars = str_split($word, 1);
        $filteredChars = [];
        foreach (array_reverse($chars) as $char) 
        {
            if (ctype_alpha($char)) {
                $filteredChars[] = $char;
            }
        }
        foreach ($chars as &$char) 
        {
            if (!ctype_alpha($char)) 
            {
                
                continue;
            }
            $char = array_shift($filteredChars);
        }
        $word = implode("", $chars);
        }

        return implode(" ", $reversedStrings);
        }
}