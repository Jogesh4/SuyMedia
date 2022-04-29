<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\Variant;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('loginId')){
            $packages = Package::orderBy('id','desc')->get();

            return view('admin.manage_package',compact('packages'));
        }
        else{
              return redirect()->route('adminlogin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('loginId')){

            $categories = Category::where('status',1)->orderBy('id','asc')->get();

            $variants = Variant::where('package_id', '')->get();

            return view('admin.create-package',compact('categories','variants'));
        }
        else{
              return redirect()->route('adminlogin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package();
        $package->name = $request->name;
        $package->period = $request->period;
        $package->description = $request->description;
        $package->price = $request->total;
        $package->category_id = $request->category;

        if($request->hasfile('image'))
        {
            $file= $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/package',$filename);
            $package->image = $filename;
        }

        if($package->save()){

            if(is_array($request->qty)) {
                if(!empty($request->qty[0])){
                    $prices = $request->price;
                    $qties = $request->qty;
                    for($i=0; $i<count($qties);$i++){

                        $variant = Variant::where(['package_id' => $package->id,'qty' => $qties[$i]])->first();

                        if(!$variant){
                            $variant = new Variant;
                        }
                      
                            $variant->price=$prices[$i];
                            $variant->qty=$qties[$i];
                            $variant->package_id=$package->id;
                            $variant->save();
                    }
              }
            }

        }

        return redirect()->back()->with('success','Package created Successfully!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session()->has('loginId')){
             $package = Package::where('id',$id)->first();

            $categories = Category::where('status',1)->orderBy('id','asc')->get();

            $variants = Variant::where('package_id', $id)->get();
            
            return view('admin.create-package',compact('categories','variants','package'))->with('package',$package);;
        }
        else{
              return redirect()->route('adminlogin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Package $package)
    {
        $package = new Package();
        $package->name = $request->name;
        $package->period = $request->period;
        $package->description = $request->description;
        $package->price = $request->total;
        $package->category_id = $request->category;

        if($request->hasfile('image'))
        {
            $file= $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/package',$filename);
            $package->image = $filename;
        }

        if($package->save()){

            if(is_array($request->qty)) {
                if(!empty($request->qty[0])){
                    $prices = $request->price;
                    $qties = $request->qty;
                    for($i=0; $i<count($qties);$i++){

                        $variant = Variant::where(['package_id' => $package->id,'qty' => $qties[$i]])->first();

                        if(!$variant){
                            $variant = new Variant;
                        }
                      
                            $variant->price=$prices[$i];
                            $variant->qty=$qties[$i];
                            $variant->package_id=$package->id;
                            $variant->save();
                    }
              }
            }

        }

        return redirect()->back()->with('success','Package created Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
