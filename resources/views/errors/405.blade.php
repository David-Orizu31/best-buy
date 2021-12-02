@extends('layouts.app')

@section('pageTitle', 'error page')

    @section('content')

    <div class="container">
             <br><br>
             <h2 class="message-header" style="color: rgb(243, 47, 47);">Error !</h2>
             <br>
             <p class="message-body"><span style="color: rgb(243, 47, 47);">Oops!</span> unfortunately your request has been declined. This could be due to Multiple Reasons.</p>
             <p class="message-body">If you have been debited and didnt get your money back within 10minutes, Please  <a href="contact-us.html">contact us</a> either through our mail or phone contact so that we can verify this problem.</p>
             <p class="message-body">Please do as we have instructed you to avoid getting into bigger complications.</p>
         </div>

@endsection
