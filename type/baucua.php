<?PHP
$title = 'Phiên bầu cua';
include_once('../function/head.php');
$data_bc = $mysqli->query("SELECT * FROM `phien_baucua`   ORDER by id DESC LIMIT $start, $kmess");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>('.$phien['thoigian'].')</td>  <td><img src="../lib/img/bc/bc_'.$phien['x1'].'.png"> <img src="../lib/img/bc/bc_'.$phien['x2'].'.png"> <img src="../lib/img/bc/bc_'.$phien['x3'].'.png" > </td>  </tr>';
}

$data_bc = $mysqli->query("SELECT * FROM `phien_baucua`   ORDER by id DESC LIMIT 100");
        $nai = 0;
        $bau = 0;
        $ga  = 0;
        $ca  = 0;
        $cua = 0;
        $tom = 0;
        while($phien=$data_bc->fetch_assoc())
        {
            if($phien['x1'] ==1 or $phien['x2'] ==1 or $phien['x3'] ==1) ++$nai;
            if($phien['x1'] ==2 or $phien['x2'] ==2 or $phien['x3'] ==2) ++$bau;
            if($phien['x1'] ==3 or $phien['x2'] ==3 or $phien['x3'] ==3) ++$ga;
            if($phien['x1'] ==4 or $phien['x2'] ==4 or $phien['x3'] ==4) ++$ca;
            if($phien['x1'] ==5 or $phien['x2'] ==5 or $phien['x3'] ==5) ++$cua;
            if($phien['x1'] ==6 or $phien['x2'] ==6 or $phien['x3'] ==6) ++$tom;
        }
        
        $d->error = 1;
        $d->head = '<div style="width:14.6%" ><img src="/lib/img/bc/bc_1.png" width="60%"> : '.$nai.'</div><div style="width:14.6%"> <img src="/lib/img/bc/bc_2.png" width="60%">  : '.$bau.'</div><div style="width:14.6%"> <img src="/lib/img/bc/bc_3.png" width="60%">  : '.$ga.'</div><div style="width:14.6%"> <img src="/lib/img/bc/bc_4.png" width="60%">  : '.$ca.'</div><div style="width:14.6%"> <img src="/lib/img/bc/bc_5.png" width="60%">  : '.$cua.'</div><div style="width:14.6%"> <img src="/lib/img/bc/bc_6.png" width="60%">  : '.$tom.'</div>';
?>
            <header class="page-header">
<h2>Phiên bầu cua</h2>

</header>
<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <h4 class="card-title"><?=$d->title?></h4>
                  </div>
                </div>
              </div>
    
    
              <div class="col-lg-12 grid-margin stretch-card" id="head_gametx">
                
                <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Phiên bầu cua</h2>
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
           
          