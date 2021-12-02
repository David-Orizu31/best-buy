@extends('layouts.app')

@section('content')

          @include('flash::message')

            <div class="container" id="refresh">
                <br><br>
               <div class="row">
                   <div class="col-md-6">
                     <div class="slider-for">
                      <img src="{{ Voyager::image($product->image)}}" alt="{{$product->product_name}}" class="img img-responsive">
                      </div>
                       <br>
                      <div class="owl-carousel loop">
                      @foreach($highdemands as $highdemand)
                <div>
                  <a href="{{ route('products.show',   $highdemand->product_id  ) }}"  id="myButton" class="slider-link text-dark">
                   <div class="image-slider" align="center">
                      <img src="{{ Voyager::image($highdemand->image)}}" alt="" width="100px" height="100px" class="img-responsive">
                      {{-- <p class="item-featuring text-center">{{$highdemand->product_name}} <br>
                        <span><b>$ {{number_format($highdemand->product_price, 2)}}</b></span> --}}
                  </div>
                  </a>

                </div>
@endforeach

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function() {
  $("#myButton").click(function() {

    $("#refresh").load(location.href + " #refresh > *");

  });
});
</script>
                      </div>
                   </div>
                   <div class="col-md-6">

                      <br>
                      <h3 class="product-intro">{{$product->product_name}}</h3>
                      @if($product->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($product->rating == 4.5)
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
                      <h4 class="product-intro"><b>$ {{number_format($product->product_price, 2)}}</b> </h4>

              <br>

                    <label for="qty">Quantity:</label>



                      <form action="{{ route('cart.store',$product) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <input type="hidden" name="name" value="{{ $product->product_name }}">
                    <input type="hidden" name="price" value="{{ $product->product_price }}">
                    <input type="hidden" name="image" value="{{ productImage($product->image)}}">

                    <select   style="width:15em" class="form-control sorting" name="quantity" id="category">

                            @for ($i = 1; $i < $product->product_quantity + 1 ; $i++)
                            {{-- <option >{{ $i }}</option>  --}}

                            <option> {{ $i }}</option>

                            @endfor

                      </select>
                    <br><br>

                    <div class="d-grid">
                    <button type="submit" class="btn btn-submit">  <i class="fa fa-shopping-cart shopping"></i> Add to Cart</button>
</div>

                </form>
                      <!-- <span style="font-size: 18px;"> Quantity</span>
                      <select name="quantity" id="quantity" class="dropdown">
                          <option value="1" selected>1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                       </select>

                       <br><br> -->


                   </div>
               </div>

               <br><br>
               <h2>Description Information</h2>
               <br>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Item Summary</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ingredients & Allergens</a>
                  </li> -->

                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <br>
                     <table class="teble-responsive">
                      <tr>
                          <td><b>Detailed Description</b></td>
                          <!-- <td></td> -->
                      </tr>
                     <tr>
                          <!-- <td><b>{{$product->product_description}}</b></td> -->
                          <td>{{$product->product_description}}</td>
                      </tr>
                      <!--  <tr>
                          <td><b>Calcium</b></td>
                          <td>(15% Daily Value)</td>
                      </tr>
                      <tr>
                          <td><b>Trans Fat</b></td>
                          <td>1g</td>
                      </tr>
                      <tr>
                          <td><b>Total Sugars</b></td>
                          <td>9g</td>
                      </tr>
                      <tr>
                          <td><b>Iron</b></td>
                          <td>(25% Daily Value)</td>
                      </tr>
                      <tr>
                          <td><b>Cholesterol</b></td>
                          <td>80mg (26% Daily Value)</td>
                      </tr>
                      <tr>
                          <td><b>Vitamin D</b></td>
                          <td>(0% Daily Value)</td>
                      </tr>
                      <tr>
                          <td><b>Potassium</b></td>
                          <td>(8% Daily Value)</td>
                      </tr>
                      <tr>
                          <td><b>Sodium</b></td>
                          <td>1010mg (44% DV)</td>
                      </tr> -->
                     </table>
                  </div>
                  <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <br>
                      <p>100% Beef Patty <br> Ingredients: 100% Pure Usda Inspected Beef; No Fillers, No Extenders. <br>Prepared With Grill Seasoning (salt, Black Pepper).</p>
                      <br>
                      <p>Shredded Lettuce</p>
                      <p>Ingredients: Lettuce.</p>
                      <br>
                      <p>Big Mac Sauce</p>
                      <p>Ingredients: Soybean Oil, Sweet Relish (Diced Pickles, Sugar, High Fructose Corn Syrup, Distilled Vinegar, Salt, Corn Syrup, Xanthan Gum, Calcium Chloride, Spice Extractives), Water, Egg Yolks, Distilled Vinegar, Spices, Onion Powder, Salt, Propylene Glycol Alginate, Garlic Powder, Vegetable Protein (Hydrolyzed Corn, Soy and Wheat), Sugar, Caramel Color, Turmeric, Extractives of Paprika, Soy Lecithin.</p>
                      <p>Contains: Egg, Soy, Wheat.</p>
                      <br>
                      <p>Big Mac Bun</p>
                      <p>Ingredients: Enriched Flour (Wheat Flour, Malted Barley Flour, Niacin, Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Sugar, Yeast, Soybean Oil, Contains 2% or Less: Salt, Wheat Gluten, Sesame Seeds, Potato Flour, May Contain One or More Dough Conditioners (DATEM, Ascorbic Acid, Mono and Diglycerides, Enzymes), Vinegar.</p>
                      <p>Contains: Wheat.</p>
                      <br>
                      <p>Pasteurized Process American Cheese <br>
                          Ingredients: Milk, Cream, Water, Sodium Citrate, Salt, Cheese Cultures, Citric Acid, Enzymes, Soy Lecithin, Color Added.</p>
                      <p>Contains: Milk, Soy.</p>
                      <br>
                      <p>Ketchup</p>
                      <p>Ingredients: Tomato Concentrate from Red Ripe Tomatoes, Distilled Vinegar, High Fructose Corn Syrup, Corn Syrup, Water, Salt, Natural Flavors.</p>
                      <br>
                      <p>Pickle Slices</p>
                      <p>Ingredients: Cucumbers, Water, Distilled Vinegar, Salt, Calcium Chloride, Alum, Potassium Sorbate (Preservative), Natural Flavors, Polysorbate 80, Extractives of Turmeric (Color).</p>
                      <br>
                      <p>Onions</p>
                      <p>Ingredients: Onions.</p>
                      <br>
                      <p>Mustard</p>
                      <p>Ingredients: Distilled Vinegar, Water, Mustard Seed, Salt, Turmeric, Paprika, Spice Extractive.</p>
                  </div> -->
                </div>

                <!-- <br><br>
                <div class="slider-images-area">
                  <h3 class="text-center header" style="color: rgb(248, 174, 36);">Big Mac Ingredients</h3>
                <div class="featured">
                  <div class="slider-image">
                      <img src="../../ingredient-img/100%-beef-patty.png" alt="mcdonalds-beef-patty" width="90%" class="img-responsive">
                      <p class="food-title text-center" style="max-width: 200px;">100% Beef Patty</p>
                  </div>

                  <div class="slider-image">
                      <img src="../../ingredient-img/pickles slices.png" alt="mcdonalds-pickles-slices" width="90%" class="img-responsive">
                      <p class="food-title text-center" style="max-width: 200px;">Pickles Slices</p>
                  </div>
                  <div class="slider-image">
                      <img src="../../ingredient-img/ingredient_american_cheese.png" alt="mcdonalds-pasteurised-cheese" width="90%" class="img-responsive">
                      <p class="food-title text-center" style="max-width: 200px;">Pasteurized Process American Cheese</p>
                  </div>
                  <div class="slider-image">
                      <img src="../../ingredient-img/quarter_pounder_bun.png" alt="mcdonalds-bigmac-bun" width="90%" class="img-responsive">
                      <p class="food-title text-center" style="max-width: 200px;">Big Mac Bun</p>
                  </div>
                  <div class="slider-image">
                      <img src="../../ingredient-img/reconstituted_onions.png" alt="mcdonalds-onions" width="90%" class="img-responsive">
                      <p class="food-title text-center" style="max-width: 200px;">Sliced Onions</p>
                  </div>
                  <div class="slider-image">
                    <img src="../../ingredient-img/big_mac_sauce.png" alt="mcdonalds-bigmac-sauce" width="90%" class="img-responsive">
                    <p class="food-title text-center" style="max-width: 200px;">Big Mac Sauce</p>
                </div>
                <div class="slider-image">
                    <br>
                    <img src="../../ingredient-img/shredded-lettuce.jpg" alt="mcdonalds-lettuce" width="90%" class="img-responsive">
                    <p class="food-title text-center" style="max-width: 200px;">Shredded Lettuce</p>
                </div>
                </div>
                </div>
            </div> -->

            <br><br>
                <div class="slider-images-area">
                  <h3 class="text-center header" style="color: rgb(248, 174, 36);">Might Like</h3>
                <div class="owl-carousel loop">
@foreach($mightlike as $like)
                  <div class="slider-image">
                    <a href="{{ route('products.show',   $like->product_id  ) }}" class="menu-item" style="text-decoration:none;">
                      <img src="{{ ProductImage($like->image)}}" alt="{{$like->product_name}}" width="90%" height="280px" class="img-responsive">
                      <p class="menu-product text-center"></p>
                      <p class="cart-details text-center text-dark"><b>$ {{number_format($like->product_price, 2)}}</b></p>
                      </a>
                  </div>

                  @endforeach
                  <!-- <div class="slider-image">
                    <a href="#" class="menu-item">
                      <img src="../../img/quarter-pounder-with-cheese-bacon.jpg" alt="sweet-november-pickles-slices" width="90%" class="img-responsive">
                      <p class="menu-product text-center">Quarter Pounder with Cheese Bacon</p>
                      <p class="cart-details text-center"><b>$ 5,000</b></p>
                      </a>
                  </div>
                  <div class="slider-image">
                    <a href="#" class="menu-item">
                      <img src="../../img-2/cheeseburger.jpg" alt="sweet-november-ingredient-american-beef" width="90%" class="img-responsive">
                      <p class="menu-product text-center">Cheeseburger</p>
                              <p class="cart-details text-center"><b>$ 3,000</b></p>
                              </a>
                  </div>
                  <div class="slider-image">
                    <a href="#" class="menu-item">
                      <img src="../../img-2/quarter-pounder-with-cheese-deluxe-burger.jpg" alt="sweet-november-quarter-pounder-bun" width="90%" class="img-responsive">
                      <p class="menu-product text-center">Quarter Pounder with Cheese Deluxe</p>
                      <p class="cart-details text-center"><b>$ 5,000</b></p>
                      </a>
                  </div>
                  <div class="slider-image">
                    <a href="#" class="menu-item">
                      <img src="../../img-2/Double-Cheeseburger.jpg" alt="sweet-november-sliced-onions" width="90%" class="img-responsive">
                      <p class="menu-product text-center">Double Cheeseburger</p>
                      <p class="cart-details text-center"><b>$ 4,000</b></p>
                      </a>
                  </div>
                  <div class="slider-image">
                    <a href="#" class="menu-item">
                    <img src="../../img-2/double-quarter-pounder-with-cheese.jpg" alt="sweet-november-sliced-onions" width="90%" class="img-responsive">
                    <p class="menu-product text-center">Double Quarter Pounder with Cheese</p>
                    <p class="cart-details text-center"><b>$ 6,000</b></p>
                    </a>
                </div> -->
                </div>
                </div>
            </div>



    @endsection
