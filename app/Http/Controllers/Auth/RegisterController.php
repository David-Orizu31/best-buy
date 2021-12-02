<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Subcategory;
use App\Company;
use App\Product;
use App\Category;
use App\MainCategory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Request;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
            return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function showRegistrationForm()
    {
        $companies =  Company::all();
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('auth.register', compact( 'companies','subcategories','maincategory','category' ) );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    //    dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['required'],
            'subdomain' => ['unique:companies'],
            // 'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
// dd($data['position']);
    $unique_id = substr(Uuid::uuid1().date('YmdHis'), 20);
        // dd($data->position == "buyer");
        if($data['position'] == "buyer"){

                    if(Request::hasFile('image')) {

                        $image = Request::file('image');
                        // dd($image);
                      $filenameWithExt    = $image->getClientOriginalName();
                      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                         $extension = Request::file('image')->getClientOriginalExtension();
                        $image_resize = \Image::make($image->getRealPath());
                        $image_resize->resize(200, 200);
                         $fileNameToStore= $filename.'_'.time().'.'.$extension;
                 $image_resize->save(public_path('storage/'.  $fileNameToStore ));
                //  dd($fileNameToStore);
                    } else {
            // empty.....the helper will take care of if there is no image
                    }
                    $user =  User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'tel' => $data['tel'],
                        'address' => $data['address'],

                        // 'username' => $data['username'],
                        'landmark' => $data['landmark'],

                        'password' => $data['password'],
                        'avatar' => $fileNameToStore ?? null,
                       'company_id' => null ,

                        'gender' => $data['gender'],

                    ]);



        }elseif($data['position'] == "seller"){

            $unique_id = Uuid::uuid1();
                     if(Request::hasFile('image')) {

                        $image = Request::file('image');
                        // dd($image);
                      $filenameWithExt    = $image->getClientOriginalName();
                      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                         $extension = Request::file('image')->getClientOriginalExtension();
                        $image_resize = \Image::make($image->getRealPath());
                        $image_resize->resize(200, 200);
                         $fileNameToStore= $filename.'_'.time().'.'.$extension;
                 $image_resize->save(public_path('storage/'.  $fileNameToStore ));
                //  dd($fileNameToStore);
                    } else {
            // empty.....the helper will take care of if there is no image
                    }
                    $user =  User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'tel' => $data['tel'],
                        'address' => $data['address'],

                        // 'username' => $data['username'],
                        'landmark' => $data['landmark'],

                        'password' => $data['password'],
                        'avatar' => $fileNameToStore ?? null,
                       'company_id' => $unique_id ,

                        // 'gender' => $data['gender'],

                    ]);


               return     Company::create([
                        'company_name' => $data['name'],
                        'company_unique_id' => $unique_id ,
                        'company_email' => $data['email'],
                        'company_address' => $data['address'],
                        'company_number' => $data['tel'],
                        'company_logo' => $fileNameToStore ?? null,
                        'company_landmark' => $data['landmark'],
                        'subdomain' => $data['subdomain'],


                    ]);


        }else{

        }


        return $user;
    }
}
