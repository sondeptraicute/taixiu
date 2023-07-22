<?PHP
/*
Tác giả : Trần Đỗ Đức Nghĩa.
Emaill  : trandoducnghia@gmail.com.
*/
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vip    = array("10","20","150","400","1000","5000");
$mysqli = new mysqli("localhost","playnroc_tnmx","][{Z+sg[KOk8","playnroc_tnmx");
$mysqli -> set_charset("utf8");
$tien = $_SESSION['tien'] >=1 ? 1 : 0;
/*Bug*/
$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SERVER['PHP_SELF'];
$check_log = $mysqli->query("SELECT * FROM `log` WHERE `ip` = '".$ip."' AND `uid` = '".$_SESSION['id']."' AND `url` = '".$url."' AND `get1` = '".json_encode($_GET)."' AND `post` = '".json_encode($_POST)."' ")->fetch_assoc();
if($check_log['id'] <=0)
{
    $mysqli->query("INSERT INTO `log` SET `ip` = '".$ip."', `uid` = '".$_SESSION['id']."', `url` = '".$url."', `get1` = '".json_encode($_GET)."', `post` = '".json_encode($_POST)."' ");
}

if(isset($_POST)){
foreach($_POST as $index => $value){
if(is_string($_POST[$index])){
    if($index != "taixiu" AND $index !="cuoc")
    {
        $_POST[$index]=$mysqli->real_escape_string($_POST[$index]);
    }


}
}
}
if(isset($_GET)){
foreach($_GET as $index => $value){
if(is_string($_GET[$index])){
$_GET[$index]=$mysqli->real_escape_string($_GET[$index]);
}
}
}

/*Anti bug*/
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$gio = date('h');
$phut= date('i');
$giay= date('s');
$thoigian = ''.$gio.':'.$phut.':'.$giay.' '.$ngay.'/'.$thang.'/'.$nam.'';
$ngaythangnam = ''.$ngay.'/'.$thang.'/'.$nam.'';
$id = $_SESSION['id'];
$kmess = $_SESSION['kmess'] > 5 && $_SESSION['kmess'] < 10 ? $_SESSION['kmess'] : 10;
$page = isset($_REQUEST['p']) && $_REQUEST['p'] > 0 ? intval($_REQUEST['p']) : 1;
$start = isset($_REQUEST['p']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
if($id >=1)
{
    $datauser = new users($id);
    $user     = $datauser;
    $uid      = $id;
    $u        = $user;
    $check_login = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_SESSION['id']."'")->fetch_assoc();
    if($check_login['id'] <=0)
    {
        session_destroy();
    }
}

$admin = 0;
if($_SESSION['admin'] >=1)
{
    $admin = $mysqli->query("SELECT * FROM `admin` WHERE `id` = '".$_SESSION['admin']."'")->fetch_assoc();
}
/*Sử lý tiền tài xỉu*/

class users
{
    public $id;
    public function users($id)
    {
        global $mysqli;
        $users = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '" . $id . "'")->fetch_array();
        foreach($users as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->thongtin = json_decode($this->thongtin);
        if (!isset($this->thongtin)) 
        {
            $this->thongtin = new stdClass();
        }
    }
    
    public function up($name, $value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `$name` = '".$value."' WHERE `id` = '" . $this->id . "'");
    }
    
    public function info()
    {
        return $this->id;
    }
    
    public function upthongtin($name,$value)
    {
        global $mysqli;
        $this->thongtin->$name = $value;
        $mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '" . json_encode($this->thongtin,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu2($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `tien` = `tien` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
}

function az($length = 10) {

return md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length));

}

function tron($k)
{
    if($k < 1000) return $k;
    else if($k>=1000 AND $k < 1000000) return number_format($k/1000).'K';
    else if($k>=1000000) return number_format($k/1000000).'M';
}


function trang($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'p=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt; Trang Tr&#432;&#7899;c');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, 'Trang Ti&#7871;p &gt;&gt;');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}
