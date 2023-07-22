<?PHP
$title = 'NHẬN TIỀN';
include_once('../function/head.php');

$thongtin = '';

       
?>
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card" id="head_game_lstx">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nhận tiền</h4>
                    <p class="card-description"> <?=($id >=1 ? 'Nhận tiền' : 'Vui lòng đăng nhập để tiếp tục' )?>        </p>
                    <?PHP
                    if($id >=1)
                    {
                        $datauser->upxu2(500000);
                    }
                    ?>
                    <font color="red"><b><center>Bạn nhận được 500.000 xu chơi thử.</center></b></font>
                  </div>
                </div>
              </div>
            </div>
            
            
    
<?PHP

include_once('../function/foot.php');

?>
           
          