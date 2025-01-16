<?php
declare(strict_types = 1);
error_reporting(0);
try{
    function userDetail(string $name1,string $name2,int $age, float $salary): string
    {
    return "Jina langu ni {$name1} - {$name2} na ninaumri wa miaka {$age} na kima cha mshahara wangu ni {$salary}";
    }
    $jina1 = "Emmanueli";
    $jina2 = "Modesti";
    $umri = 26;
    $mshahara = 3500;
    echo userDetail($name1=$jina1,$name2=$jina2,$age=$umri,$salary=$mshahara);

}catch(Exception $e){
    echo "Errors";
}