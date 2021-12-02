@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')



<div class="banner-area">
        <div class="owl-carousel" id="owl-banner">

          <div class="banner-1">
             <div class="container">
               <div class="row">
                 <div class="col-md-7"></div>
                 <div class="col-md-5">
                  <div class="banner-text">
                    <h2>Glowing Jewelries , highly attractive available at The Best Buy.</h2>
                    <br>
                    <div class="d-grid">
                      <a href="/items/2" class="btn btn-purchase">Shop Now</a>
                    </div>
                  </div>
                </div>
               </div>
             </div>
          </div>

          <div class="banner-2">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <div class="banner-text">
                    <h2>Men and Women Fashion wears that gives you the Best of all you need.</h2>
                    <br>
                    <div class="d-grid">
                      <a href="/items/3" class="btn btn-purchase">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="banner-3">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <div class="banner-text">
                    <h2>Gift packs available at The Best Buy at affordable prices.</h2>
                    <br>
                    <div class="d-grid">
                      <a href="/items/1" class="btn btn-purchase">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
         <br>
         <h2 class="text-center"><b>Shop at The Best Buy</b></h2>
         <br>
         <div class="row">
           <div class="col-md-6">
           <a class="text-dark" href="/items/1" style="text-decoration:none;">
             <div class="card">
               <div class="img-cover">
                     <img src="{{asset('img/gift-cat.jpg')}}" alt="tbg-gift" class="img img-fluid inner-img">
                    </div>
                     <div class="card-body cat-body">
                       <h3 class="text-center">Unique Gifts</h3>
                       <p>Our Gift Collections comprises of Gift Cards , Anniversary Gifts , Congratulatory Gifts which makes it unique.</p>
                     </div>
             </div>
</a>
           </div>
           <div class="col-md-6">
           <a class="text-dark" href="/items/2" style="text-decoration:none;">
             <div class="card two">
              <div class="img-cover">
                  <img src="{{asset('img/jewelry-cat.jpg')}}" alt="tbg-jewelry" class="img img-fluid inner-img">
                  </div>
                  <div class="card-body cat-body">
                    <h3 class="text-center">Jewelries</h3>
                    <p>Jewelries such as Bracelets, Necklaces, Rings, Earrings are available for both Men and Women.</p>
                  </div>
             </div>
             </a>
           </div>
         </div>

         <br>

         <div class="row">
          <div class="col-md-6">
          <a class="text-dark" href="/items/3" style="text-decoration:none;">
            <div class="card">
              <div class="img-cover">
                    <img src="{{asset('img/fashion-cat.jpg')}}" alt="tbg-fashion" class="img img-fluid inner-img">
                   </div>
                    <div class="card-body cat-body">
                      <h3 class="text-center">Fashion</h3>
                      <p>Fashion Items of different categories are available for all gender classes. You can purchase anyone of your choice.</p>
                    </div>
            </div>
</a>
          </div>
          <div class="col-md-6">
          <a class="text-dark" href="/new-products" style="text-decoration:none;">
            <div class="card two">
             <div class="img-cover">
                 <img src="{{asset('img/sale-catty.jpg')}}" alt="tbg-sale" class="img img-fluid inner-img">
                 </div>
                 <div class="card-body cat-body">
                   <h3 class="text-center">New Products</h3>
                   <p>View some of our new products and their featues and purchase.</p>
                 </div>
            </div>
</a>
          </div>
        </div>

        <br><br>
        <h2 class="text-center"><b>High Demands</b></h2>
        <br>
        <div class="owl-carousel loop">
        @foreach($randomproducts as $randomproduct)
          <div align="center">
          <a href="{{ route('products.show',   $randomproduct->product_id  ) }}"  style="text-decoration:none;">
            <div class="card img-card">
             <img src="{{ ProductImage($randomproduct->image)}}" alt="{{$randomproduct->product_id}}" class="img img-fluid">
             <div class="overlay">
              <div class="text">
              <span><b><i class="fas fa-cart-plus"></i></b></span>
              </div>
            </div>
            </div>
            <div class="product-price">
              <p>{{\Illuminate\Support\Str::limit($randomproduct->product_name, 80)}} </p>
              @if($randomproduct->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($randomproduct->rating == 4.5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </span>
              @else
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
              </span>
              @endif
              <p class="text-dark"><b>$ {{number_format($randomproduct->product_price, 2)}}</b></p>
            </div>
</a>
          </div>
          @endforeach

        </div>


        <br><br>
        <h2 class="text-center"><b>Previously Viewed</b></h2>
        <br>
        <div class="owl-carousel loop">
        @foreach($mightlike as $like)
        <div align="center">
          <a href="{{ route('products.show',   $like->product_id  ) }}"  style="text-decoration:none;">
            <div class="card img-card">
             <img src="{{ ProductImage($like->image)}}" alt="{{$like->product_id}}" class="img img-fluid">
             <div class="overlay">
              <div class="text">
              <span><b><i class="fas fa-cart-plus"></i></b></span>
              </div>
            </div>
            </div>
            <div class="product-price">
              <p>{{\Illuminate\Support\Str::limit($like->product_name, 80)}} </p>
              @if($like->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($like->rating == 4.5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </span>
              @else
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
              </span>
              @endif
              <p class="text-dark"><b>$ {{number_format($like->product_price, 2)}}</b></p>
            </div>
</a>
          </div>
          @endforeach

        </div>

      </div>

      <br><br>
      <div class="contact-area">
         <div class="row">
           <div class="col-md-6" align="center">
             <h4 class="text-white"><b>Contact Us</b></h4>
             <p class="text-white">Address : 230 Calle Federico Costa</p>
             <p class="text-white">Email : support@thebestbuy.com</p>
             <p class="text-white">Tel : (787) 760-4700</p>
           </div>
           <div class="col-md-6">
             <br>

             <form action="/sendmail" method="post">
               @csrf
               <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                   <input type="text" name="name" id="name" class="form-control form-input" placeholder="Name" required>
                  </div>
                 </div>
                 <div class="col-sm-6">
                  <div class="form-group2">
                   <input type="email" name="email" id="email" class="form-control form-input" placeholder="Email" required>
                   </div>
                 </div>
               </div>

               <br>
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <input type="tel" name="tel" id="tel" class="form-control form-input" placeholder="Phone Number" required>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group2">
                  <input type="text" name="address" id="address" class="form-control form-input" placeholder="Address" required>
                </div>
                </div>
              </div> 

              <br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                  <input type="text" name="subject" id="subject" class="form-control form-input" placeholder="Subject" required>
                </div>
                </div>
              </div>
              
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                  <textarea name="message" id="message" cols="30" rows="4" class="form-control form-input" placeholder="Enter Message" required></textarea>
                  </div>
                </div>
              </div>

              <br>
              <div class="d-grid">
                <button class="btn btn-submit" type="submit">Submit</button>
              </div>
             </form>

           </div>
         </div>
      </div>




    @endsection
