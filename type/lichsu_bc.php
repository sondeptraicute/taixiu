<?PHP
$title = 'Lịch sử cược bầu cua';
include_once('../function/head.php');
$data_bc = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $msg.='<tr id="count"><td>'.$phien['phien'].' </td> <td>'.($phien['play_chon1'] >0 ? ' '.number_format($phien['play_chon1']).' Nai. ':'').' '.($phien['play_chon2'] >0 ? ' '.number_format($phien['play_chon2']).' Bầu. ' : '').'  '.($phien['play_chon3'] >0 ? ' '.number_format($phien['play_chon3']).' Gà. ' : '').'  '.($phien['play_chon4'] >0 ? ' '.number_format($phien['play_chon4']).' Cá. ' : '').'  '.($phien['play_chon5'] >0 ? ' '.number_format($phien['play_chon5']).' Cua. ' : '').'  '.($phien['play_chon6'] >0 ? ' '.number_format($phien['play_chon6']).' Tôm' : '').' </td>  <td>'.number_format($phien['xunhan']).' </td>   </tr>';
}

       
?>
 <script>
 




		
		
	});
            </script>       
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card" id="head_game_lstx">
                <div class="card">
                  <div class="card-body">
                     <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Lịch sử cược</h2>
</header>
<div class="panel-body">
                    <table id="customers" class="table mb-none">
                      <thead>
                        <tr>
                          <th> Phiên </th>
                          <th> Cửa cược </th>
                          <th> Tiền thắng </th>
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
              </div>
            </div>
            
            
    
<?PHP

include_once('../function/foot.php');

?>
           
          