function remove_from_cart(cartid)
{
 if(confirm('Are you sure you want to remove this product from cart ?'))
 {
  window.location.href='removefromcart.php?cartid='+cartid;
 }
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});