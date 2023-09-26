<?php
session_start();
echo "hello world!\n";
echo "welcome to my website\n";
echo "this is a test\n";

// $host = 'db';

// $user = 'test';

// $pass = 'test';

// $conn = new mysqli($host, $user, $pass);
// if ($conn->connect_error) {
//   echo "Connection failed: " . $conn->connect_error;
// } else {
//   echo "Connected successfully";
// }

echo $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypal.com/sdk/js?client-id=ASEIMl31lwMZN9BWPJGqP2PBLPZaLldtc1ecTsjpSock0if6EAwDN4ZjN6Z_S_3gWfMnW9wp9sAgNPfA&components=buttons"></script>
  </head>
  <body>
    <h1>Home</h1>
    <p>hello world!</p>
    <p>welcome to my website</p>
    <p>this is a test</p>
    <div id="paypal-button-container"></div>
    <script>
    paypal.Buttons({
      style: {
        layout: 'vertical',
        color: 'blue',
        shape: 'rect',
        label: 'paypal'
      },
        createOrder: function(data, actions) {
          
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Payment completed successfully!' + JSON.stringify(details));
                console.log('Payment successfully:' + JSON.stringify(details));
            });
        },
        onCancel: function (data) {
          console.log('支付取消' + JSON.stringify(data))
        },
       onError: function (err) {
        console.log('支付错误' + JSON.stringify(data))
      },
      onInit: function (data, actions) {
        // Disable the buttons
        //actions.disable();
        //actions.enable();
        console.log("onInit");
      },
      // 点击按钮
      onClick: function () {
        console.log("onClick");
      },
    }).render('#paypal-button-container');
</script>
  </body>
</html>

