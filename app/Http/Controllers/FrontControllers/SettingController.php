<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('setting.list', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = new Setting;   
        return view('setting.add', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }

        // $url = "";
        
        // if ($request->hasFile('logo')) {
        //     //  Let's do everything here
        //     if ($request->file('logo')->isValid()) {

        //         $extension = $request->image->extension();
        //         $request->image->storeAs('/public', $request->name.".".$extension);
     
        //         $url = Storage::url($request->name.".".$extension);
        //         $file = File::create([
        //            'name' => $request->name,
        //             'url' => $url,
        //         ]);
        //     }
        // }    

        $file = $request->file('logo');
        $fileName = setName($file->getClientOriginalName());
        $path = storage_path('app/public/images');
        $file->move($path, $fileName);
        $url = str_replace("%2F", "/", url('storage/images', $fileName));

        $pfile = $request->file('pdf_logo');
        $pfileName = setName($pfile->getClientOriginalName());
        $path = storage_path('app/public/images');
        $pfile->move($path, $pfileName);
        $purl = str_replace("%2F", "/", url('storage/images', $pfileName));
        
        $setting = new Setting;
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->state = $request->state;
        $setting->city = $request->city;
        $setting->zip = $request->zip;
        $setting->logo = $url;
        $setting->pdf_logo = $purl;
        $setting->save();

        return redirect(route('setting.list'))->with('status', 'Setting saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$id) {
            return redirect(route('setting.list'))->back()->withErrors(array('Opps! there is some problem.'));
        }

        $setting = Setting::find($id);
        $data = array(
            'setting' => $setting
        );

        return view('setting.add', $data);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make(request()->input(), [
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }

        $setting = Setting::find($id);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $fileName = setName($file->getClientOriginalName());
            $path = storage_path('app/public/images');
            $file->move($path, $fileName);
            $url = str_replace("%2F", "/", url('storage/images', $fileName));
        } else {
            $url = $setting->logo;
        }

        if ($request->file('pdf_logo')) {
            $pfile = $request->file('pdf_logo');
            $pfileName = setName($pfile->getClientOriginalName());
            $path = storage_path('app/public/images');
            $pfile->move($path, $pfileName);
            $purl = str_replace("%2F", "/", url('storage/images', $pfileName));
        } else {
            $purl = $setting->logo;
        }

        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->state = $request->state;
        $setting->city = $request->city;
        $setting->zip = $request->zip;
        $setting->logo = $url;
        $setting->pdf_logo = $purl;
        $setting->save();
        
        return redirect(route('setting.list'))->with('status', 'Setting updated successfully!');
    }
}
