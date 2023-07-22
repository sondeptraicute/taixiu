<?PHP
$title = 'Hướng Dẫn Tài Xỉu';
include_once('../function/head.php');

       
?>
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
            </script>    
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hướng Dẫn Tài Xỉu</h4>
                    <p class="card-description"> Hướng Dẫn Chơi Game Tài Xỉu
                    </p>
                    - Mỗi phiên tài xỉu có 60 giây được chia thành 2 phe : <br>
                    + <b>Tài</b> từ <b>11-18</b> điểm. <br>
                    + <b>Xỉu</b> từ <b>1-10</b> điểm. <br>
                    - Mỗi lần kết thúc phiên sẽ ngẫu nhiên 3 xí ngầu, mỗi xí ngẫu mang các mặt là các điểm. <br>
                    - <b>Cân cửa</b> : khi hết thời gian đặt sẽ tiền hành cân cửa cho tiền 2 bên bằng nhau, những người chơi đặt cuối cùng khi cân cửa sẽ được hoàn tiền. <br>
                    <b>* Ví dụ</b> <br>
                    + Bên tài : 10.000.000 xu <br>
                    + Bên xỉu : 12.000.000 xu <br>
                    + Có người vào đặt bên <b>Tài 4.000.000 xu</b> khi hết thời gian mà bên xỉu không còn ai đặt, người vừa đặt 4.000.000 xu sẽ được hoàn trả lại <b>2.000.000 xu</b> để cân cửa. <br>
                    - <b>Nặn :</b> Khi bật chế độ nặn, khi có kết quả sẽ không hiển thị kết quả ngay, mà bạn phải tự tay mở đĩa để xem kết quả. <br>
                    - <b>Thưởng thắng cuộc</b> : bên thắng sẽ nhận được <b>X2 tiền cược</b> (tỉ lệ là <b>1 x 1,98</b> phí). Ví dụ cược 100.000 thắng sẽ nhận được 198.000.<br>
                    - Chúc các bạn chơi game vui vẻ.
                    
                  </div>
                </div>
              </div>
            </div>
            
            
    
<?PHP

include_once('../function/foot.php');

?>
           
          