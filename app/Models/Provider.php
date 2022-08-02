<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
     * @OA\Schema(
     *   schema="Provider",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The user name"
     *   ),
     *   @OA\Property(
     *       property="document_number",
     *       type="string",
     *       required={"true"},
     *       description="The Provider document number"
     *   ),
     *   @OA\Property(
     *       property="address",
     *       type="string",
     *       required={"true"},
     *       description="The Provider address"
     *   ),
     *   @OA\Property(
     *       property="signature",
     *       type="string",
     *       required={"true"},
     *       description="The Provider signature"
     *   ),
     *   @OA\Property(
     *       property="serie_number",
     *       type="string",
     *       required={"true"},
     *       description="The Provider serie_number"
     *   ),
     *   @OA\Property(
     *       property="logo",
     *       type="string",
     *       required={"true"},
     *       description="The Provider logo"
     *   ),
     *   @OA\Property(
     *       property="seal",
     *       type="string",
     *       required={"true"},
     *       description="The Provider seal"
     *   ),
     *   @OA\Property(
     *       property="phone_number",
     *       type="string",
     *       required={"true"},
     *       description="The Provider phone number"
     *   ),
     *   @OA\Property(
     *       property="email",
     *       required={"true"},
     *       type="string",
     *       description="The Provider email"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Provider crete"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Provider update"
     *   ),
     * )
     */
class Provider extends Base
{

    use HasFactory;


    protected $appends = ['full_name'];


    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }


    public function providerTypes(){

        return $this->belongsToMany(ProviderType::class,'provider_type_provider');
    }


    /** 
     * Provaider has many Rates
     */
    public function rates(){

        return $this->hasMany(Rate::class);

    }

    /**
     * Relationship Ticket. 
     * 
     * A provider has many ticket.
     * 
     */
    public function tickets(){

        return $this->hasMany(Ticket::class);

    }

    /**
     * Relationship to personal
     */
    public function personals()
    {
        return $this->hasMany(Personal::class);
    }
    /**
     * 
     */
    public function ownerable()
    {
        return $this->morphTo();
    }
}


