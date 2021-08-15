<?php
session_start();

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['add_to_cart']))
  {
  if (isset($_SESSION['cart']))
  {
   $myitems=array_column($_SESSION['cart'],'item_name');
   if(in_array($_POST['item_name'],$myitems))
   {
     echo"<script>
     alert('Item Already Added!');
     window.location.href='sedan.html';
     </script>";
   }
   else
   {
   $count=count($_SESSION['cart']);
   $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'], 'price'=>$_POST['price'], 'Day'=>1);
   echo"<script>
   alert('Item Added!');
   window.location.href='sedan.html';
   </script>";
  }
}
  else
  {
    $_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'], 'price'=>$_POST['price'], 'Day'=>1);
    echo"<script>
    alert('Item Added!');
    window.location.href='sedan.html';
    </script>";

  }
  }

}
?>
