<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Pemilik;
use App\Transaksi;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function getLogin(){
        if(auth()->guard('web')->check() || auth()->guard('admin')->check() || auth()->guard('owner')->check()){
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->guard('web')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended();
        } else if (auth()->guard('admin')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect(route('admin.index'));
        } else if (auth()->guard('owner')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect(route('owner.index'));
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect login details!"]);
        }
    }

    public function logout(){
        if(auth()->guard('web')->check()){
            auth()->guard('web')->logout();
        }elseif(auth()->guard('admin')->check()){
            auth()->guard('admin')->logout();
        }elseif(auth()->guard('owner')->check()){
            auth()->guard('owner')->logout();
        }
        session()->flush();
        
        return redirect()->route('home');
    }

    public function getOwnerRegister(){
        return view('auth.ownerRegister');
    }
    
    public function postOwnerRegister(Request $request){
        $this->validate($request, [
            'name'          => 'required',
            'shop_name'     => 'required',
            'shop_address'  => 'required',
            'owner_address' => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
            'pict_1'        => 'required',
            'ktp'           => 'required',
            'username'      => 'required',
            'password'      => 'required|confirmed'
        ]);

        $file = $request->file('pict_1');
        $file2 = $request->file('ktp');
        $nama_file = time()."_".$file->getClientOriginalName();
        $nama_file2 = time()."_".$file2->getClientOriginalName();
        $tujuan_upload = 'img/shop';
        $tujuan_upload2 = 'img/shop';
		$file->move($tujuan_upload,$nama_file);
		$file2->move($tujuan_upload2,$nama_file2);

        Pemilik::create([
            'name'          => $request->name,
            'shop_name'     => $request->shop_name,
            'shop_address'  => $request->shop_address,
            'owner_address' => $request->owner_address,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'other_info'    => $request->other_info,
            'pict_1'        => $nama_file,
            'ktp'           => $nama_file2,
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'status'        => 0
        ]);

        return back()->with('success','Registered successfully!');
    }
    
    public function getUserRegister(){
        return view('auth.userRegister');
    }

    public function postUserRegister(Request $request){
        $this->validate($request, [
            'name'          => 'required',
            'phone_number'  => 'required',
            'address'       => 'required',
            'username'      => 'required',
            'password'      => 'required|confirmed'
        ]);
        
        $user = User::create([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'address'       => $request->address,
            'username'      => $request->username,
            'password'      => bcrypt($request->password)
        ]);
        
        Transaksi::create([
            'user_id'   => $user->id,
            'status'    => 0
        ]);
    }
}
