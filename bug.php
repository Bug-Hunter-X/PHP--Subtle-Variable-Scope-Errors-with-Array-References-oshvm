In PHP, a common yet subtle error arises when dealing with variable scope within functions, particularly when using references.  Consider the following:

```php
function modifyArray(array &amp;$arr) {
  $arr[] = 4; 
}

$myArray = [1, 2, 3];
modifyArray($myArray);
print_r($myArray); // Output: Array ( [0] =&gt; 1 [1] =&gt; 2 [2] =&gt; 3 [3] =&gt; 4 )

function modifyArray2(array $arr) {
  $arr[] = 4; 
  return $arr;
}

$myArray = [1, 2, 3];
$myArray = modifyArray2($myArray);
print_r($myArray); // Output: Array ( [0] =&gt; 1 [1] =&gt; 2 [2] =&gt; 3 [3] =&gt; 4 )

function modifyArray3(array $arr) {
  $arr = [5,6,7];
}

$myArray = [1, 2, 3];
modifyArray3($myArray);
print_r($myArray); // Output: Array ( [0] =&gt; 1 [1] =&gt; 2 [2] =&gt; 3 )
```

The crucial difference lies in how `modifyArray` and `modifyArray3` handle the input array.  `modifyArray` uses pass-by-reference (`&amp;`), directly modifying the original array. `modifyArray2` uses pass-by-value, making a copy.  `modifyArray3` reassigns `$arr` inside the function, which *does not* affect the original array because it's passed by value.  Developers often unintentionally use pass-by-value when they think they're modifying the original, leading to unexpected behavior. This is especially problematic when dealing with large datasets or complex data structures where copying can be expensive. 