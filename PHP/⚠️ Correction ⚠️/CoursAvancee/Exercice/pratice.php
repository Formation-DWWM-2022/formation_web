1.

<?php
class MyClass
{
    public function __construct()
    {
        echo 'MyClass class has initialized !' . "\n";
    }
}
$userclass = new MyClass;
?>

2.
<?php
class UserMessage
{
    public $message = 'Hello All, I am ';
    public function introduce($name)
    {
        return $this->message . $name;
    }
}
$mymessage = new UserMessage();
echo $mymessage->introduce('Scott') . "\n";
?>

3.
<?php
class FactorialOfNumber
{
    protected $_n;
    public function __construct($n)
    {
        if (!is_int($n)) {
            throw new InvalidArgumentException('Not a number or missing argument');
        }
        $this->_n = $n;
    }
    public function result()
    {
        $factorial = 1;
        for ($i = 1; $i <= $this->_n; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }
}

$newfactorial = new FactorialOfNumber(5);
echo $newfactorial->result();
?>

4.
<?php
class ArraySort
{
    protected $_asort;

    public function __construct(array $asort)
    {
        $this->_asort = $asort;
    }
    public function alhsort()
    {
        $sorted = $this->_asort;
        sort($sorted);
        return $sorted;
    }
}
$sortarray = new ArraySort(array(11, -2, 4, 35, 0, 8, -9));
print_r($sortarray->alhsort()) . "\n";
?>

5.
<?php
class MyCalculator
{
    private $_fval, $_sval;
    public function __construct($fval, $sval)
    {
        $this->_fval = $fval;
        $this->_sval = $sval;
    }
    public function add()
    {
        return $this->_fval + $this->_sval;
    }
    public function subtract()
    {
        return $this->_fval - $this->_sval;
    }
    public function multiply()
    {
        return $this->_fval * $this->_sval;
    }
    public function divide()
    {
        return $this->_fval / $this->_sval;
    }
}
$mycalc = new MyCalculator(12, 6);
echo $mycalc->add() . "\n"; // Displays 18 
echo $mycalc->multiply() . "\n"; // Displays 72
echo $mycalc->subtract() . "\n"; // Displays 6
echo $mycalc->divide() . "\n"; // Displays 2
?>

