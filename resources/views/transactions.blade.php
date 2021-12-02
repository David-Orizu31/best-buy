@extends('layouts.app')

@section('pageTitle', 'virtual tour')

    @section('content')

    <div class="container offset-md-1">


              <div class="container-full">
       <div class="container">
           <br><br>
           <h2 class="text-center">Transaction Details</h2>
           <br>

           <table class="table-responsive table-bordered">
               <tr class="table-row">
                   <th>Transaction Id</th>
                   <th>Customer Name</th>
                   <th>Customer Number</th>
                   <th>Amount</th>
                   <th>Payment Method</th>
                   <th>Status</th>
               </tr>
               @foreach($foreachtransactions as $foreachtransaction)
               <tr class="table-row">
                   <td>{{str_replace('.', '', substr($foreachtransaction->customer->customer_fullname, ($pos = strpos($foreachtransaction->customer->customer_fullname, '.')) !== false ? $pos + 0 : 1))}}</td>
                   <td>{{str_replace('.', '',strtok($foreachtransaction->customer->customer_fullname, '.'))}}</td>
                   <td>{{$foreachtransaction->customer->customer_phonenumber}}</td>
                   <td>{{$foreachtransaction->amount - 100}}</td>
                   <td>{{$foreachtransaction->payment_entity}}</td>
                   <td>{{$foreachtransaction->status}}</td>
               </tr>
               @endforeach

           </table>
       </div>

    </div>


      <style>
          .container-full {
              max-width: 100% !important;
              height: auto;
          }

          h2 {
              color: rgb(32, 63, 127);
          }

          .table-bordered {
              border-collapse: collapse;
          }

         .table-row {
             width: 100%;
         }

          .table-row th {
           padding: 23.7px;

          }

          .table-row td {
             padding: 23.7px;
          }

          .table-row:nth-child(odd) {
              background-color: rgb(236, 235, 235) !important;
          }

      </style>

        @endsection
