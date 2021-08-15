<?php
session_start();
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
     <title>Cart</title>
   </head>
   <body>
     <div class="container">
         <div class="col-lg-12 text-center border rounded bg-light my-5">
           <h1 style="font-family: 'Montserrat', sans-serif;">MY CART</h1>
         </div>
         <div class="col-lg-8">
           <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No </th>
      <th scope="col">Model </th>
      <th scope="col">Price </th>
      <th scope="col">Day</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
    $total=0;
    if(isset($_SESSION['cart']))
    {
    foreach($_SESSION['cart'] as $key => $value)
    {
      $sr=$key+1;
      $total=$total+$value['price'];
      echo"
      <tr>
      <td>$sr</td>
      <td>$value[item_name]</td>
      <td>$value[price]</td>
      <td><input type='number' value='$value[Day]' min='1' max='10'></td>
      <form action='manage_cart.php'>
      <td><button name='remove_item'>Remove</button>
      <input type='hidden' name='item_name' value='$value[item_name]'>
      </form>
      </td>
      </tr>
      ";
    }
  }
  ?>
  </tbody>
</table>
         </div>

     </div>
     <div>
       <h3>Total:</h3>
       <h4><?php echo$total ?></h4>
       <br>
       <form>
         <button>Make Purchase</button>
       </form>
     </div>

   </body>
 </html>
