# Les bonnes pratiques JavaScript pour les débutants

 1. Use === Instead of ==

JavaScript uses two different kinds of equality operators: === and !== are the strict equality operators, while ==  and != are the non-strict operators. It is considered best practice to always use strict equality when comparing.

    "If two operands are of the same type and value, then === produces true and !== produces false." 

However, when working with == and !=, you'll run into issues when working with different types. When the values you're comparing have different types, the non-strict operators will try to coerce their values, and you may get unexpected results.

 2. eval() Is Bad

For those unfamiliar, the eval() function gives us access to JavaScript's compiler. Essentially, we can execute a string's result by passing it as a parameter of eval().

Not only will this decrease your script's performance substantially, but it also poses a huge security risk because it grants far too much power to the passed-in text. Avoid it!

3. Don't Use Shorthand

Technically, you can get away with omitting most curly braces and semi-colons. Most browsers will correctly interpret the following:

```js	
if (someVariableExists)
   x = false
```

However, consider this:

```js	
if (someVariableExists)
   x = false
   anotherFunctionCall();
```

You might think that the code above would be equivalent to:

```js	
if (someVariableExists) {
   x = false;
   anotherFunctionCall();
}
```

Unfortunately, you'd be wrong. In reality, it means:

```js	
if (someVariableExists) {
   x = false;
}
anotherFunctionCall();
```

As you'll notice, the indentation mimics the functionality of the curly brace. Needless to say, this is a terrible practice that should be avoided at all costs. The only time that curly braces should be omitted is with one-liners, and even this is a highly debated topic.

```js	
if(2 + 2 === 4) return 'nicely done';
```

Always Consider the Future

What if, at a later date, you need to add more commands to this if statement? In order to do so, you would need to rewrite this block of code. Bottom line—tread with caution when omitting.

 4. Use JSLint

JSLint is a debugger written by Douglas Crockford. Simply paste in your script, and it'll quickly scan for any noticeable issues and errors in your code.

    "JSLint takes a JavaScript source and scans it. If it finds a problem, it returns a message describing the problem and an approximate location within the source. The problem is not necessarily a syntax error, although it often is. JSLint looks at some style conventions as well as structural problems. It does not prove that your program is correct. It just provides another set of eyes to help spot problems." - JSLint Documentation

Before signing off on a script, run it through JSLint just to be sure that you haven't made any careless mistakes.

5. Place Scripts at the Bottom of Your Page

This tip has already been recommended in the previous article in this series. As it's highly appropriate, though, I'll paste in the information.

```js
<p>And now you know my favorite kinds of corn. </p>
<script type="text/javascript" src="path/to/file.js"></script>
<script type="text/javascript" src="path/to/anotherFile.js"></script>
</body>
</html>
```

Remember—the primary goal is to make the page load as quickly as possible for the user. When loading a script, the browser can't continue until the entire file has been loaded. Thus, the user will have to wait longer before noticing any progress.

If you have JS files whose only purpose is to add functionality—for example, after a button is clicked—go ahead and place those files at the bottom, just before the closing body tag. This is absolutely a best practice.

6. Declare Variables Outside of the For Statement

When executing lengthy for statements, don't make the engine work any harder than it must. For example:
### Bad
```js	
for(let i = 0; i < someArray.length; i++) {
   let container = document.getElementById('container');
   container.innerHtml += 'my number: ' + i;
   console.log(i);
}
```

Notice how we must determine the length of the array for each iteration, and how we traverse the DOM to find the "container" element each time—highly inefficient!
### Better
```js	
let container = document.getElementById('container');
for(let i = 0, len = someArray.length; i < len;  i++) {
   container.innerHtml += 'my number: ' + i;
   console.log(i);
}
```

 7. Use Template Literals

