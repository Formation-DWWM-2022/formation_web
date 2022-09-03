<?php
// class User
// {

//     // The class properties.
//     public $firstName;

//     public $lastName;

//     // A method that says hello to the user $firstName.
//     // The user $firstName property can be approached with the $this keyword.
//     public function hello()
//     {
//         return "hello, " .  $this->firstName;
//     }
// }

// // Create a new object.
// $user1 = new User();

// // Set the user $firstName and $lastName properties.
// $user1->firstName = "Jonnie";
// $user1->lastName = "Roe";

// // Echo the hello() method.
// echo $user1->hello();

// class User
// {
//     // We use the private access modifier in order to prevent code from outside
//     // the class from modifying the property’s value.
//     private $firstName;

//     // A public setter method allows us to set the $firsName property.
//     public function setFirstName($str)
//     {
//         $this->firstName = $str;
//     }

//     // A public getter method allows us to return the $firsName property.
//     public function getFirstName()
//     {
//         return $this->firstName;
//     }
// }

// $user1 = new User();
// $user1->setFirstName("Joe");
// echo $user1->getFirstName();

// class User
// {
//     private $firstName;
//     private $lastName;

//     public function __construct($firstName, $lastName)
//     {
//         $this->firstName = $firstName;
//         $this->lastName = $lastName;
//     }

//     public function getFullName()
//     {
//         return $this->firstName . " " . $this->lastName;
//     }
// }

// $user1 = new User("John", "Doe");

// echo $user1->getFullName();

// class User
// {
//     private $username; // ou protected $username

//     public function setUsername($name)
//     {
//         $this->username = $name;
//     }

//     public function getUsername()
//     {
//         return $this->username;
//     }
// }


// class Admin extends User
// {
//     public function expressYourRole()
//     {
//         return strtolower(__CLASS__);
//     }

//     public function sayHello()
//     {
//         return "Hello admin, " . $this->getUsername(); // $this->username
//     }
// }


// $admin1 = new Admin();
// $admin1->setUsername("Balthazar");
// echo $admin1->sayHello();

// abstract class User
// {
//     protected $username;

//     abstract public function stateYourRole();

//     public function setUsername($name)
//     {
//         $this->username = $name;
//     }

//     public function getUsername()
//     {
//         return $this->username;
//     }
// }

// class Admin extends User
// {
//     public function stateYourRole()
//     {
//         return "admin";
//     }
// }

// class Viewer extends User
// {
//     public function stateYourRole()
//     {
//         return strtolower(__CLASS__);
//     }
// }

// $admin1 = new Admin();
// $admin1->setUsername("Balthazar");
// echo $admin1->stateYourRole();

// class User
// {
//     protected $username;

//     public function setUsername($name)
//     {
//         $this->username = $name;
//     }

//     public function getUsername()
//     {
//         return $this->username;
//     }
// }

// interface Author
// {
//     public function setAuthorPrivileges($array);

//     public function getAuthorPrivileges();
// }


// interface Editor
// {
//     public function setEditorPrivileges($array);

//     public function getEditorPrivileges();
// }

// class AuthorEditor extends User implements Author, Editor
// {
//     private $authorPrivilegesArray = array();

//     private $editorPrivilegesArray = array();

//     public function setAuthorPrivileges($array)
//     {
//         $this->authorPrivilegesArray = $array;
//     }

//     public function getAuthorPrivileges()
//     {
//         return $this->authorPrivilegesArray;
//     }

//     public function setEditorPrivileges($array)
//     {
//         $this->editorPrivilegesArray = $array;
//     }

//     public function getEditorPrivileges()
//     {
//         return $this->editorPrivilegesArray;
//     }
// }

// $user1 = new AuthorEditor();
// $user1->setUsername("Balthazar");
// $user1->setAuthorPrivileges(array("write text", "add punctuation"));
// $user1->setEditorPrivileges(array("edit text", "edit punctuation"));

// $userName  = $user1->getUsername();
// $userPrivileges = array_merge(
//     $user1->getAuthorPrivileges(),
//     $user1->getEditorPrivileges()
// );

// echo $userName . " has the following privileges: ";
// echo implode(", ", $userPrivileges);
// echo ".";

abstract class User
{
    protected $scores           = 0;
    protected $numberOfArticles = 0;

    public function setNumberOfArticles($int)
    {
        // Cast to integer type
        $numberOfArticles = (int)$int;
        $this->numberOfArticles = $numberOfArticles;
    }

    public function getNumberOfArticles()
    {
        return $this->numberOfArticles;
    }

    // The abstract method.
    abstract public function calcScores();
}

class Author extends User
{
    public function calcScores()
    {
        return $this->scores = $this->numberOfArticles * 10 + 20;
    }
}

class Editor extends User
{
    public function calcScores()
    {
        return $this->scores = $this->numberOfArticles * 6 + 15;
    }
}

$author1 = new Author();
$author1->setNumberOfArticles(8);
echo $author1->calcScores();

$editor1 = new Editor();
$editor1->setNumberOfArticles(15);
echo $editor1->calcScores();
