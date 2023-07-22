<?PHP
$title = 'Phiên tài xỉu';
include_once('../function/head.php');
$data_bc = $mysqli->query("SELECT * FROM `phien_taixiu`   ORDER by id DESC LIMIT $start, $kmess");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>('.$phien['thoigian'].')</td>  <td>'.($phien['x1']+$phien['x2']+$phien['x3']).' '.($phien['x1']+$phien['x2']+$phien['x3'] <= 10 ? 'XỈU' : 'TÀI').' ('.$phien['x1'].'-'.$phien['x2'].'-'.$phien['x3'].')</td>  </tr>';
}

    $history_taixiu = $mysqli->query("SELECT * FROM `phien_taixiu`   ORDER by id DESC LIMIT 20");
        $history_taixiu100 = $mysqli->query("SELECT * FROM `phien_taixiu`   ORDER by id DESC LIMIT 100");
        //$sotai = $mysqli->query("SELECT SUM(view) as total FROM `phien_taixiu`  ORDER by id DESC LIMIT 100")->fetch_assoc()[total];
        //$tongtai = $mysqli->query("SELECT * FROM `phien_taixiu` where `ketqua` = 'tai' ORDER by id DESC LIMIT 20 ")->num_rows;
        //$tongxiu = $mysqli->query("SELECT * FROM `phien_taixiu` where `ketqua` = 'xiu' ORDER by id DESC LIMIT 20 ")->num_rows;
        $tongtai = 0;
        $tongxiu = 0;
        $ketqua = array();
        $nhat = 0;
        $nhi = 0;
        $tam = 0;
        $tu = 0;
        $ngu =0;
        $luc =0;
        $linetrc = 0;
        $lintx1 = 0;
        $lintx2 = 0;
        $lintx3 = 0;
        while($phien=$history_taixiu100->fetch_assoc()){
            if($phien['ketqua'] == 'tai') ++$tongtai;
            if($phien['ketqua'] == 'xiu') ++$tongxiu;
            if($phien['x1'] == 1 or $phien['x2'] ==1 or $phien['x3'] ==1 ) ++$nhat;
            if($phien['x1'] == 2 or $phien['x2'] ==2 or $phien['x3'] ==2 ) ++$nhi;
            if($phien['x1'] == 3 or $phien['x2'] ==3 or $phien['x3'] ==3 ) ++$tam;
            if($phien['x1'] == 4 or $phien['x2'] ==4 or $phien['x3'] ==4 ) ++$tu;
            if($phien['x1'] == 5 or $phien['x2'] ==5 or $phien['x3'] ==5 ) ++$ngu;
            if($phien['x1'] == 6 or $phien['x2'] ==6 or $phien['x3'] ==6 ) ++$luc;
                }
        

        $d->title = 'Trong '.($tongtai+$tongxiu).' Phiên <font color="black" >Tài '.$tongtai.'</font> <font color="red" >Xỉu '.$tongxiu.'</font>';
        $d->head = 'Nhất : '.$nhat.' -  Nhị  : '.$nhi.' - Tam  : '.$tam.' - Tứ  : '.$tu.' - Ngũ  : '.$ngu.' - Lục  : '.$luc.'';
       
?>
 <script>
 var loaddtx = false;
    var dOut = '';
    var trang = 1;
$(window).scroll(function(e) {
			if (loaddtx == false) {
				dOut = $(document).height() - $('#head_gametx').height() - 50;
				if (($(window).scrollTop() >= $(document).height() - $(window).height() - dOut)) {
					loaddtx = true;
					
					++trang;
					load_notice();
				}
			}
		
function load_notice()
{
 $.ajax({
url : '/game/send?phien_tx&p='+trang,
type : 'POST',
success : function(d){
if(d.het == 1) {
   thongbao('Đã hết dữ liệu','canhbao');
   return false;
}
   loaddtx = false;
    $('#top_taixiu').append(d.d);
   
}
});   
}




		
		
	});
            </script>       
            <header class="page-header">
<h2>Phiên tài xỉu</h2>

</header>
<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <h4 class="card-title"><?=$d->title?></h4>
                    <?=$d->head?>
                  </div>
                </div>
              </div>
    
    
              <div class="col-lg-12 grid-margin stretch-card" id="head_gametx">
                
                <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Phiên tài xỉu</h2>
</header>
                    <div class="panel-body">
                    <table id="customers" class="table mb-none">
                      <thead>
                        <tr>
                          <th> Phiên </th>
                          <th> Thời gian </th>
                          <th> Kết quả </th>
                        </tr>
                      </thead>
                      <tbody id="top_taixiu">
                        <?=$msg?>
    
                      </tbody>
                    </table>
                    <div id="secon"></div>
                 </div>
              </div>
            </div>
            
            
    
<?PHP

include_once('../function/foot.php');

?>
           
          