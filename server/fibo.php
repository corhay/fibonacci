<?php
// PHP code to get the Fibonacci series

class fibonacci{

    //calculates the value of the fibo series after $number iterrations

    function __construct()
    {

    }

    private function Fibonacci($number){

        // if and else if to generate first two numbers 
        if ($number == 0)
            return 0; 
        else if ($number == 1) 
            return 1;
        else
            $previous = 0;
            $current = 1;
            $next = $previous + $current;

            //simple loop to calulate the sequence value
            for($i=1;$i<$number;$i++){
                $previous = $current;
                $current = $next;
                $next = $previous + $current;
            }

            return $current;
    }

    //calculates the n first values of the fibonacci sequence to send to client
    public function sendSequence($number){

        //get all values of the fibo sequence that can be stored in a float
        $sequence = array();
        for($i = 0; $i < $number; $i++){
            array_push($sequence, $this->Fibonacci($i));
        }
        
        //return array of sequence
        return $sequence;
    }

}

?>