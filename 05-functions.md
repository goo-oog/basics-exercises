# 05 - Functions

[BACK TO LIST](/exercises/basics)

Functions are actions upon call that does accept (optional) value or multiple values and return value (optional).

Reference - https://www.w3schools.com/php/php_functions.asp

###### Exercise 1

Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
Print this value out.

###### Exercise 2

Create a function that accepts 2 integer arguments. First argument is a base value and the second one is a value its been multiplied by.
For example, given argument 10 and 5 prints out 50

###### Exercise 3

Create a person object with name, surname and age. Create a function that will determine if the person has reached 18 years of age.
Print out if the person has reached age of 18 or not.

###### Exercise 4

Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

###### Exercise 5

Create a 2D associative array in 2nd dimension with fruits and their weight.  
Create a function that determines if fruit has weight over 10kg. 
Create a secondary array with shipping costs per weight. Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

###### Exercise 6

Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
Create a function that doubles the integer number.
Within the loop using php in-built function print out the double of the number value (using your custom function).

###### Exercise 7**

Imagine you own a gun store. 
Only certain guns can be purchased with license types.
Create an object (person) that will be the requester to purchase a gun (object)
Person object has a name, valid licenses (multiple) & cash.
Guns are objects stored within an array.
Each gun has license letter, price & name.
Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
