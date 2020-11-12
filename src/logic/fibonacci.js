//function to calculate the first n values of the fibonacci series
//taken from https://www.w3resource.com/javascript-exercises/javascript-recursion-function-exercise-6.php
var fibonacci_series = function (n) {
    if (n === 0) {
        return [0];
    }
    else if (n === 1) {
        return [0, 1];
    }
    else {
        //recursevly call the function
        var s = fibonacci_series(n - 1);
        s.push(s[s.length - 1] + s[s.length - 2]);
        return s;
    }
};

export default fibonacci_series;