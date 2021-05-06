<?php

namespace App\Models;

class Provider extends User
{
    protected $table = "users";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'client_type_id',
        'password',
        'remember_token'
    ];

    protected $with = [
        'documentType:id,name'
    ];
    /**
     * @OA\Schema(
     *   schema="Provider",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The Provider name"
     *   ),
     *   @OA\Property(
     *       property="last_name",
     *       type="string",
     *       required={"true"},
     *       description="The Provider last name"
     *   ),
     *   @OA\Property(
     *       property="full_name_contact",
     *       type="string",
     *       required={"false"},
     *       description="The Provider full name contact"
     *   ),
     *   @OA\Property(
     *       property="residence_condition",
     *       type="string",
     *       required={"false"},
     *       description="The Provider full name residence_condition"
     *   ),
     *   @OA\Property(
     *       property="phone",
     *       type="string",
     *       required={"false"},
     *       description="The Provider phone"
     *   ),
     *   @OA\Property(
     *       property="phone_contact",
     *       type="string",
     *       required={"false"},
     *       description="The Provider phone contact"
     *   ),
     *   @OA\Property(
     *       property="document_type_id",
     *       type="number",
     *       required={"false"},
     *       description="The document type"
     *   ),
     *   @OA\Property(
     *       property="document_number",
     *       type="number",
     *       required={"false"},
     *       description="The document number"
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

    /**
     * Get the clientType that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
