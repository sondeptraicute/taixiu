
<?PHP
if(isset($_GET['a']))
{
    echo'<b><font color="red"><big>Tro choi bao tri cap nhat. Mong cac ban quay lai sau.</big></font></b>';
    exit();
}
include_once('function/head.php');
$log_chat = $mysqli->query("SELECT * FROM chat ORDER by id DESC LIMIT $start, $kmess");
while($a = $log_chat->fetch_assoc())
{
    $chat.='<b>'.($a['do'] >=1 ? '<img src="/assets/images/avatar.jpg" alt="avatar" class="img-circle" width="40" /> <font color="red">'.$a['username'].'</font>' : '<font color="#31B404"><img src="/assets/images/avtvip.png" alt="avatar" class="img-circle" width="40" /> '.$a['username'].'</font>').'</b> : '.$a['noidung'].'<hr>';
}
?>
  <script>
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
<header class="page-header">
<h2>Trang Chủ</h2>

</header>
<div class="row">
<div class="col-md-12">
<section class="panel">
<header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Danh Mục Game</h2>
<p class="panel-subtitle"></p>
</header>
<div class="panel-body">

<div class="col-sm-2 col-xs-4"><a href="#" onclick="Load_Game(1,'game-taixiu')"><img width="100%" src="https://www.upsieutoc.com/images/2021/03/07/IMG_20210307_073205.jpg"></a></div>

<div class="col-sm-2 col-xs-4"><a href="/game/napthe"><img width="100%" src="https://www.upsieutoc.com/images/2021/03/07/IMG_20210307_073802.png"></a></div>

<div class="col-sm-2 col-xs-4"><a href="/game/rutvang"><img width="100%" src="https://www.upsieutoc.com/images/2021/03/07/IMG_20210307_073805.png"></a></div>

</div>
</section>
</div>
</div>

<div class="row">
<div class="col-md-6">
<section class="panel">
<header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Thông Báo <img width="4%" src="https://imgur.com/vVQZZjg.png"></h2>
<p class="panel-subtitle"></p>
</header>
<div class="panel-body">
<b><font color="red">🎲 Chúc Mừng Năm Mới 2021 <u>Tài Xỉu Vui Vẻ</u> Web Tài Xỉu Uy Tín Hàng Đầu Việt Nam 🎲</b></font><br>
<b><font color="blue" onclick="go('https://www.zalo.me/')">- Zalo CSKH(Click)<img width="8%" src="https://imgur.com/FQAxxzc.png"></b></font><br>
<font color="pink">_________________________________________</font></br>
<b><font color="green">WEB DEMO BOSS XEM</b></font><br>
<b><font color="green">Nhạc Tiếp Thêm Sức Sống</b></font><br>
<iframe src="https://www.youtube-nocookie.com/embed/rQcF4FfV6MY" width="300" height="136" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<br><br><br><br><br>
</font></font></font></font>

<!------------------- Thong bao ------------------->

</div>
</section>
</div>
<div class="col-md-6">
<section class="panel">
<header class="panel-heading">
<div class="panel-actions">
<a href="#" class="fa fa-caret-down"></a>
<a href="#" class="fa fa-times"></a>
</div>
<h2 class="panel-title">Box Chat</h2>
<p class="panel-subtitle">Vui lòng nói chuyện có văn hóa</p>
</header>
<div class="panel-body">
 <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập nội dung chat" id="name_chat" aria-label="Recipient's username" onkeydown = "if (event.keyCode == 13) chat()"  aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button onclick="chat()" class="btn btn-sm btn-gradient-primary" type="button">CHAT</button>
                        </div>
                      </div>
                    </div>
                    <hr>
                    
                    <div style="height: 380px;overflow: auto;" id="phongchat"><?=$chat?></div>
</div>
</section>
</div>
</div>
</font>
<?PHP


include_once('function/foot.php');

?>



           
          