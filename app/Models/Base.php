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

    public function scopeBetweenDate($q, array $data = array())
    {
        if (!empty($data['dateFilter'])) {
            $fields = json_decode($data['dateFilter'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::except($fields, static::$filterable);
            if (isset($fields['to']) && isset($fields['from']) && isset($fields['field'])) {
                $contains = Str::of($fields['field'])->contains('.');
                $relations = Str::of($fields['field'])->explode('.');
                if ($contains) {
                    $q->whereDate(Str::camel($relations[0]), function ($q) use ($relations, $fields) {
                        $q->whereDate($relations[1], '>=', $fields["from"])
                        ->whereDate($relations[1], '<=', $fields["to"]);
                    });
                } else {
                    $q->whereDate($fields['field'], '>=', $fields["from"])
                        ->whereDate($fields['field'], '<=', $fields["to"]);
                }
            }
        }
    }

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
        $this->filterEqual($q, $data);
    }
    public function filterEqual($q, array $data = array())
	{
		if (!empty($data['dataEqualFilter'])) {
            $fields = json_decode($data['dataEqualFilter'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], $fields[$field]);
							});
						} else {
							$query->where($field, $fields[$field]);
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
            $q->orWhere(function ($query) use ($fields) {
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

    public function scopeFilterWhereIn($q, array $data = array())
	{
		if (!empty($data['whereIn'])) {
			$fields = json_decode($data['whereIn'], true);
			$fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field]) && count($fields[$field]) > 0) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->whereIn($relations[1], $fields[$field]);
							});
						} else {
							$query->whereIn($field, $fields[$field]);
						}
					}
				}
			});
		}
	}

    public function scopeMorphSearch($q, array $data = array())
	{
        if (!empty($data['polyMorphSearch'])) {
            $q->where(function ($q) use ($data) {
                collect($data['polyMorphSearch'])
                    ->each(function($polySearch) use($q) {
                        $search = json_decode($polySearch, true);
                        $q->orWhereMorphRelation('ownerable', $search['morphs'], function ($q) use($search) {
                            foreach ($search['fields'] as $field => $value) {
                                $q->orWhere($field, 'LIKE', "%$value%");
                            }
                        });
                    });
                });
		}
	}
}
