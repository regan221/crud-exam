<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session('user') == null) return redirect()->route('login-user');
        return view('profile.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(session('user') != null) return redirect()->route('dashboard');
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // try {

            $validator = Validator::make($request->all(),[
                'firstname' => ['required'],
                'middlename' => ['required'],
                'lastname' => ['required'],
                'email' => ['required'],
                'password' => ['required', Password::min(8)->mixedCase()->symbols()],
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = User::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)

            ]);


            // return view('login')->with('message', 'Account created successfully');
            return redirect()->route('login-user')->with('created', 'Account created successfully')->withInput();
            
            
        // } catch (\Throwable $th) {
            // return redirect()->route('login-user')->with('error', 'Something went wrong');
        // }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $data = User::find($id);
        if($data !== null && $data->count() > 0){
            $validated = $request->validate([
                'firstname' => "required",
                'middlename' => "required",
                'lastname' => "required",
                'email' => "required",
                'password' => "required",

            ]);

            if(!$validated){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data->update([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            session()->forget(['user', 'password']);
            session(['user' => $data]);
            session(['password' => $request->password]);

            // return session('user');
            return redirect()->back()->with('success', 'Profile Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request){

        

        try {
            $data = DB::table('users')
                    ->select('*')
                    ->where('email', '=', $request->email)
                    ->get();
            if($data->count() > 0){

                if(Hash::check($request->password, $data[0]->password)){

                        session(['user' => $data[0]]);
                        session(['curr_user_pass' => $request->password]);

                        $posts = Post::where('author', '=', session('user')->id)->orderBy('created_at', 'desc')->simplePaginate(5);
                        return view('post.index', ['posts' => $posts]);
                    
                }else{
                    return redirect()->back()->with('error', 'Please make sure your email and password is correct')->withInput();
                }
                
            }else{
                return redirect()->back()->with('error', 'Something went wrong')->withInput();
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 422,
                'message' => 'Something went wrong'
            ] , 422);
        }
        
    }

    
    public function logout(){
        session()->forget(['user', 'password']);
        return redirect()->route('login-user');
    }
}
