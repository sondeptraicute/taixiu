<?PHP
$title = 'TOP ĐẠI GIA';
include_once('../function/head.php');
$data_bc = $mysqli->query("SELECT * FROM `nguoichoi` ORDER by tien DESC LIMIT $start, $kmess");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $msg.='<tr id="count"><td>#'.$phien['id'].' - '.$phien['taikhoan'].' </td> <td>'.number_format($phien['tien']).' </td>    </tr>';
}

       
?>
  <header class="page-header">
<h2>Bảng xếp hạng</h2>

</header>
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card" id="head_game_lstx">
                <div class="card">
                  <div class="card-body">
                     <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Bảng xếp hạng</h2>
</header>
<div class="panel-body">
                    <table id="customers" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> Tên </th>
                          <th> Tiền có </th>
                          
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
           
          