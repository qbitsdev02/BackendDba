<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Arr;

/**
 * @OA\Schema(
 *   schema="User",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The user name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The Users password"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       required={"true"},
 *       type="string",
 *       description="The Users email"
 *   ),
 *   @OA\Property(
 *       property="password",
 *       type="string",
 *       required={"true"},
 *       description="The Users password"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users crete"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users update"
 *   ),
 * )
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'user_created_id',
        'user_updated_id'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $filterable = ["name", "last_name", "email"];
	/**
	 * Search function of fields in the database.
	 *
	 * @param array fields for searches
	 *
	 * @return results data
	 */
	// llamada por wh? dejame quitarle el telefono a mi madre

    public function scopeFilters($q, array $data = array())
	{
		if (!empty($data['dataFilter'])) {
            $fields = json_decode($data['dataFilter'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::only($fields, static::$filterable);
            $q->where($fields);
		}
    }

	/**
	 * Search function of fields in the database.
	 *
	 * @param array fields for searches
	 *
	 * @return results data
	 */
	// llamada por wh? dejame quitarle el telefono a mi madre

	public static function scopeSearch($q, array $data = array())
	{
		if (!empty($data['dataSearch'])) {
            $fields = json_decode($data['dataSearch'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::only($fields, static::$filterable);
            $q->where(function ($query) use ($fields, $data) {
                foreach ($fields as $field => $value) {
                    if (isset($fields[$field])) {
                        $query->orWhere($field, 'LIKE', "%$fields[$field]%")->orderBy($data['sortField'], $data['sortOrder']);
                    }
                }
            });
		}
		if (isset($data['paginate']) && $data['paginate'] === "true") {
			return $q->paginate($data['perPage']);
		} else {
			return $q->get();
		}
	}

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')
            ->using(RoleUser::class);
    }
}
