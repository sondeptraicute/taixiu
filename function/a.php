<?PHP
$key = 'xl456ld4k3m345n34bj345345'; // k duoc edit
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vip    = array("10","20","150","400","1000","5000");
$mysqli = new mysqli("localhost","playnroc_tnmx","][{Z+sg[KOk8","playnroc_tnmx");
$mysqli -> set_charset("utf8");


/*Anti bug*/
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$gio = date('h');
$phut= date('i');
$giay= date('s');
$thoigian = ''.$gio.':'.$phut.':'.$giay.' '.$ngay.'/'.$thang.'/'.$nam.'';
$ngaythangnam = ''.$ngay.'/'.$thang.'/'.$nam.'';

function thu($value)
{
    global $mysqli;
    global $ngaythangnam;
    $check = $mysqli->query("SELECT * FROM `doanhthu` WHERE `date` = '".$ngaythangnam."'")->fetch_assoc();
    if($check['id'] <=0)
    {
        $mysqli->query("INSERT INTO `doanhthu` SET `date` = '".$ngaythangnam."', `thu` = '0', `mat` = '0'");
    }
    $mysqli->query("UPDATE `doanhthu` SET `thu` = `thu` + '".$value."' WHERE `date` = '".$ngaythangnam."'");
}

function mat($value)
{
    global $mysqli;
    global $ngaythangnam;
    $check = $mysqli->query("SELECT * FROM `doanhthu` WHERE `date` = '".$ngaythangnam."'")->fetch_assoc();
    if($check['id'] <=0)
    {
        $mysqli->query("INSERT INTO `doanhthu` SET `date` = '".$ngaythangnam."', `thu` = '0', `mat` = '0'");
    }
    $mysqli->query("UPDATE `doanhthu` SET `mat` = `mat` + '".$value."' WHERE `date` = '".$ngaythangnam."'");
    
}

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
    
    public function upwin($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `win` = `win` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
    public function upxu2($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `tien` = `tien` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
}


if($_POST['getgame'] == true)
{
    header('Content-Type: application/json;charset=utf-8');
    $data = $mysqli->query("SELECT * FROM `phien_taixiu`   ORDER by id DESC LIMIT 1")->fetch_assoc();
    $home = $mysqli->query("SELECT * FROM `home`   ORDER by id DESC LIMIT 1")->fetch_assoc();
    if($data['id'] <=0)
    {
        $d->id = 0;
    }
    else
    {
        $d->id =  $data['phien'];
    }
    $d->bot = $home['bot'];
    $d->taixiumax = $home['taixiu_max'];
    $d->taixiu_min = $home['taixiu_min'];
    
    echo json_encode($d);
}

if($_POST['sendgame'] == true)
{
    if($_POST['key'] != $key)
    {
        exit();
    }
    $taixiu = json_decode($_POST['taixiu'],true);
    $log   = json_decode($_POST['cuoc'],true);
    $name = ($taixiu['x3']+$taixiu['x2']+$taixiu['x1'] <=10 ? 'xiu' : 'tai');
    $ketqua = ($taixiu['x3']+$taixiu['x2']+$taixiu['x1'] <=10 ? 'xiu' : 'tai');
     $name2 = ($taixiu['x3']+$taixiu['x2']+$taixiu['x1'] <=10 ? 'xiu2' : 'tai2');
    $ketqua2 = ($taixiu['x3']+$taixiu['x2']+$taixiu['x1'] <=10 ? 'xiu2' : 'tai2');
    
    $data = $mysqli->query("SELECT * FROM `phien_taixiu` WHERE `phien` = '".$taixiu['id']."'   ORDER by id DESC LIMIT 1")->fetch_assoc();
    if($data['id'] <=0)
    {
        
        $mysqli->query("INSERT INTO `phien_taixiu` SET `x1` = '".$taixiu['x1']."', `x2` = '".$taixiu['x2']."', `x3` = '".$taixiu['x3']."', `ketqua` = '".$name."', `phien` = '".$taixiu['id']."', `thoigian` = '".$thoigian."' ");
        $mysqli->query("INSERT INTO `phien_baucua` SET `x1` = '".$taixiu['b1']."', `x2` = '".$taixiu['b2']."', `x3` = '".$taixiu['b3']."', `phien` = '".$taixiu['id']."', `thoigian` = '".$thoigian."' ");

    }
    $listuser = $mysqli->query("SELECT * FROM `nguoichoi`");
    while($d=$listuser->fetch_assoc())
    {
         $u = new users($d['id']);
         $u->upthongtin('tai',0);
         $u->upthongtin('xiu',0);
         $u->upthongtin('tai2',0);
         $u->upthongtin('xiu2',0);
    }
    foreach($log as $id=>$cuoc)
    {
        /*Game bầu cua*/
        if($cuoc['id'] >=1 AND $cuoc['game'] == "baucua")
        {
            $check = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `phien` = '".$taixiu['id']."' AND `uid` = '".$cuoc['id']."'  ORDER by id DESC LIMIT 1")->fetch_assoc();
            if($check['id'] <=0)
            {
                $mysqli->query("INSERT INTO `cuoc_baucua` SET  `phien` = '".$taixiu['id']."', `uid` = '".$cuoc['id']."', `thoigian` = '".$thoigian."'");
            }
            if($cuoc['xu'] >=1)
            {
                $mysqli->query("UPDATE `cuoc_baucua` SET `play_chon".$cuoc['type']."` = `play_chon".$cuoc['type']."` +  '" . $cuoc['xu'] . "' WHERE `phien` = '" . $taixiu['id'] . "' AND `uid`= '".$cuoc['id']."'");
            }
            $hs = 0;
            $nx = 0;
            if($cuoc['type'] == $taixiu['b1'])
            {
                $hs+=1;
            }
            if($cuoc['type'] == $taixiu['b2'])
            {
                $hs+=1;
            }
            if($cuoc['type'] == $taixiu['b3'])
            {
                $hs+=1;
            }
            if($hs ==1) $xn = 1.98;
            else if($hs ==2) $xn = 2.96;
            else if($hs==3) $xn = 3.94;
            if($cuoc['type'] == $taixiu['b1'] or $cuoc['type'] == $taixiu['b2'] or $cuoc['type'] == $taixiu['b3'])
            {
                $u = new users($cuoc['id']);
                $xuwin = $cuoc['xu']*$xn;
                $u->upxu($xuwin);
                $u->upthongtin('baucua_win',$u->thongtin->baucua_win+$xuwin);
                $mysqli->query("UPDATE `cuoc_baucua` SET `xunhan` = `xunhan` + '".$xuwin."' WHERE `phien` = '" . $taixiu['id'] . "' AND `uid`= '".$cuoc['id']."'");
                $u->upthongtin('bc1',0);
                $u->upthongtin('bc2',0);
                $u->upthongtin('bc3',0);
                $u->upthongtin('bc4',0);
                $u->upthongtin('bc5',0);
                $u->upthongtin('bc6',0);
            }
            else
            {
                $u = new users($cuoc['id']);
                $u->upthongtin('baucua_lose',$u->thongtin->baucua_lose+$cuoc['xu']);
                $u->upthongtin('bc1',0);
                $u->upthongtin('bc2',0);
                $u->upthongtin('bc3',0);
                $u->upthongtin('bc4',0);
                $u->upthongtin('bc5',0);
                $u->upthongtin('bc6',0);
            }
            
        }
        /*Đức Nghĩa*/
        //Chưa có dữ liệu, cần mua xin liên hệ DucNghia
        /*Đức Nghĩa*/
        if($cuoc['id'] >=1 AND $cuoc['game'] == 'taixiu')
        {
            $xu2 = 0;
            $xu = 0;
            $hoantra = $cuoc['hoantra'];
            $xunhan = 0;
            $xunhan2 = 0;
            
            if($cuoc['type'] == "xiu" or $cuoc['type'] == "tai")
            {
                $xu = $cuoc['xu'];
                
            if($cuoc['type'] == $name) //win
            {
                $xunhan = $xu*1.98;
                mat($xu*0.98);
                thu($xu*0.02);
                $u = new users($cuoc['id']);
                $u->upthongtin($cuoc['type'],0);
                $u->upthongtin('taixiu_win',$u->thongtin->taixiu_win+$xunhan);
                $u->upxu($xunhan);
                $u->upwin($xu);
                $u->upxu($hoantra);
                
            }
            else // thua
            {
                thu($xu);
                $u = new users($cuoc['id']);
                if($u->win < $xu)
                {
                    $u->upwin(-$u->win);
                }
                else
                {
                    $u->upwin(-$xu);
                }
                $u->upthongtin($cuoc['type'],0);
                $u->upxu($hoantra);
                $u->upthongtin('taixiu_lose',$u->thongtin->taixiu_lose+$xu);

            }
            
                $mmo_ktra = new users($cuoc['id']);
                $mysqli->query("UPDATE `cuoc_taixiu` SET  `ketqua` = '".$name."', `sau` = '".$mmo_ktra->xu."', `xucuoc` =   '" . $xu . "', `hoantra` = '".$hoantra."', `xunhan` =  '".$xunhan."', `code` = '1' WHERE `az` = '".$cuoc['code']."'  ");
                
            }
            
            /*Chơi thử*/
           
             

        }
    }
    
}