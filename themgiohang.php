<?php
session_start();
include('admin/config/connect.php');
//them so luong
if(isset($_GET['cong']))
{
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as$cart_item)
    {
        if($cart_item['id']!=$id)
        {
            $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
            'hinhanh'=>$cart_item['hinhanh']);
            $_SESSION['cart']= $product;
        }
        else
        {
            $tangsoluong=$cart_item['soluongmua']+1;
            if($cart_item['soluongmua']<=10)
            {
                $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$tangsoluong,'giaban'=>$cart_item['giaban'],
                'hinhanh'=>$cart_item['hinhanh']);
            }
            else
            {
                $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
                'hinhanh'=>$cart_item['hinhanh']);
            }
            $_SESSION['cart']= $product;
        }
    }
    header('Location:cart.php');
}
//tru so luong
if(isset($_GET['tru']))
{
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as$cart_item)
    {
        if($cart_item['id']!=$id)
        {
            $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
            'hinhanh'=>$cart_item['hinhanh']);
            $_SESSION['cart']= $product;
        }
        else
        {
            $tangsoluong=$cart_item['soluongmua']-1;
            if($cart_item['soluongmua']>1)
            {
                $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$tangsoluong,'giaban'=>$cart_item['giaban'],
                'hinhanh'=>$cart_item['hinhanh']);
            }
            else
            {
                $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
                'hinhanh'=>$cart_item['hinhanh']);
            }
            $_SESSION['cart']= $product;
        }
    }
    header('Location:cart.php');
}
//xoá san phẩm
if($_SESSION['cart']&& isset($_GET['xoa']))
{
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item)
    {
        if($cart_item['id']!=$id)
        {
            $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
            'hinhanh'=>$cart_item['hinhanh']);
        }
        $_SESSION['cart']= $product;
        
        header('Location:cart.php');
    }
}
//them sanpham 
if(isset($_POST['themgiohang']))
{
   
    $id=$_GET['idsanpham'];
    $soluongmua=$_POST['soluongmua'];
    $sql="select *from tbl_sanpham where id_sanpham='".$id."' LIMIT 1";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array( $query);
    if($row)
    {
        
        $new_product[]=array('id'=>$id,'tensanpham'=>$row['tensanpham'],'soluongmua'=>$soluongmua,'giaban'=>$row['giaban'],
        'hinhanh'=>$row['hinhanh']);
        //kiểm tra xem sesion gio hàng tồn tại 
        if(isset($_SESSION['cart']))
        {
            $found=false;
            foreach($_SESSION['cart'] as $cart_item)
            {
                if($cart_item['id']==$id)
                {
                    $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua']+$soluongmua,'giaban'=>$cart_item['giaban'],
                    'hinhanh'=>$cart_item['hinhanh']);
                    $found=true;
                }
                else
                {
                $product[]=array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'soluongmua'=>$cart_item['soluongmua'],'giaban'=>$cart_item['giaban'],
                'hinhanh'=>$cart_item['hinhanh']);
                }
            }
            if($found==false)
            {
                $_SESSION['cart']=array_merge($product, $new_product);
            }
            else $_SESSION['cart']=$product;
        } else
        $_SESSION['cart']=$new_product;
        header('Location:cart.php');
    }
   


}

?>