Strings that we create with double or single quotes have a lot of limitations. You might want to replace some of your strings with template literals to make working with them a lot easier. Template literals are created using the backtick character (`), and they offer many advantages. You can put expressions inside them or create multi-line strings.

```js	
let person = 'Monty';
let fruits = 'apples';
let activity = 'playing games';
let day = 'Monday';
 
let sentence1 = person + ' will be eating ' + fruits + ' and ' + activity + ' on ' + day + '.';
console.log(sentence1);
// Output: Monty will be eating apples and playing games on Monday.
 
let sentence2 = `${person} will be eating ${fruits} and ${activity} on ${day}.`;
console.log(sentence2);
// Output: Monty will be eating apples and playing games on Monday.
```

As you can see, we did not have to constantly move in and out of our template literal, as we had to with a regular string literal created with single or double quotes. This reduces the chances of any typing-related errors and helps us write cleaner code.

8. Consider Using let and const 

The let keyword allows us to create local variables that are scoped within their own block. The const keyword allows us to create local block-scoped variables whose value cannot be reassigned. You should consider using the let and const keywords in appropriate situations when declaring your variables. Keep in mind that the const keyword only prevents reassignment. It does not make the variable immutable.

```js
var person_name = "Adam";
let name_length = person_name.length;
const fav_website = "code.tutsplus.com";
 
if(person_name.length < 5) {
    var person_name = "Andrew";
    let name_length = person_name.length;
     
    // Throws an error if not commented out!
    // fav_website = "webdesign.tutsplus.com";
 
    console.log(`${person_name} has ${name_length} characters.`);
    // Output: Andrew has 6 characters.
}
 
console.log(`${person_name} has ${name_length} characters.`);
// Output: Andrew has 4 characters.
```

In the above example, the value of the person_name variable was updated outside the if block as well, after we modified it inside the block. On the other hand, name_length was block-scoped, so it retained its original value outside the block.

Since the inception of the language, JavaScript developers have used var to declare variables. The keyword var has its quirks, the most problematic of those being the scope of the variables created by using it.

```js
var x = 10
if (true) {
  var x = 15 // inner declaration overrides declaration in parent scope
  console.log(x) // prints 15
}
console.log(x) // prints 15
```

Since variables defined with var are not block-scoped, redefining them in a narrower scope affects the value of the outer scope.

Now we have two new keywords that replace var, namely let and const that do not suffer from this drawback.

```js
let y = 10
if (true) {
  let y = 15 // inner declaration is scoped within the if block
  console.log(y) // prints 15
}
console.log(y) // prints 10
```

const and let differ in the semantics that variables declared with const cannot be reassigned in their scope. This does not mean they are immutable, only that their references cannot be changed.
```js
const x = []

x.push('Hello', 'World!')
x // ["Hello", "World!"]

x = [] // TypeError: Attempted to assign to readonly property.
```

 9. Comment Your Code

It might seem unnecessary at first, but trust me, you want to comment your code as well as possible. What happens when you return to the project months later, only to find that you can't easily remember what your line of thinking was? Or what if one of your colleagues needs to revise your code? Always, always comment important sections of your code.

```js	
// Cycle through array and echo out each name. 
for(var i = 0, len = array.length; i < len; i++) {
   console.log(array[i]);
}
```

 10. Use {} Instead of new Object()

There are multiple ways to create objects in JavaScript. Perhaps the more traditional method is to use the new constructor, like so:

```js		
var o = new Object();
o.name = 'Jeffrey';
o.lastName = 'Way';
o.someFunction = function() {
   console.log(this.name);
}
```

However, this method receives the "bad practice" stamp. It's not actually harmful, but it is a bit verbose and unusual. Instead, I recommend that you use the object literal method.
### Better

```js
var o = {
   name: 'Jeffrey',
   lastName = 'Way',
   someFunction : function() {
      console.log(this.name);
   }
};
```

Note that if you simply want to create an empty object, {} will do the trick.

```js	
var o = {};
```

    "Object literals enable us to write code that supports lots of features yet still provide a relatively straightforward process for the implementers of our code. No need to invoke constructors directly or maintain the correct order of arguments passed to functions."

 11. Use [] Instead of new Array()

The same applies for creating a new array.
### Okay
```js		
var a = new Array();
a[0] = "Joe";
a[1] = 'Plumber';
```

### Better
```js	
var a = ['Joe','Plumber'];
```

    "A common error in JavaScript programs is to use an object when an array is required or an array when an object is required. The rule is simple: when the property names are small sequential integers, you should use an array. Otherwise, use an object." 

 12. Use the Spread Operator

Have you ever been in a situation where you wanted to pass all the items of an array as individual elements to some other function or you wanted to insert all the values from one array into another? The spread operator (...) allows us to do exactly that. Here is an example:
```js	
let people = ["adam", "monty", "andrew"]
let more_people = ["james", "jack", ...people, "sajal"]
 
console.log(more_people)
// Output: Array(6) [ "james", "jack", "adam", "monty", "andrew", "sajal" ]
```

13. Raw JavaScript Is Always Quicker Than Using a Library

JavaScript libraries, such as jQuery and lodash, can save you an enormous amount of time when coding—especially with AJAX operations. Having said that, always keep in mind that a library can never be as fast as raw JavaScript (assuming you code correctly).

jQuery's each() method is great for looping, but using a native for statement will always be an ounce quicker.

 14. Iterators and for ... of Loops

Iterators in JavaScript are objects which implement the next() method to return an object that stores the next value in a sequence and true or false depending on whether or not there are any more values left. This means that you can create your own iterator objects if you implement the iterator protocol.

JavaScript also has some built-in iterators like String, Array, Map, etc. You can iterate over them using for ... of loops. This is more concise and less error-prone compared to regular for loops.

```js
let people = ["Andrew", "Adam", "James", "Jack"];
let people_count = people.length;
 
for(let i = 0; i < people_count; i++) {
    console.log(people[i]);
}
/*
Andrew
Adam
James
Jack
*/
 
for(person of people) {
    console.log(person);
}
/*
Andrew
Adam
James
Jack
*/
```

With a for...of loop, we don't have to keep track of the total length of the array or the current index. This can reduce code complexity when creating nested loops.

 15. Use Arrow Functions

Another essential feature added to JavaScript recently is arrow functions. They come with a slew of benefits. To begin with, they make the functional elements of JavaScript more appealing to the eye and easier to write.

Take a look at how we would implement a filter without arrow functions:

```js	
const nums = [1,2,3,4,5,6,7,8];
 
const even_nums = nums.filter( function (num) { return num%2 == 0; } )
```

Here, the callback function we pass to the filter returns true for any even number.

Arrow functions make this much more readable and concise though: 
```js	
const nums = [1,2,3,4,5,6,7,8];
 
const even_nums = nums.filter(num => num%2 == 0)
```

Another notable benefit of arrow functions is that they do not define a scope, instead being within the parent scope. This prevents many of the issues that can occur when using the this keyword. There are no bindings for this in the arrow functions. this has the same value inside the arrow function as it does in the parent scope. However, this means arrow functions can't be used as constructors or methods.

 16. Put JavaScript in a Separate File

JavaScript can be written in a `<script>` tag in your HTML, or it can be kept in its own file and linked within your HTML. This helps keep different sorts of code isolated from one another this manner, and makes your code more understandable and well-organized.

Keeping your JavaScript in separate files outside of the HTML facilitates the reuse of code across multiple HTML files. It provides for easier code reading, and it saves loading time since web browsers can cache external JavaScript files.

I've seen developers use the delete method to remove an item from an array. This is incorrect, because the delete function substitutes the object with undefined rather than removing it. In JavaScript, the best approach to remove an element from an array based on its value is to use the indexOf() function to discover the index number of that value in the array, and then use the splice() function to delete that index value.
```js
var items = ["apple","orange","berries","strawberry"];
items.splice(2,1);

console.log(items);
//output: ['apple', 'orange', 'strawberry']
```

 17. Null-ish coalescing

Before introducing the null-ish coalescing operator, JavaScript developers used the OR operator || to fall back to a default value if the input was absent. This came with a significant caveat that even legitimate but falsy values would result in a fallback to the defaults.

```js
function print(val) {
  return val || 'Missing'
}

print(undefined) // 'Missing'
print(null) // 'Missing'

print(0) // 'Missing'
print('') // 'Missing'
print(false) // 'Missing'
print(NaN) // 'Missing'
```

JavaScript has now proposed the null coalescing operator ??, which offers a better alternative in that it only results in a fallback if the preceding expression is null-ish. Here null-ish refers to values that are null or undefined.

```js
function print(val) {
  return val ?? 'Missing'
}

print(undefined) // 'Missing'
print(null) // 'Missing'

print(0) // 0
print('') // ''
print(false) // false
print(NaN) // NaN
```

This way, you can ensure that if your program accepts falsy values as legitimate inputs, you won't end up replacing them with fallbacks.

 18. Named capture groups

Let's start with a quick recap of capture groups in regular expressions. A capture group is a part of the string that matches a portion of regex in parentheses.

```js
let re = /(\d{4})-(\d{2})-(\d{2})/
let result = re.exec('Pi day this year falls on 2021-03-14!')

result[0] // '2020-03-14', the complete match
result[1] // '2020', the first capture group
result[2] // '03', the second capture group
result[3] // '14', the third capture group
```

Regular expressions have also supported named capture groups for quite some time, which is a way for the capture groups to be referenced by a name rather than an index. Now, with ES9, this feature has made its way to JavaScript. Now the result object contains a nested groups object where each capture group's value is mapped to its name.

```js
let re = /(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/
let result = re.exec('Pi day this year falls on 2021-03-14!')

result.groups.year // '2020', the group named 'year'
result.groups.month // '03', the group named 'month'
result.groups.day // '14', the group named 'day'
```

The new API works beautifully with another new JavaScript feature, de-structured assignments.

```js
let re = /(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/
let result = re.exec('Pi day this year falls on 2021-03-14!')
let { year, month, day } = result.groups

year // '2020'
month // '03'
day // '14'
```

19. L’opérateur ternaire

Tout le monde connaît et utilise les conditions avec le fameux identifiant “if”. Mais connaissez-vous son raccourci appelé ternaire ?

Ce raccourci utilisable sur une ligne permet d’écrire un if et son else de manière succincte. Cependant, faites attention, écrire un code compact est préférable en cas de condition très simple, mais en cas de condition multiple et/ou complexe, il vaut mieux utiliser un if classique.

![image](https://miro.medium.com/max/1400/1*K_4lUTwp8q_vOD7EKAcxSQ.png)

20. Afficher dans la console

La console est un outil vital à tout développeur JavaScript. C’est un outil puissant qui permet de débugger son code de manière efficace. Mais peu de développeurs utilisent pleinement la puissance de cet outil.

Cet outil possède plusieurs méthodes qui lui sont propres et qui sont chacune adaptées à des problématiques différentes.

La méthode la plus connue est le console.log(). Cette méthode permet d’afficher un message ou des variables de manière non formatées dans la console.

Pour afficher des tableaux, on utilise la méthode console.table(). Cette méthode permet de formater des tableaux afin de pouvoir les lire simplement.

Pour afficher des erreurs, on utilise la méthode console.error(). Cette méthode affiche un message formaté comme une erreur. On peut l’utiliser dans le cadre de try catch notamment.

Pour nettoyer la console, on utilise la méthode console.clear(). Cela supprime tous les messages précédents de la console.

21. Suivre les nouveautés ECMAScript

Pour maintenir un bon niveau de compétences en JavaScript et s’assurer d’être à jour des dernières nouveautés, le mieux à faire reste encore de suivre les actualités de ECMAScript. ECMAScript est un ensemble de normes lié aux langages de scripts. De manière régulière, il y a des nouvelles normes et des nouvelles façons de coder qui résolvent des problèmes. La prochaine version de ECMAScript sera ECMAScript 2022.
