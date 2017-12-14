<?php
session_start();
require("../includes/action/config.php");
require("../includes/action/functions.php");
$site=new Site();
$pay=$site->get_payment_information();
$shipping_cost=$pay[0]['shipping_cost'];
$mode=$pay[0]['payment_mode'];
if($mode=="0")
$paypal_url= 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
else
$paypal_url= 'https://www.paypal.com/cgi-bin/webscr'; // Live Paypal API URL

$paypal_id=$pay[0]['paypal_id']; // Business email ID
$oid=$_POST['o_id'];
$sid=$_POST['a_id'];
$i=1;	
$field="";$dis="0";
$userid=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";
$tax=$site->get_tax($userid);
$sql=mysqli_query($con,"select sum(om_price*om_quantity) as price from order_master where userid='".$_SESSION['user_id']."' and om_status=1");

$r=mysqli_fetch_array($sql);
$price=$r['price'];

$sql2=mysqli_query($con,"select sum(amount) as amount from gift_card_master where userid='".$_SESSION['user_id']."' 
  and status=0");
$r2=mysqli_fetch_array($sql2);
$gift=$r2['amount'];
$amt=0;
$sql1 = mysqli_query($con,"select amount as amount from gift_card_applied where userid='".$_SESSION['user_id']."' and status=0");
$r1=mysqli_fetch_array($sql1);
if(mysqli_num_rows($sql1))
{
  $amt=$r1['amount'];
}
$coupon = mysqli_query($con,"select * from coupon_applied where userid='".$_SESSION['user_id']."' and status=0");
if(mysqli_num_rows($coupon))
{
  $cr=mysqli_fetch_array($coupon);
 if($cr['coupon_type']=="$")
    {
        $dis=$cr['value'];
    }
    if($cr['coupon_type']=="Discount")
    {

      $dis= ((($price + $gift)- $amt) / 100) * $cr['value'];
    }
    if($cr['coupon_type']=="Free Shipping")
    {
      $dis="0";
      $shipping_cost=0;
    }
}

if($price > $amt)
{
   $tp=(((($price+$gift) - $amt) - $dis) / 100) * $tax;
    $p=((($price + $tp + $gift) - $amt) - $dis) + $shipping_cost;
}
else
{
  $tp=(((($price+$gift) - $amt) - $dis) / 100) * $tax;
   $p=((($price + $tp + $gift) - $amt) - $dis) + $shipping_cost;
}


	$field.="<input type='hidden' name='item_name_1' value='Order ID - ".$oid."'> ";
	$field.="<input type='hidden' name='amount_1' value='".round($p,2)."'> ";
	$field.= "<input type='hidden' name='quantity_1' value='1'> ";
?>
<style>
.spinner.loading {
  padding: 50px;
  position: relative;
  text-align: center;
}

.spinner.loading:before {
  content: "";
  height: 30px;
  width: 30px;
  margin: -15px auto auto -15px;
  position: absolute;
  top: 70%;
  left: 50%;
  border-width: 8px;
  border-style: solid;
  border-color: #2180c0 #ccc #ccc;
  border-radius: 100%;
  animation: rotation 1.2s infinite linear;
}
.paypal_text{ text-align:center;font-size: 20px;}
@keyframes rotation {
  from {
    transform: rotate(0deg);
  } to {
    transform: rotate(359deg);
  }
}

</style>


<div class="spinner loading"></div>
<h1 class="paypal_text">Please Wait...Loading</h1>

 
 
    <form action="<?php echo $paypal_url; ?>" id="paypal-form" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <?php echo $field;?>
	<input type="hidden" name="cpp_header_image" value="https://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="https://customclothiers.com/paypal/cancel.php?oid=<?php echo $oid;?>&sid=<?php echo $sid;?>">
    <input type="hidden" name="return" value="https://customclothiers.com/paypal/success.php?oid=<?php echo $oid;?>&sid=<?php echo $sid;?>">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form> 
    <?php //exit;?>
<script type="text/javascript">
	
setTimeout(function(){

document.getElementById("paypal-form").submit();

},3000);

</script>