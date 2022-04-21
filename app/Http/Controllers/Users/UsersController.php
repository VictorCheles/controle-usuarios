<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use \Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function validation($request)
    {
        //validar Post
        $validator = Validator::make($request,$this->user->rules(),$this->user->feedback());

        if($validator->fails()){
            return response()->json(['errors' => 
                                        [
                                            'especific' => $validator->errors(),
                                            'error' =>'Existem erros no preenchimento'
                                        ],
                                        'request' => $request
                                    ], 400);
        }

        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->user->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $this->validation($request->all());
        
        if($validacao) return $validacao;
        
        $save = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone_ddd' => $request->telephone_ddd,
            'telephone' => $request->telephone,
            'telephone_whatsapp' => $request->telephone_whatsapp,
            'profile_picture' => $request->profile_picture,
            'password' => Hash::make($request->password),
        ]);
        

        if($save)
        {
            return response()->json(['success' => $save], 201);
        }

        return response()->json(['errors' =>['error' =>'Ocorreu um erro inesperado!'],'request' => $request->all()], 400);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->user->where('id',$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
    //falta a validacao

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'telephone_ddd' => $request->telephone_ddd,
            'telephone' => $request->telephone,
            'telephone_whatsapp' => $request->telephone_whatsapp,
            'profile_picture' => $request->profile_picture,
            'password' => $request->password != "" ? Hash::make($request->password) : $user->password,
        ]);

        if($save = $user->save())
        {
            return response()->json(['success' => $save], 201);
        }

        return response()->json(['errors' =>['error' =>'Ocorreu um erro inesperado!'],'request' => $request->all()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete())
        {
            return response()->json(['success' => 'Registro deletado com sucesso!'], 201);
        }

        return response()->json(['errors' =>['error' =>'Ocorreu um erro inesperado!']], 400);
    }
}
