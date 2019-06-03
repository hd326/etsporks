<script>

        function onGooglePayLoaded() {
            
            /*const googlePayBaseConfiguration = {
    apiVersion: 2,
    apiVersionMinor: 0,
    allowedPaymentMethods: [
        {
            "type": "CARD",
            "parameters": {
                "allowedAuthMethods": ["PAN_ONLY", "CRYPTOGRAM_3DS"],
                "allowedCardNetworks": ["AMEX", "DISCOVER", "JCB", "MASTERCARD", "VISA"]
            },
            "tokenizationSpecification": {
                "type": "PAYMENT_GATEWAY",
                "parameters": {
                    "gateway": "example",
                    "gatewayMerchantId": "exampleGatewayMerchantId"
                }
            }
    }
  ],
    "transactionInfo": {
        "totalPriceStatus": "FINAL",
        "totalPrice": "12.34",
        "currencyCode": "USD"
    }

};
            */
            
            function createAndAddButton() {

    const button = googlePayClient.createButton({

        // currently defaults to black if default or omitted
        buttonColor: 'default',

        // defaults to long if omitted
        buttonType: 'long',

        onClick: onGooglePaymentsButtonClicked
    });

    document.getElementById('buy-now').appendChild(button);

    // TODO: Create Google Pay button andd add it to the DOM.

    // TODO: Add the button to the DOM
    // googlePayButton.setAttribute('id', 'google-pay-button');
    // domId('buy-now').appendChild(googlePayButton);

}
                    
            
const tokenizationSpec = {
                type: 'PAYMENT_GATEWAY',
                parameters: {
                    gateway: 'example',
                    gatewayMerchantId: 'gatewayMerchantId'
                }
            };  
            
            
const cardPaymentMethod = {
                type: 'CARD',
                tokenizationSpecification: tokenizationSpec,
                parameters: {
                    allowedCardNetworks: ['VISA','AMEX'],
                    allowedAuthMethods: ['PAN_ONLY', 'CRYPTOGRAM_3DS'],
                    billingAddressRequired: true,
                    billingAddressParameters: {
                        format: 'FULL',
                        phoneNumberRequired: true
                    }
                }
            };
    
const clientConfiguration = {
                apiVersion: 2,
                apiVersionMinor: 0,
                allowedPaymentMethods: [cardPaymentMethod]
            };
            
                   
        
            
            

    function onGooglePaymentsButtonClicked() {
         const paymentDataRequest = Object.assign({}, clientConfiguration);
paymentDataRequest.transactionInfo = {
                totalPriceStatus: 'FINAL',
                totalPrice: '123.45',
                currencyCode: 'USD',
            }; 

            paymentDataRequest.merchantInfo = {
                merchantId: '0123456789',
                merchantName: 'Example Merchant'
            };
            
            
googlePayClient.loadPaymentData(paymentDataRequest)
                .then(function(paymentData){
                processPayment(paymentData);
            }).catch(function(err){
               alert('Cannot process!'); 
            });
        
            
        

    // TODO: Launch the payments sheet using the loadPaymentData method in the payments client:
    // 1. Update the card created before to include a tokenization spec and other parameters.
    // 2. Add information about the transaction.
    // 3. Add information about the merchant.
    // 4. Call loadPaymentData.

}


    // Initialize the client and determine readiness to pay with Google Pay:
    // 1. Instantiate the client using the 'TEST' environment.
    // 2. Call the isReadyToPay method passing in the necessary configuration.
    const googlePayClient = new google.payments.api.PaymentsClient({
        environment: 'TEST'
    });
            googlePayClient.isReadyToPay(clientConfiguration)
        .then(function (response) {
            if (response.result) {
                createAndAddButton();
            } 
        }).catch(function (err) {
            console.error("Error determining readiness to use Google Pay: ", err);
        });
               
}
</script>