<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    use HasFactory, SoftDeletes;

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
            $q->where($data['dataFilter']);
		}
    }

	public function scopeSearch($q, array $data = array())
	{
		if (!empty($data['dataSearch'])) {
            $fields = array_filter($data['dataSearch'], 'strlen');
            $q->where(function ($query) use ($fields) {
                foreach ($fields as $field => $value) {
                    if (isset($fields[$field])) {
                        $query->orWhere($field, 'LIKE', "%$fields[$field]%");
                    }
                }
            });
		}
        if (isset($data['commonSearch']['sortBy']) && ($data['commonSearch']['sortOrder'])) {
            return $q->orderBy($data['commonSearch']['sortBy'], $data['commonSearch']['sortOrder']);
        }
	}
}