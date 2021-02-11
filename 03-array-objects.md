# 03 - ARRAY & OBJECTS

[BACK TO LIST](/exercises/basics)

Reference - https://www.w3schools.com/php/php_arrays.asp  

Array or object is a container that contains multiple sets of values.  

Definition of an array
```php
<?php

$items = []; // Since 5.6 version
$list = array(); // old way
```

###### Exercise 1

Create a non-associative array with 3 integer values and display the total sum of them.

###### Exercise 2

Given array

```php
<?php

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
```

Using dump method, dump out all 3 values.

###### Exercise 3

Given object

```php
<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->surname = 50;
```

Using dump method, dump out all 3 values.

###### Exercise 4

Given array  
```php
<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
```

Program should display concatenated value of - Jane Doe 41

###### Exercise 5

Given array  
```php
<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
```

Program should display concatenated value of - John & Jane Doe`s