<?PHP
include_once('config.php');

$list_d = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `code` <='0' AND `time` < '".time()."'");
while($cuoc = $list_d->fetch_assoc())
{
    $ktratiep = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `az` = '".$cuoc['az']."'")->fetch_assoc();
    if($ktratiep['code'] <=0)
    {
    $c = new users($cuoc['uid']);
    $x = $c->xu + $cuoc['xucuoc'];
    $mysqli->query("UPDATE `cuoc_taixiu` SET   `sau` = '".$x."', `xucuoc` =   '0', `hoantra` = '".$cuoc['xucuoc']."', `code` = '2' WHERE `az` = '".$cuoc['az']."'  ");
    $c->upxu($cuoc['xucuoc']);
    }
}