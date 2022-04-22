<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Validation\Rule;

use App\Models\Upload;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telephone_ddd',
        'telephone',
        'telephone_whatsapp',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function rules($id = null)
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|string|max:255|'.Rule::unique('users')->ignore($id),
            'telephone_ddd' => 'required|integer',
            'telephone' => 'required|integer',
            'telephone_whatsapp' => 'sometimes|boolean',
            'password' => 'sometimes|required|confirmed|string|min:8',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'Campo de preenchimento obrigatório',
            'telephone.integer' => 'Preencha o telefone apenas com números',
            'telephone_ddd.integer' => 'Preencha o DDD apenas com números',
            'email.unique' => 'Email já cadastrado no sistema',
            'boolean' => 'O dado enviado não segue o padrão exigido',
            'email' => 'Os dados informado não segue o padrão de EMAIL',
            'password.confirmed' => 'As senhas não conferem!'
        ];
    }

    public function photo()
    {
        return $this->hasOne(Upload::class);
    }
}
