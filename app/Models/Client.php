<?php

namespace App\Models;

class Client extends User
{
    /**
     * @OA\Schema(
     *   schema="Client",
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
     *       description="The Client password"
     *   ),
     *   @OA\Property(
     *       property="full_name_contact",
     *       type="string",
     *       required={"false"},
     *       description="The Client full name contact"
     *   ),
     *   @OA\Property(
     *       property="phone",
     *       type="string",
     *       required={"false"},
     *       description="The Client phone"
     *   ),
     *   @OA\Property(
     *       property="phone_contact",
     *       type="string",
     *       required={"false"},
     *       description="The Client phone contact"
     *   ),
     *   @OA\Property(
     *       property="client_type_id",
     *       type="number",
     *       required={"false"},
     *       description="The Client type"
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
     *       property="departament",
     *       type="string",
     *       required={"false"},
     *       description="The Provider departament"
     *   ),
     *   @OA\Property(
     *       property="province",
     *       type="string",
     *       required={"false"},
     *       description="The Provider province"
     *   ),
     *   @OA\Property(
     *       property="district",
     *       type="string",
     *       required={"false"},
     *       description="The Provider district"
     *   ),
     *   @OA\Property(
     *       property="address",
     *       type="string",
     *       required={"false"},
     *       description="The Provider address"
     *   ),
     *   @OA\Property(
     *       property="full_address",
     *       type="string",
     *       required={"false"},
     *       description="The Provider full_address"
     *   ),
     *   @OA\Property(
     *       property="email",
     *       required={"true"},
     *       type="string",
     *       description="The Client email"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Client crete"
     *   ),
     *   @OA\Property(
     *       property="branch_office_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Client branch office"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Client update"
     *   ),
     * )
     */
    protected $table = 'users';

    protected $with = [
        'clientType',
        'documentType'
    ];

    /**
     * Get the clientType that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientType()
    {
        return $this->belongsTo(ClientType::class);
    }

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
