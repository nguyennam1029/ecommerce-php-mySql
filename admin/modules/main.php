<div class="clear"></div>
<div class="main">
    <?php
    if(isset($_GET['action'])&& $_GET['query']){
    $tam=$_GET['action'];
    $query=$_GET['query'];
    }
    else{
    $tam='';
    $query='';
    }
    if($tam=='quanlidanhmucsanpham'&&$query=='them')
    {
        include("modules/quanlidanhmucsp/them.php");
        include("modules/quanlidanhmucsp/lietke.php");
    }else if($tam=='quanlidanhmucsp'&&$query=='sua') 
    {
        include("modules/quanlidanhmucsp/sua.php");
    }else
    if($tam=='quanlisanpham'&&$query=='them')
    {
        include("modules/quanlisanpham/them.php");
        include("modules/quanlisanpham/lietke.php");
    }elseif($tam=='quanlisanpham'&& $query=='sua')
    {
        include('modules/quanlisanpham/sua.php');
    }elseif($tam=='quanlidonhang'&& $query=='lietke')
    {
        include('modules/quanlidonhang/lietke.php');
    }elseif($tam=='donhang'&& $query=='xemdonhang')
    {
        include('modules/quanlidonhang/xemdonhang.php');
    }elseif($tam=='quanlikhachhang'&& $query=='lietke')
    {
        include('modules/quanlikhachhang/lietke.php');
    }
     else{
    include("modules/dashboard.php");
   }
    ?>
</div>