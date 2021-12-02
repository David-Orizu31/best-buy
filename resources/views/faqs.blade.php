@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="faq-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">FAQ</h1>
                 <h5 class="text-white">What are the Frequently Asked Questions asked by our Customers?</h5>
                </div>
               </div>
            </div>
          </div>
        </div>

        <br><br>
        <div class="container">
            <div class="other-text-area">
                <div class="row">
                 <div class="col-md-7">   
                <h2><b>How can we Help?</b></h2>
                <p>We want you to be happy - pure and simple. If you can't find the answer to your question below - please give us a call! The best time to reach us is</p>
                <p>Mon - Sun 8am - 5pm (Central Time).</p>
            </div>

            <div class="col-md-5">
                <br>
                <p><span class="text-danger"><i class="fas fa-phone"></i></span>  <span class="ps-2">(787) 760-4700 (Toll Free)</span></p>
                <div class="d-grid">
                <a href="/contact-us" class="btn btn-submit">CONTACT US <i class="fas fa-paper-plane ps-2"></i></a>
                </div>
            </div>
            </div>

            <br>
            <h2 class="text-center"><b>Frequently Asked Questions</b></h2>
             <br>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed acc-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How do i place an order?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     Ordering from The Best Buy is easy! Once you find an item you would like to purchase, simply click the "Add to Cart" button in that product's description page. You can check the contents of your shopping cart at any time by clicking the "Cart" button at the top of the page. If you decide to remove an item from your cart, just click "Delete" to the right of the product you would like to remove. You can also adjust the quantity of any product in your shopping cart. To do this, type in the new quantity and click on the "Update Quantity" button at the bottom of the shopping cart page. Assuming the quantity you have requested is available, you will now see the adjusted quantities as well as your new subtotal (if you enter a quantity that is greater than the quantity available, your purchase quantity will reflect the maximum quantity available).
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed acc-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Where is my order?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <span>If you are ordering an item coming from an international location to the United States, you will receive an email with tracking information once the order reaches the US.</span><br><br>
                      <span>If you placed an order more than 10 days ago and would like to find out the status, please <a href="/contact-us" class="text-danger"><b>click here</b></a> to submit a status inquiry. A member of our customer service team will reply with information about your order, such as if it has been shipped, when it was shipped, or when we expect it to be shipped.</span><br><br>
                      <span>Alternatively, you can check the status by accessing your The Best Buy account. Once signed in, navigate to the Orders & Returns section.</span>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed acc-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      What forms of payment do you accept?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        The Best Buy accepts all forms of card payment, either online through our secure server or by phone. We also accept payment by PayPal ; orders placed using these payment methods must be placed online through our secure server. If you are paying via credit card and would prefer to place your order over the phone, please contact a member of our customer service team toll-free at (787) 760-4700 . Please note that credit cards will be charged only after an order has shipped from our fulfillment center, although an authorization will be obtained at the time the order is placed.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed acc-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                       How long would my order take to arrive?
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          <span>On average, orders arrive to the destination address in 2-3 weeks. The delivery time will depend primarily on two factors: item availability and shipping service.</span><br><br>
                          <span><b>Item Availability:</b></span><br>
                          <span>Unless otherwise noted, all items available for purchase on the website are in stock. Items that are backordered contain a note indicating this fact as well as the expected delivery time frame.</span><br><br>
                          <span><b>Shipping Service:</b></span><br>
                          <span>During checkout, we will show you a list of available shipping services and their corresponding prices and timeframes. You may also view shipping charges and timeframes through the "Calculate Shipping" link in the shopping cart. Note some items carry a special delivery timeframe that may differ from that of other items from the same region -- these items are clearly labeled with the special timeframe on the product detail page (as well as in checkout).</span><br><br>
                          <span>If we determine that we will not be able to deliver an order within the promised timeframe, we will immediately contact you via email.</span>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed acc-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                       How do I return an Item?
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          <span>Refunds will be available for up to 60 days from the day you receive your order.</span><br><br>
                          <span>To Refund your item simply contact us with either our mobile number or email address or by submitting a return inquiry <a href="/contact-us" class="text-danger"><b>here</b></a>.</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>


@endsection