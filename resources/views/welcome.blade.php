<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">

            <div class="content">

                <div class="links">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

            <script
                src="https://www.paypal.com/sdk/js?client-id=AWPkSmv_KhrV6gs_joVf93JQvtelSM8A7Gc-KH-UtG8lH7UTxp1xlZEx3q36vjZ69u3GGnZ3-GXmVJbm"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
            </script>

            <script
                src="https://www.paypal.com/sdk/js?client-id=AWPkSmv_KhrV6gs_joVf93JQvtelSM8A7Gc-KH-UtG8lH7UTxp1xlZEx3q36vjZ69u3GGnZ3-GXmVJbm"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
            </script>

                {{-- Paypal button formerly here --}}
        
            <script>
                paypal.Buttons({
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
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    // Call your server to save the transaction
                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                        'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                        orderID: data.orderID
                        })
                    });
                    });
                }
                }).render('#paypal-button-container');
            </script>


    </body>
</html>
