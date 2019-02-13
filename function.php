<?php

          
function A_plus_B($a, $b) {//A plus B
    
    return $a . ' + ' . $b . ' = ' . ($a + $b);
    
}

function A_minus_B($a, $b) {//A minus B
    
    return $a . ' - ' . $b . ' = ' . ($a - $b);
    
}

function A_multiplyBy_B($a, $b) { //A multiply by B
    
    return $a . ' * ' . $b . ' = ' . ($a * $b);
    
}

function A_divideBy_B($a, $b) { //A divide by B
    
    return $a . ' / ' . $b . ' = ' . ($a / $b);
    
}

function emptyVariableCheck($a, $b) {
    
   return !empty($a) && !empty($b);
    
}

function numericCheck($variable) {
    
    return is_numeric($variable);
    
}

function operationChecking($operation) {
    
    return !empty($operation);
    
}

function CheckingAllArguments() {
    
    return variableChecking($a, $b) && operationChecking($operation);
    
}