<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
 *       property="roles",
 *       type="array",
 *       required={"false"},
 *       @OA\Items(
 *           @OA\Property(property="role_id", type="number"),
 *           @OA\Property(property="branch_office_id", type="number")
 *       ),
 *       description="The Product attribute_types"
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
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;
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
        'phone',
        'phone_contact',
        'full_name_contact',
        'client_type_id',
        'email',
        'password',
        'user_created_id',
        'user_updated_id'
    ];

    protected $appends = ['full_name'];

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

    /**
     * Scope a query to return users of a type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $typeAcronym)
    {
        // Doesn't work on static methods
        return $query
            ->whereHas('roles', function ($q) use ($typeAcronym) {
                $q->where('acronym', $typeAcronym);
            });
    }

    public function getFullNameAttribute()
    {
        return "{$this->document_number} - {$this->name} {$this->last_name}";
    }

    public static $filterable = [];
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
            $fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'like', "%$fields[$field]%");
							});
						} else {
							$query->where($field, 'like', "%$fields[$field]%");
						}
                    }
                }
            });
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
            $fields = Arr::except($fields, static::$filterable);
            $q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->orWhereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'LIKE', "%$fields[$field]%");
							});
						} else {
							$query->orWhere($field, 'LIKE', "%$fields[$field]%");
						}
                    }
                }
            });
		}

        if(isset($data['sortBy']) && isset($data['sortOrder'])) {
            $q->orderBy($data['sortBy'], $data['sortOrder']);
        }

		if (isset($data['paginate']) && $data['paginate'] === "true" || isset($data['paginated']) && $data['paginated'] === "true") {
			return $q->paginate($data['perPage']);
		} else {
			return $q->get();
		}
	}

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'branch_office_role_user', 'user_id', 'role_id')
            ->using(BranchOfficeRoleUser::class);
    }

    public function branchOffices()
    {
        return $this->belongsToMany(BranchOffice::class, 'branch_office_role_user', 'user_id', 'branch_office_id')
            ->using(BranchOfficeRoleUser::class);
    }
}
