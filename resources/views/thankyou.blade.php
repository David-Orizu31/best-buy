
   @extends('layouts.app')

@section('content')

   
   <div class="container">
             <br><br>
             <h2 class="message-header">Thank you <small>Your purchase id is {{$purchaseId}}</small></h2>
             <br>
             <p class="message-body">Congratulations! your item purchase has been successfull.</p>
             <p class="message-body">Incase you're facing any challenge with getting the products, you can contact us.</p>
             <p class="message-body">Thank you so much once more for using our platform to purchase your item, we really appreciate your effort. We'll be expecting to render more service next time. Thanks!</p>
         </div>
         @endsection