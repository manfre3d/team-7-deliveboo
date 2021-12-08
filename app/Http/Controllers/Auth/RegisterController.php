<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\RestaurantType;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $restaurant_types = RestaurantType::all();
        return view('auth.register', compact('restaurant_types'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'address' => ['required', 'string','max:150'],
            'piva' => ['required', 'numeric','min:00000000001','max:99999999999'],
            'image' => ['nullable','mimes:jpeg,jpg,png','max:1000'],
            'description' => ['nullable','string'],
            'new_restaurant_type' => ['required_without:restaurant_type'],
            'restaurant_type' => ['required_without:new_restaurant_type']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if (array_key_exists('new_restaurant_type', $data)) 
        {
            foreach ($data['new_restaurant_type'] as $elm) {
                $newType = RestaurantType::create([
                    'name' => $elm,
                    'slug' => $this->getSlug($elm)
                ]);
                $data['restaurant_type'][] = $newType['id'];                
            }
        }

        if ( array_key_exists('image', $data) ) 
        {
            $coverPath = Storage::put('restaurant_covers',$data['image']);
        } 
        else 
        {
            $coverPath = null;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'piva' => $data['piva'],
            'description' => $data['description'],
            'slug' => $this->getSlug($data['name']),
            'img_path' => $coverPath,
        ]);

        if (array_key_exists('restaurant_type', $data)) 
        {
            $user->restaurantsTypes()->attach($data['restaurant_type']);
        }

        return $user;
    }


    // funzione per ricavare lo slug da name
    private function getSlug($name)
    {
        $slug = Str::of($name)->slug('-');

        $userExist = User::where("slug", $slug)->first();

        $count = 2;
        
        while($userExist) 
        {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $userExist = User::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
