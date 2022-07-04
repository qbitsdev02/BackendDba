<?php

namespace App\Models;

class MaterialSupplier extends Base
{
    /**
     * @OA\Schema(
     *   schema="MaterialSupplier",
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
     *       description="The MaterialSuppliers document number"
     *   ),
     *   @OA\Property(
     *       property="address",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers address"
     *   ),
     *   @OA\Property(
     *       property="signature",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers signature"
     *   ),
     *   @OA\Property(
     *       property="serie_number",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers serie_number"
     *   ),
     *   @OA\Property(
     *       property="logo",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers logo"
     *   ),
     *   @OA\Property(
     *       property="seal",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers seal"
     *   ),
     *   @OA\Property(
     *       property="phone_number",
     *       type="string",
     *       required={"true"},
     *       description="The MaterialSuppliers phone number"
     *   ),
     *   @OA\Property(
     *       property="email",
     *       required={"true"},
     *       type="string",
     *       description="The MaterialSuppliers email"
     *   ),
     *   @OA\Property(
     *       property="material_supplier_type_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The MaterialSuppliers material_supplier_type_id"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The MaterialSuppliers crete"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The MaterialSuppliers update"
     *   ),
     * )
     */
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }
}
