


<p style=color:red><b>Choose your Favourite Restaurant </b> </p>

<!-- @foreach($companies as $company)

<option  data-content="<img class='email' src='{{ productImage($company->company_logo)}}'>">{{$company->company_name}} </option>
<a href="{{ route('products.index', ['subdomain' => $company->subdomain]) }}" class="menu-item"><div class="row     @if ($company->subdomain == $currentsubdomain)   active-menu  @endif ">
                            <div class="col-md-4">
                                <img src="{{ productImage($company->company_logo)}}" alt="mc-donalds-menu" width="100%" style="max-width: 100px !important;" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                                 <h5 class="menu-name">{{$company->company_name}}</h5>
                            </div>
                        </div></a>
                        <br>
                        @endforeach -->



                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggling" data-toggle="dropdown" style="width:20em"  aria-haspopup="true" aria-expanded="false">

                            Select Restaurant
                            <span class="glyphicon glyphicon-chevron-down"><b><i class="fa fa-angle-down" aria-hidden="true"></i></b></span>
                          </button>

                          <ul class="dropdown-menu" id="dropdown-menu" style="width:20em" >
                          @foreach($companies as $company)
                            <!-- <li class="dropdown-header">Member name (you)</li> -->
                            <li>
                              <a href="{{ route('products.index', ['subdomain' => $company->subdomain]) }}" title="Mcdonalds" class="menu-item"><img src="{{ productImage($company->company_logo)}}" alt="{{$company->company_name}}" width="100%" style="max-width: 60px !important;" class="img-responsive">{{$company->company_name}}</a>
                            </li>
                            @endforeach
                          </ul>
                        </div>


