The solution focuses on understanding and consistently applying pass-by-reference when intending to directly modify an array within a function, and using return values to update the array.  If you intend to modify the original array, always use pass-by-reference.

```php
//Correct usage of pass-by-reference:
function modifyArrayCorrectly(array &amp;$arr) {
  $arr[] = 4; // Modifies the original array
}

//Correct usage of pass-by-value with return value:
function modifyArrayCorrectly2(array $arr) {
  $arr[] = 4; 
  return $arr;// Returns the modified array
}

$myArray = [1, 2, 3];
modifyArrayCorrectly($myArray);
print_r($myArray); // Output: Array ( [0] =&gt; 1 [1] =&gt; 2 [2] =&gt; 3 [3] =&gt; 4 )

$myArray = [1, 2, 3];
$myArray = modifyArrayCorrectly2($myArray);
print_r($myArray); // Output: Array ( [0] =&gt; 1 [1] =&gt; 2 [2] =&gt; 3 [3] =&gt; 4 )
```

Always make your intentions clear by either using pass-by-reference explicitly or returning a new modified array. Avoid implicit modifications to prevent confusion and maintain code clarity.