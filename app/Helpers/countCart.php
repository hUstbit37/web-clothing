
<?php
use Illuminate\Support\Facades\Session;

if (!function_exists('countCart')) {
    function countCart($name)
    {
       $cart = Session::get($name) ?? collect();
       $total = 0;
       foreach ($cart as $product){
           $total += $product->quantity;
       }
       return $total;
    }
}
