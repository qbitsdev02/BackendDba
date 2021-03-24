<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Base extends Model
{
    use HasFactory, SoftDeletes;

	public static $filterable = [];

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
						$contains = Str::of($field)->contains('.');
						$containsPivot = Str::of($field)->contains('pivot');
						$relations = Str::of($field)->explode('.');
						// if($containsPivot) {
						// 	$query->orWhereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
						// 		$fieldsPivots = json_decode(Str::of($fields[$field])->replace("'", '"'), true);
						// 		foreach ($fieldsPivots as $fieldsPivot => $fieldsPivotValues) {
						// 			foreach ($fieldsPivotValues as $fieldsPivotValue => $fieldsPivotValueValue) {
						// 				$fieldRelation = Str::of($fieldsPivotValue)->explode('.');
						// 				\Log::info($fieldsPivotValueValue);
						// 				// $q->where($fieldRelation[0], $fieldRelation[1])
						// 				// 	->wherePivot($fieldRelation[2], 'LIKE', "%$fieldsPivotValueValue%");
						// 			}
						// 		}
						// 	});
						// }
						if ($contains && !$containsPivot) {
							$query->orWhereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'LIKE', "%$fields[$field]%");
							});
						}
						
						if (!$contains && !$containsPivot) {
							$query->orWhere($field, 'LIKE', "%$fields[$field]%")
								->orderBy($data['sortField'], $data['sortOrder']);
						}
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
}