<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

// use Illuminate\Support\Facades\Auth;

use App\Profile;

use App\User;

use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    
    public function index()
    {
        $this->user_id =   Auth::user()->id;
        $user =User::find($this->user_id);
        $profile=$user->profile;
        if(is_null($profile)){
            return view('profile');
        }
        else {
            // dump('else');
            // return view('profile')->with(compact('profile'));
            return view('profile',['profile_data'=>$profile]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $profile = new Profile([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'user_id' => Auth::user()->id,
            'Gender' => $request->get('Gender'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = str_slug(Auth::user()->name.Auth::user()->id).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/profile-images');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $profile->profile_image = $name;
            $profile->profile_url= str_slug(Auth::user()->name.Auth::user()->id);
          }
        $profile->save();
        return redirect('/profile')->with('success', 'Profile saved!');
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
        $profile = Profile::find($id);
        return view('profile', compact('profile'));   
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile = Profile::find($id);
        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->user_id = Auth::user()->id;
        $profile->Gender = $request->get('Gender');
        $profile->job_title = $request->get('job_title');
        $profile->city = $request->get('city');
        $profile->country = $request->get('country');
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = str_slug(Auth::user()->name.Auth::user()->id).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/profile-images');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $profile->profile_image = $name;
          }
        $profile->profile_url= str_slug(Auth::user()->name.Auth::user()->id);
        $profile->save();
        return redirect('/profile')->with('success', 'Profile saved!');
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

    public function all_profiles()
    {
        $profiles = Profile::all();
        return view('profiles',compact('profiles'));
    }

    public function view(Request $request,$slug)
    {
        $profile = Profile::where('profile_url', $slug)->first();
        if(isset($profile))
            return view('profileView', ['profile' => $profile]);
        return "user not found!";
    }
}
