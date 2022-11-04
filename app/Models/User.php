<?php

namespace App\Models;

use App\Models\Empresa\Colaborador;
use App\Models\Hive\BeeConta;
use App\Traits\Uuids;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
	use Uuids;
	use MustVerifyEmail;
	use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'email',
        'password',
        'tipo',
        'password',
        'unique_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'cpf';
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	protected $appends = [
		'dados_conta',
        'id_colaborador',
        // Deprecated adapt
        'bee_account_id',
	];

    public function getImagemPerfilAttribute()
    {
        if (!$this->attributes['imagem_perfil']) {
            return "avatar/avatar_padrao.jpg";
        } else {
            return $this->attributes['imagem_perfil'];
        }
    }

    public function getDadosContaAttribute(){
        // TODO :: Make it better
        if($this->beetConta){
            return $this->beetConta->load('pessoa');
        }
    }

    /** Métodos Auxiliares **/
    public function getBeeContaIdAttribute()
	{
		return $this->bee_conta;
	}


	/** Métodos Auxiliares **/
	public function beetConta()
	{
		return $this->belongsTo(BeeConta::class, 'bee_conta', 'id');
	}

	public function getIdColaboradorAttribute()
	{
        $colab = Colaborador::where('id_usuario',\Auth::id())->first();
        if($colab){
            return $colab->id;
        }else{
            return 0;
        }
	}

    /** Another Methods */

    /**
     * Login user by his username, or CPF
     */
    public function findForPassport($identifier)
    {
        return $this->orWhere('username', $identifier)
            ->orWhere('cpf', $identifier)->first();
    }

    /**
     * Deprecated:
     * In future we have to change the columns to english, but for now we just adapt
     */
    // Set the map to use the english terms
    protected $maps = [
        'bee_conta' => 'bee_account_id'
    ];
    // Functions to Map the Get
    public function getBeeAccountIdAttribute(){ // Bee Account ID
        return $this->attributes['bee_conta'];
    }
    /**
     * Deprecated ↑↑↑:
     * We can't create a new User Model, so we have to change this file with caution
     */

    /**
     * Return only Author Data, removing some sensitive data from the result
     */
    public function asAuthor(){
        return (object) [
            'id' => $this->attributes['id'],
            'name' => $this->attributes['name'],
            'image' => $this->attributes['imagem_perfil']
        ];
    }

    /**
     * Check if user have a certain role
     */
    public function isMasterAdmin(){
        // Check if the role field is 'master_admin'
        if($this->attributes['role'] == 'master_admin')
            return true;
        // Not master admin
        return false;
    }
    /**
     * Check if user belongs to a certain bee account
     */
    public function belongsToAccount($id){
        // Checking
        return ($this->bee_account_id == $id);
    }

}
