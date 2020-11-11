<?php
interface LunaInterface
{
    public function count();
}

class Luna implements LunaInterface
{
    private $digit;

    public function __construct($digit)
    {
        $this->digit = $digit;
    }

    public function count()
    {
        // TODO: Implement count() method.
        $number = strrev(preg_replace('/[^\d]+/', '', $this->digit));
        $sum = 0;
        for ($i = 0, $j = strlen($number); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $number[$i];
            } else {
                $val = $number[$i] * 2;
                if ($val > 9)  {
                    $val -= 9;
                }
            }
            $sum += $val;
        }
        return (($sum % 10) === 0);
    }
}

$luna_good = new Luna('4731219615971169');
var_dump($luna_good->count());
$luna_bad = new Luna('4731219615971119');
var_dump($luna_bad->count());