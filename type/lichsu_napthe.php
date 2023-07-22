<?PHP
$title = 'Lịch sử nạp thẻ';
include_once('../function/head.php');
$data_bc = $mysqli->query("SELECT * FROM `lognap` WHERE `uid` = '".$id."'   ORDER by id DESC LIMIT $start, $kmess");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $msg.='<tr id="count"><td>'.$phien['id'].' </td><td>'.$phien['thoigian'].' </td> <td>'.$phien['telco'].'</td><td>'.number_format($phien['amount']).'</td><td>'.$phien['serial'].'</td><td>'.$phien['code'].'</td>   <td><font color="puprple">'.($phien['trangthai']==0 ? 'Chờ' : '</font>').' <font color="green">'.($phien['trangthai']==1 ? 'Thành công' : '</font>').' <font color="red">'.($phien['trangthai']==2 ? 'Hủy' : '</font>').' </td>  </tr>';
}

       
?>
 <script>
 var loadlxt = false;
    var dOut = '';
    var trang = 1;
$(window).scroll(function(e) {
			if (loadlxt == false) {
				dOut = $(document).height() - $('#head_tien').height() - 50;
				if (($(window).scrollTop() >= $(document).height() - $(window).height() - dOut)) {
					loadlxt = true;
					
					++trang;
					loadlix_rut();
				}
			}
		
function loadlix_rut()
{
 $.ajax({
url : '/game/send?loadlix_rut&p='+trang,
type : 'POST',
success : function(d){
if(d.het == 1) {
   thongbao('Đã hết dữ liệu','canhbao');
   return false;
}
   loadlxt = false;
    $('#top_taixiu').append(d.d);
   
}
});   
}




		
		
	});
            </script>  
            <header class="page-header">
<h2>Lịch sử nạp thẻ</h2>

</header>
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card" id="head_tien">
                <div class="card">
                  <div class="card-body">
                       <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Lịch sử nạp thẻ</h2>
</header>
<div class="panel-body">
                    <table id="customers" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> #ID ĐƠN </th>  
                          <th> Thời gian </th>
                          <th> Loại Thẻ </th>
                          <th> Mệnh Giá </th>
                          <th> Seri </th>
                          <th> Mã Thẻ </th>
                          <th> Trạng Thái </th>
                          
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
           
          