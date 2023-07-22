<?PHP
$title = 'Đổi mã quà tặng';
include_once('../function/head.php');
?>
<script>
function giftcode()
{
    $.ajax({
        url : '/type/send.php?giftcode',
        type : 'POST',
        data : $("#form_data").find("select, textarea, input").serialize(),
        success : function(d)
        {
            thongbao(d.msg,d.type);
        }
        
    });
}
</script>
<html class="fixed js flexbox flexboxlegacy csstransforms csstransforms3d no-overflowscrolling">
 <head> 
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta name="description" content=""> 
  <meta name="author" content="DucNghia"> 
  <link rel="icon" type="image/png" sizes="16x16" href="https://8sao.club/lib2/icoc.png"> 
  <title>Mini Game Tài Xỉu, Bầu Cua, Xóc Đĩa Bằng Vàng Ngọc Rồng Online Uy Tín Số 1</title> 
  <link href="https://8sao.club/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet"> 
  <link href="https://8sao.club/assets/extra-libs/c3/c3.min.css" rel="stylesheet"> 
  <!-- Bootstrap tether Core JavaScript --> 
  <!-- apps --> 
  <!-- slimscrollbar scrollbar JavaScript --> 
  <!--Wave Effects --> 
  <!--Menu sidebar --> 
  <!--Custom JavaScript --> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://8sao.club/lib/css/to.css?v1"> 
  <link rel="stylesheet" href="https://8sao.club/lib/css/icon.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
  <!--thaiiiiiiiiiiii--------------------------> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/bootstrap/css/bootstrap.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/font-awesome/css/font-awesome.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/magnific-popup/magnific-popup.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/bootstrap-datepicker/css/datepicker3.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/vendor/morris/morris.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/stylesheets/theme.css?up211876087"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/stylesheets/skins/default.css"> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/stylesheets/theme-custom.css"> 
  <!-- --> 
  <!-- --> 
  <!-- --> 
  <link rel="stylesheet" href="https://8sao.club/lib2/css/font_size2.css?v1"> 
  <link rel="stylesheet" href="https://8sao.club/lib2/css/swiper4.min.css?v=1x"> 
  <link rel="stylesheet" href="https://8sao.club/lib2/css/all2-22-2020.css?v=1"> 
  <!--thaiiiiiiiiiiii--------------------------> 
  <script>
            var socket = io("https://fantastic-mire-twilight.glitch.me/");
            socket.emit("login",-1);
            var ketquatxvung = false,timeclock = 0,khunggame = [],hugame = [],gid = [],kq_xocdia=null;
        </script> 
  <!--BIEU DO----> 
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style> 
  <link rel="stylesheet" href="https://8sao.club/thai/assets/stylesheets/theme.css?up287447972"> 
  <style>
    #thaiBtn{
        
        border-radius: 7px;
 
    background-color: #1d1c18;
    border: 1px solid #ffc348 !important;
    font-family: 'SVN-Quadrat';
    color: #ffc348;
    font-weight: bold;
    font-size: 14px;
    text-align: center!important;
    width: 120px;
    }
</style> 
</header>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" id="form_data">
                    <header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Mã quà tặng</h2>

</header>  
<div class="panel-body">
                    <p class="card-description"> Nhập mã quà tặng để nhận được những phần thưởng có giá trị.</p>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="tennv">Mã quà tặng</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Mã quà tặng" id="taikhoan" name="text" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    </div>



                   <button type="button" onclick="giftcode()" class="btn btn-gradient-info btn-rounded btn-fw">Nhận quà</button>
                    
                    
                    
                  </div>
                </div>
              </div>
</div>
</div>

<?PHP
include_once('../function/foot.php');