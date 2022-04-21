<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\Admin;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminauth(Request $request)
    {

            $admin = Admin::where('email',$request->input('email'))->where('status','1')->first();

      if($admin){        
       
                $admin = Admin::where('email',$request->input('email'))->first();

                if($admin){
                    
                    if($admin->password == $request->input('password')){
                        $request->session()->put('loginId',$admin->id);
                        // return redirect('/supplierdashboard');
                        return redirect()->route('admin-dashboard');
                    }
                    else{
                    return back()->with('fail','password not matched' );
                    }
                }
                else{
                    return back()->with('fail','Email is not registered' );
                }                  
          }
          else{
                    return back()->with('fail','Your Account is under Review!!!');

            } 
    }

    public function dashboard(Request $request){
       
       if(session()->has('loginId')){
            $categories = Category::orderBy('id','desc')->get();

            return view('admin.dashboard',compact('categories'));
        }
        else{
             return redirect()->route('adminlogin');
        }
    }

    public function adminlogout(){
        if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect('adminlogin');
        }
    }

    
}
