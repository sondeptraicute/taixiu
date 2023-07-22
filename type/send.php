<?PHP
include_once('../function/config.php');
if(isset($_GET['vq']))
{
    echo 'Chức năng đang cập nhật...';
}
if(isset($_GET['cuocthoigian']))
{
    header('Content-Type: application/json;charset=utf-8');
    $xu  = $_POST['tiencuoc'];
    $so  = $_POST['so'];
    if($id <=0)
    {
        $d->msg = 'vui lòng đăng nhập để tiếp tục';
        $d->type = 'canhbao';
    }
    else
    if($xu <=0)
    {
        $d->msg = 'Số xu cược không hợp lệ';
        $d->type = 'canhbao';
    }
    else
    if($so <0 or $so>99)
    {
        $d->type = 'canhbao';
        $d->msg = 'Số phải từ 00-99';
    }
    else
    if($datauser->xu < $xu)
    {
        $d->type = 'canhbao';
        $d->msg = 'Tài khoản của bạn không có đủ tiền để cược';
    }
    else
    if($gio <=18)
    {
        $d->type = 'canhbao';
        $d->msg = 'Bạn chỉ có thể cược vào lúc 0h->17h59p';
    }
    else
    {
        $datauser->upxu(-$xu);
        $mysqli->query("INSERT INTO `xoso` SET `ngay` = '".$ngaythangnam."', `uid` = '".$id."', `xu` = '".$xu."', `so` ='".$so."'");
        $d->type = 'thanhcong';
        $d->msg = 'Đặt cược thành công, chúc bạn may mắn.';
    }
    echo json_encode($d);
}
if(isset($_GET['xoso']))
{
    $ls = $mysqli->query("SELECT * FROM `xoso` WHERE `uid` = '".$id."' AND `ngay` = '".$ngaythangnam."'");
    while($lx = $ls->fetch_assoc())
    {
        $sx.='<tr><td>'.$lx['so'].'</td> <td>'.number_format($lx['xu']).'</td> <td>'.number_format($lx['xuwin']).'</td> <td>'.number_format($lx['ketqua']).'</td>  <td><font color="puprple">'.($lx['trangthai']==0 ? 'Chờ' : '</font>').' <font color="green">'.($lx['trangthai']==1 ? 'Thắng' : '</font>').' <font color="red">'.($lx['trangthai']==2 ? 'Thua' : '</font>').' </td></tr>';
    }
    echo'<div class="row"  style="margin-right: 0px;">
					<div class="col-sm-5">
						<div class="row">
							<div class="wheel"></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="col-sm-6">
											<button type="button" style="margin-bottom:2px" class="btn btn-success btn-block xu-spin-button"> '.$thoigian.'</button>
										</div>
										
									</div>
								</div>
							</div>	
							
							
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 col-sm-offset-1 col-xs-10 col-xs-offset-1">
								<div class="form-group">
									<div class="input-group">
										<input type="number" name="code" value="" id="so" min="00" max="99" placeholder="Kết Quả XSMB từ 00-99" class="form-control"/>
											<input type="number" name="tiencuoc" id="tiencuoc" placeholder="Tiền cược" class="form-control"/>
										
											<button id="quaythuong_btn_kiemtra" class="btn btn-success mr-2" onclick="cuoc()" type="button">Cược!</button>
										<link rel="stylesheet" type="text/css" href="//www.minhngoc.com.vn/style/bangketqua_mini.css"/><div id="box_kqxs_minhngoc"><script language="javascript"> 	bgcolor="#bfbfbf";titlecolor="#730038";dbcolor="#000000";fsize="12px";kqwidth="300px"; </script><script language="javascript" src="//www.minhngoc.com.vn/getkqxs/mien-bac.js"></script></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<h4 style="background-color: #accbe6; margin: 0px; padding: 5px;">
							Lịch sử đặt  <b class="luot-con" style="color: blue">'.$ngaythangnam.'</b>  <br>(Kết quả chỉ tính 2 số cuối của giải đặc biệt)
						</h4>
						<table class="table table-bodered table-hover table-condensed">
							<thead>
								<tr>
							     	<th>Số chọn</th>
									<th>Xu cược</th>
									<th>Xu nhận</th>
									<th>Kết quả</th>
									<th>Trạng thái</th>
								</tr>							
							</thead>
							<tbody id="quayThuong_tableContent"> '.$sx.'</tbody>
						</table>
					</div>
					<center><a href="/game/lichsu_xoso" class="btn btn-success mr-2" type="submit" style="margin-top:5px" id="thaiBtn">Xem Lịch Sử Cược</a></center>
				</div>';
}
if(isset($_GET['tien']))
{
    if($tien ==0)
    {
        echo'Đổi sang tiền chơi thử thành công.';
        $_SESSION['tien'] =1;
    }
    else
    {
        echo'Đổi sang tiền chơi thật thành công.';
        $_SESSION['tien']= 0;
        
    }
}
if(isset($_GET['chat']))
{
    header('Content-Type: application/json;charset=utf-8');
    $chat = htmlspecialchars($_POST['chat']);
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(strlen($chat) <=2)
    {
        $msg = 'Nội dung chát phải lớn hơn 2 kí tự.';
        $type = 'canhbao';
    }
    else
    if(strlen($chat) >=500)
    {
        $msg = 'Nội dung bạn nhập quá dài';
        $type='thongtin';
    }
    else
    {
        $type = 'thanhcong';
        $d->center = '<b>'.($datauser->{'do'} >=1 ? '<font color="red">'.$datauser->taikhoan.'</font>' : ''.$datauser->taikhoan.'').'</b> : '.$chat.'<hr>';
        $d->notice = ''.($datauser->{'do'} >=1 ? '<font color="red">'.$datauser->taikhoan.'</font>' : ''.$datauser->taikhoan.'').' : '.$chat.' ';
        $mysqli->query("INSERT INTO `chat` SET `noidung` = '".$chat."', `username` = '".$datauser->taikhoan."', `do` = '".$datauser->{'do'}."' ");
    }
    $d->msg = $msg;
    $d->type = $type;
    echo json_encode($d);
}
if(isset($_GET['doipass']))
{
    header('Content-Type: application/json;charset=utf-8');
    $cu = $_POST['cu'];
    $matkhau = $_POST['matkhau'];
    $matkhau2 = $_POST['matkhau2'];
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(empty($matkhau) or empty($matkhau2))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'canhbao';
    }
    else
    if(strlen($matkhau) <= 4)
    {
        $msg = 'Mật khẩu phải lớn hơn 4 kí tự';
        $type = 'canhbao';
    }
    else
    if($matkhau != $matkhau2)
    {
        $msg = 'Mật khẩu mới nhập chưa chính xác';
        $type = 'thongtin';
    }
    else
    if(md5($cu) != $datauser->thongtin->matkhau)
    {
        $msg = 'Mật khẩu cũ nhập không chính xác';
        $type = 'thongtin';
    }
    else
    {
        $msg = 'Thay đổi mật khẩu thành công';
        $type ='thanhcong';
        $datauser->upthongtin('matkhau',md5($matkhau));
    }
    
    $d->msg = $msg;
    $d->type = $type;
    echo json_encode($d);
}
if(isset($_GET['loadlix_rut']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `logrut` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['id'].' </td><td>'.$phien['thoigian'].' </td> <td>'.$phien['ten'].' </td> <td>'.number_format($phien['vnd']).' </td>   <td>'.($phien['code']==0 ? 'Chờ' : '').' '.($phien['code']==1 ? 'Thành công' : '').' '.($phien['code']==2 ? 'Hủy' : '').' </td>  </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}
if(isset($_GET['ruttien']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $loai = $_POST['loai'];
    $stk = $_POST['stk'];
    $ctk = $_POST['ctk'];
    $sotien   = $_POST['sotien'];
    $matkhau  = $_POST['matkhau'];
    $phi      = round($sotien*1.15);
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(empty($loai) or empty($stk) or empty($ctk) or empty($sotien) or empty($matkhau))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'canhbao';
    }
    else
    if($datauser->thongtin->matkhau != md5($matkhau))
    {
        $msg = 'Mật khẩu bạn nhập không chính xác';
        $type = 'canhbao';
    }
    else
    if($sotien <100000)
    {
        $msg = 'Số tiền phải lớn hơn 100.000 xu';
        $type ='thongtin';
    }
    else
    if($datauser->xu < $sotien)
    {
        $msg = 'Tài khoản của bạn không có đủ tiền.';
        $type = 'canhbao';
    }
    else
    {
        $msg = 'Tạo yêu cầu rút thành công, vui lòng vào lịch sử và liên hệ admin để tiến hành rút..';
        $type  ='thanhcong';
        $datauser->upxu(-$sotien);
        $mysqli->query("INSERT INTO `logrut` SET `thoigian` = '".$thoigian."', `uid` = '".$id."', `code` = '0', `ten` = '".$taikhoan."', `vnd` = '".$sotien."'");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}
if(isset($_GET['napthe']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $telco = $_POST['telco'];
    $amount   = $_POST['amount'];
    $serial  = $_POST['serial'];
    $code  = $_POST['code'];
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(empty($telco) or empty($amount) or empty($serial) or empty($code))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'canhbao';
    }
    else
    if($datauser->xu < $sotien)
    {
        $msg = 'Tài khoản của bạn không có đủ tiền.';
        $type = 'canhbao';
    }
    else
    {
        $msg = 'Nạp Thành Công...Vui Lòng Đợi Trong Giây Lát,Nếu Thấy Lâu Vui Lòng Inbox CSKH';
        $type  ='thanhcong';
        $mysqli->query("INSERT INTO `lognap` SET `thoigian` = '".$thoigian."', `uid` = '".$id."', `trangthai` = '0', `telco` = '".$telco."', `amount` = '".$amount."', `serial` = '".$serial."', `code` = '".$code."'");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}
if(isset($_GET['napbank']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $telco = $_POST['telco'];
    $amount   = $_POST['amount'];
    $serial  = $_POST['serial'];
    $code  = $_POST['code'];
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(empty($telco) or empty($amount) or empty($serial) or empty($code))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'canhbao';
    }
    else
    if($datauser->xu < $sotien)
    {
        $msg = 'Tài khoản của bạn không có đủ tiền.';
        $type = 'canhbao';
    }
    else
    {
        $msg = 'Nạp Thành Công...Vui Lòng Đợi Trong Giây Lát,Nếu Thấy Lâu Vui Lòng Inbox CSKH';
        $type  ='thanhcong';
        $mysqli->query("INSERT INTO `lognapbank` SET `thoigian` = '".$thoigian."', `uid` = '".$id."', `trangthai` = '0', `telco` = '".$telco."', `amount` = '".$amount."', `serial` = '".$serial."', `code` = '".$code."'");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}
if(isset($_GET['load_lichsu_lx']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `lichsu` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['thoigian'].' </td> <td>'.$phien['noidung'].' </td>   </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}
if(isset($_GET['lixi']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $taikhoan = $_POST['taikhoan'];
    $sotien   = $_POST['sotien'];
    $matkhau  = $_POST['matkhau'];
    $noidung  = $_POST['noidung'];
    $phi      = round($sotien*1.00);
    $ktra     = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'canhbao';
    }
    else
    if(empty($taikhoan) or empty($sotien) or empty($matkhau))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'canhbao';
    }
    else
    if($datauser->thongtin->matkhau != md5($matkhau))
    {
        $msg = 'Mật khẩu bạn nhập không chính xác';
        $type = 'canhbao';
    }
    else
    if($sotien <10000)
    {
        $msg = 'Số tiền phải lớn hơn 10000 xu';
        $type ='thongtin';
    }
    else
    if($datauser->xu < $phi)
    {
        $msg = 'Tài khoản của bạn không có đủ tiền.';
        $type = 'canhbao';
    }
    else
    if($ktra['id'] <=0)
    {
        $msg = 'Không tồn tại người dùng này';
        $type = 'thongtin';
    }
    else
    if($taikhoan == $datauser->taikhoan)
    {
        $msg = 'Không thể lì xì cho chính bản thân mình';
        $type = 'thongtin';
    }
    else
    {
        $msg = 'Lì xì thành công.';
        $type  ='thanhcong';
        $n = new users($ktra['id']);
        $datauser->upxu(-$phi);
        $n->upxu($sotien);
        $mysqli->query("INSERT INTO `lichsu` SET `thoigian` = '".$thoigian."', `uid` = '".$id."', `noidung` = 'Lì xì cho ".$n->taikhoan." ".$sotien." xu với lời nhắn (".$noidung.") '");
        $mysqli->query("INSERT INTO `lichsu` SET `thoigian` = '".$thoigian."', `uid` = '".$n->id."', `noidung` = 'Nhận lì xì từ ".$datauser->taikhoan." ".$sotien." xu với lời nhắn (".$noidung.") '");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['search_users']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $taikhoan = $_POST['name'];
    $ktra     = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
    if($ktra['id'] <=0)
    {
        $d->error =0;
    }
    else
    {
        $a = new users($ktra['id']);
        $d->name = $a->thongtin->ten;
        $d->error =1;
    }
    echo json_encode($d);
    
}
if(isset($_GET['load_lichsu_bc']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>'.($phien['play_chon1'] >0 ? ' '.number_format($phien['play_chon1']).' Nai. ':'').' '.($phien['play_chon2'] >0 ? ' '.number_format($phien['play_chon2']).' Bầu. ' : '').'  '.($phien['play_chon3'] >0 ? ' '.number_format($phien['play_chon3']).' Gà. ' : '').'  '.($phien['play_chon4'] >0 ? ' '.number_format($phien['play_chon4']).' Cá. ' : '').'  '.($phien['play_chon5'] >0 ? ' '.number_format($phien['play_chon5']).' Cua. ' : '').'  '.($phien['play_chon6'] >0 ? ' '.number_format($phien['play_chon6']).' Tôm' : '').' </td>  <td>'.number_format($phien['xunhan']).' </td>   </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}

if(isset($_GET['load_lichsu_tx']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>'.number_format($phien['xucuoc']).' </td> <td>'.number_format($phien['hoantra']).' </td> <td>'.number_format($phien['xunhan']).' </td>   </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}

if(isset($_GET['phien_bc']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `phien_baucua`   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>('.$phien['thoigian'].')</td>  <td><img src="../lib/img/bc/bc_'.$phien['x1'].'.png"> <img src="../lib/img/bc/bc_'.$phien['x2'].'.png"> <img src="../lib/img/bc/bc_'.$phien['x3'].'.png" > </td>  </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}

if(isset($_GET['giftcode']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $giftcode = $_POST['text'];
    $text     = $mysqli->query("SELECT * FROM `giftcode` WHERE `text` = '".$giftcode."'")->fetch_assoc();
    if($id <=0)
    {
        $d->type = 'canhbao';
        $d->msg  = 'Vui lòng đăng nhập';
        
    }
    else
    if($text['id'] <=0)
    {
        $d->type = 'canhbao';
        $d->msg = 'Không tồn tại mã quà tặng này.';
    }
    else
    if($datauser->thongtin->{''.$giftcode.''} >=1)
    {
        $d->type = 'canhbao';
        $d->msg  = 'Bạn đã sử dụng giftcode này rồi.';
    }
    else
    {
        $d->type = 'thanhcong';
        $d->msg = 'Nhập mã quà tặng thành công ! Bạn nhận được '.number_format($text['xu']).' ';
        $datauser->upxu($text['xu']);
        $datauser->upthongtin($giftcode,1);
        if($text['max'] <=1)
        {
            $mysqli->query("DELETE FROM `giftcode` WHERE `id` = '".$text['id']."'");
        }
        else
        {
            $mysqli->query("UPDATE `giftcode` SET `max` = `max` - '1' WHERE `id` = '".$text['id']."'");
        }
    }
    echo json_encode($d);
}


if(isset($_GET['phien_tx']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $data_bc = $mysqli->query("SELECT * FROM `phien_taixiu`   ORDER by id DESC LIMIT $start, $kmess");
    $msg='';
    while($phien=$data_bc->fetch_assoc())
      {
        $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>('.$phien['thoigian'].')</td>  <td>'.($phien['x1']+$phien['x2']+$phien['x3']).' '.($phien['x1']+$phien['x2']+$phien['x3'] <= 10 ? 'XỈU' : 'TÀI').' ('.$phien['x1'].'-'.$phien['x2'].'-'.$phien['x3'].')</td>  </tr>';
      }
      $d->d = $msg;
      if(strlen($msg) <=0)
      {
          $d->het = 1;
      }
      echo json_encode($d);
}


if(isset($_GET['exit']))
{
    session_destroy();
}

if(isset($_GET['reg']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $taikhoan = htmlspecialchars(trim($_POST['taikhoan']));
    $tennv = htmlspecialchars(trim($_POST['ten']));
    $matkhau  = htmlspecialchars(trim($_POST['matkhau']));
    $matkhau2  = htmlspecialchars(trim($_POST['matkhau2']));
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
    if(strlen($taikhoan) <=3)
    {
        $d->msg = 'Tài khoản phải lớn hơn 3 kí tự và nhỏ hơn 20 kí tự.';
        $d->type = 'canhbao';
    } else
    if(strlen($tennv) <=3)
    {
        $d->msg = 'Tên nhân vật hơn 3 kí tự và nhỏ hơn 20 kí tự.';
        $d->type = 'canhbao';
    }
    else
    if(!preg_match('/^[a-z0-9]{3,15}$/', $matkhau))
    {
        $d->msg = 'Mật khẩu hơn 3 kí tự và nhỏ hơn 20 kí tự.';
        $d->type = 'canhbao';
    }else
    if($matkhau != $matkhau2)
    {
        $d->msg = 'Mật khẩu không khớp.';
        $d->type = 'canhbao';
    }else
    if($kiemtra['id'] >=1)
    {
        $d->msg = 'Tài khoản đã tồn tại.';
        $d->type = 'canhbao';
    }
    else {
    $mysqli->query("INSERT INTO `nguoichoi` SET `taikhoan` = '".$taikhoan."', `xu` = '0'");
    $new_id  = $mysqli->insert_id;
    $newplay = new users($new_id);
    $newplay->upthongtin('matkhau',md5($matkhau));
    $newplay->upthongtin('ten',$tennv);
    $newplay->upthongtin('kichhoat',1);
    $d->msg = 'Đăng kí thành công,chúc bạn chơi game vui vẻ ! ';
    $d->type = 'thanhcong';
    }
    echo json_encode($d);
}


if(isset($_GET['login']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $taikhoan = htmlspecialchars(trim($_POST['taikhoan']));
    $matkhau = htmlspecialchars(trim($_POST['matkhau']));
    if(!$taikhoan or !$matkhau)
    {
        $d->msg = 'Vui lòng nhập tài khoản và mật khẩu';
        $d->type = 'canhbao';
        echo json_encode($d);
        exit();
    }
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' LIMIT 1")->fetch_assoc();
    if($kiemtra['id'] <=0)
    {
        $d->msg = 'Không tồn tại tài khoản này.';
        $d->type = 'canhbao';
        echo json_encode($d);
        exit();
    }
    $p = new users($kiemtra['id']);
    if($p->thongtin->matkhau != md5($matkhau))
    {
        $d->msg = 'Tài khoản hoặc mật khẩu không chính xác.';
        $d->type = 'canhbao';
        echo json_encode($d);
        exit();
    }
    
    if($p->thongtin->kichhoat <=0)
    {
        $d->msg = 'Tài khoản của bạn chưa được kích hoạt. Xin vui lòng liên hệ Admin để được kích hoạt.';
        $d->type = 'canhbao';
        echo json_encode($d);
        exit();
    }
    
    $_SESSION['id'] = $p->id;
    $d->msg = 'Đăng nhập thành công';
    $d->type = 'thanhcong';
    $d->name = $p->thongtin->ten;
    $d->xu = $p->xu;
    echo json_encode($d);
}