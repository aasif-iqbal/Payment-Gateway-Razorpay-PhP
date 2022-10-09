<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<h2>Hello, User</h2>
 <h3>Make Payment Here</h3>
 <form>
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" placeholder="Eg.Mitlesh" required><br>
  <label for="amt_">Amount:</label><br>
  <input type="text" id="amt" name="amt" placeholder="Eg.100" required>
   
  <input type="button" id="rzp-button1" value="pay" onclick="pay_now()">
</form>

<script>
function pay_now(){

var name = jQuery('#name').val();
var amt = jQuery('#amt').val();
                
                //updating pending payment when payment is completed..
                var options = {
                     "key": "rzp_test_p6TTjiqWqUW7c7", 
                    "amount": amt*100, 
                    "currency": "INR",
                    "name": "Your Company Name",
                    "description": "A New Point of view",
                    // "callback_url": "http://localhost/Payment-Gateway-Razorpay/thank_you.php", //Your Thank-you page                    
                    
                    "handler": function (response){                        
                        jQuery.ajax({
                            type:'post',
                            url:'payment_update.php',
                            data:{payment_id:response.razorpay_payment_id,name:name,amt:amt},            
                            success:function(data){
                                 alert(data);
                                window.location.href="thank_you.php"
                            }
                        })
                                console.log(response);
                                console.log(name);console.log(amt);
                           // console.log(response.razorpay_payment_id);
                    }//handler-end                    
                //    "image": "https://example.com/your_logo",
                //    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                //  "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/", //Your Thank-you page                    
                }; //options-end
                var rzp1 = new Razorpay(options);
                //document.getElementById('rzp-button1').onclick = function(e){
                rzp1.open();
                //e.preventDefault();
                //}                
}   
</script>
 </body>
</html>


