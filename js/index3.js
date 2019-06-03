    <script>

        function onGooglePayLoaded() {
            const googlePayClient = new google.payments.api.PaymentsClient({
            environment: 'TEST'
                
                
            
    });
                        
            
            const tokenizationSpec = {
                type: 'PAYMENT_GATEWAY',
                parameters: {
                    gateway: 'example',
                    gatewayMerchantId: 'exampleGatewayMerchantId'
                }
            };  
                            
            const cardPaymentMethod = {
                type: 'CARD',
                tokenizationSpecification: tokenizationSpec,
                parameters: {
                    allowedCardNetworks: ['VISA','AMEX', 'DISCOVER', 'JCB', 'MASTERCARD'],
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
                                      

    function onGooglePaymentsButtonClicked() {
                            
                            
         
                            
            
            
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
            
            googlePayClient.isReadyToPay(clientConfiguration)
        .then(function (response) {
            if (response.result) {
                createAndAddButton();
            } 
        }).catch(function (err) {
            console.error("Error determining readiness to use Google Pay: ", err);
        });
        
            
}
