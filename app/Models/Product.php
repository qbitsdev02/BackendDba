<?php

namespace App\Models;
use App\Helpers\ProductHelper;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class Product extends Base
{
    /**
        * @OA\Schema(
        *   schema="Product",
        *   type="object",
        *   @OA\Property(
        *       property="code",
        *       type="string",
        *       required={"false"},
        *       description="The Product code"
        *   ),
        *   @OA\Property(
        *       property="name",
        *       type="string",
        *       required={"true"},
        *       description="The Productname"
        *   ),
        *   @OA\Property(
        *       property="description",
        *       type="string",
        *       required={"true"},
        *       description="The Product description"
        *   ),
        *   @OA\Property(
        *       property="category_id",
        *       type="number",
        *       required={"false"},
        *       description="The Product category"
        *   ),
        *   @OA\Property(
        *       property="brand_id",
        *       type="number",
        *       required={"false"},
        *       description="The Product brand"
        *   ),
        *   @OA\Property(
        *       property="attribute_types",
        *       type="array",
        *       required={"false"},
        *       @OA\Items(
        *           @OA\Property(property="attribute_type_id", type="number"),
        *           @OA\Property(property="description", type="string"),
        *           @OA\Property(property="user_created_id", type="number"),
        *       ),
        *       description="The Product attribute_types"
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
        *       required={"false"},
        *       example=1,
        *       description="The Users update"
        *   ),
        * )
    */
    public static $filterable = [
        'user_created_id'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'category_id',
        'brand_id',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * The stock that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getStockAttribute()
    {
        return ProductHelper::getStock($this);
    }
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFiltersProduct($q, array $data = array())
	{
		if (!empty($data['filterProduct'])) {
            $dataField = json_decode($data['filterProduct'], true);
            collect($dataField)
                ->each(function ($fields) use($q) {
                    $dataField = Arr::except($fields, static::$filterable);
                    $dataField = array_filter($dataField, 'strlen');
                    $q->where(function ($query) use ($dataField) {
                        foreach ($dataField as $field => $value) {
                            if (isset($dataField[$field])) {
                                $contains = Str::of($field)->contains('.');
                                $relations = Str::of($field)->explode('.');
                                if ($contains) {
                                    $query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $dataField, $field) {
                                        $q->where($relations[1], 'like', "%$dataField[$field]%");
                                    });
                                } else {
                                    $query->where($field, 'like', "%$dataField[$field]%");
                                }
                            }
                        }
                    });
                });
		}
    }
    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The attributeTypes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeTypeProducts()
    {
        return $this->hasMany(AttributeTypeProduct::class);
    }
    /**
     * The attributeTypes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeTypes()
    {
        return $this->belongsToMany(AttributeType::class)
            ->withPivot([
                'description'
            ]);
    }

    /**
     * Get all of the billElectronicDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronicDetails()
    {
        return $this->hasMany(BillElectronicDetail::class);
    }

    /**
     * Get all of the purcharseDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purcharseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    /**
     * Get all of the purcharseDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devolutionDetails()
    {
        return $this->hasMany(DevolutionDetail::class);
    }
    /**
     * Get all of the transferDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferDetails()
    {
        return $this->hasMany(TransferDetail::class);
    }
    /**
     * Get all of the purcharseDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    /**
     * Get all of the deployments for the project.
     */
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'purchase_details', 'product_id', 'warehouse_id');
    }
}
