<?php

namespace Modules\UserData\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\UserData\Entities\User as EntitiesUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = EntitiesUser::all();
    
        return view('userdata::index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('userdata::user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:1|max:15',
            'phone'=>'required|min:1|max:11'
        ]);
        if($request->isMethod('post')){
            $us = EntitiesUser::create(
                [
                    'name'=>$request->input('name'),
                    'email'=>$request->input('email'),
                    'password'=>$request->input('password'),
                    'phone'=>$request->input('phone')
                ]
            );
            
            return redirect()->route('alluser')->with(['message'=>'Added new user']);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = EntitiesUser::find($id);
        return view('userdata::user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:1|max:15',
            'phone'=>'required|min:1|max:11'
        ]);
        
        $user = EntitiesUser::find($id)->first()->update(
            [
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
                'phone'=>$request->input('phone')
            ]
        );
       
        return redirect()->route('alluser')->with(['message'=>'Updated new user']);
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = EntitiesUser::where('id',$id)->first();
        $user->delete();
        return redirect()->route('alluser')->with(['message'=>'data is deleted']);
    }
}
