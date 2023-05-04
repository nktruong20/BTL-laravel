<?php 
namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Client;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $bedProduct = Product::orderBy('id','DESC')->where('category_id',2)->limit(8)->get();
        $kitProduct = Product::orderBy('id','DESC')->where('category_id',4)->limit(8)->get();
        $workProduct = Product::orderBy('id','DESC')->where('category_id',3)->limit(8)->get();
        $decorProduct = Product::orderBy('id','DESC')->where('category_id',5)->limit(8)->get();
        $livingProduct = Product::orderBy('id','DESC')->where('category_id',1)->limit(8)->get();
        return view('home', compact('livingProduct','bedProduct','kitProduct','workProduct','decorProduct'));
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function detail(Product $product){
        return view('detail',compact('product'));
    }

    public function check_login(Request $req)
    {
        $data = $req->only('email','password');
        $checkData = Auth::guard('checkpass')->attempt($data,$req->has('remember'));
        if($checkData){
            return redirect()->route('home.index');
        }else{
            return redirect()->back()->with('no','tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function check_register(Request $request){
        $data = $request->only('email','password','name');
        $data['password'] = bcrypt($request->password);
        if(User::create($data)){
            return redirect()->route('home.login')->with('yes','Thanh Cong');
        }
    }

    public function category(Category $id)
    {
        $products  = $id->products()->paginate(10);
        return view('category',compact('id','products'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function customer(){
        $auth = auth('checkpass')->user();
        return view('customer', compact('auth'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function send_contact()
    {
        $name = request('name');
        $email = request('email');
        $subject = request('subject');
        $content = request('content');

        $send = Mail::to($email)->send(new ContactMail($name, $content, $subject));


    }
}