<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Guide",
 *   type="object",
 *   @OA\Property(
 *       property="serie_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The guide serie"
 *   ),
 *   @OA\Property(
 *       property="date_of_issue",
 *       type="number",
 *       required={"true"},
 *       example="2021/01/01",
 *       description="The date of issue"
 *   ),
 *   @OA\Property(
 *       property="date_transfer",
 *       type="number",
 *       required={"true"},
 *       example="2021/01/01",
 *       description="The date transfer"
 *   ),
 *   @OA\Property(
 *       property="total_packet",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The total packet"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The description guide"
 *   ),
 *   @OA\Property(
 *       property="branch_office_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The branch office id"
 *   ),
 *   @OA\Property(
 *       property="measurement_unit_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The measurement unit id"
 *   ),
 *   @OA\Property(
 *       property="transfer_mode_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The transfer mode id"
 *   ),
 *   @OA\Property(
 *       property="transfer_subject_id",
 *       type="string",
 *       required={"true"},
 *       example=1,
 *       description="The Guide transfer_subject_id"
 *   ),
 *   @OA\Property(
 *       property="client_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The client guide"
 *   ),
 *   @OA\Property(
 *       property="observation",
 *       type="string",
 *       required={"true"},
 *       description="The observation guide"
 *   ),
 *   @OA\Property(
 *       property="from_country",
 *       type="string",
 *       required={"true"},
 *       description="The from country"
 *   ),
 *   @OA\Property(
 *       property="from_ubigeo",
 *       type="string",
 *       required={"true"},
 *       description="The from ubigeo"
 *   ),
 *   @OA\Property(
 *       property="from_address",
 *       type="string",
 *       required={"true"},
 *       description="The from address"
 *   ),
 *   @OA\Property(
 *       property="to_country",
 *       type="string",
 *       required={"true"},
 *       description="The to country"
 *   ),
 *   @OA\Property(
 *       property="to_ubigeo",
 *       type="string",
 *       required={"true"},
 *       description="The to ubigeo"
 *   ),
 *   @OA\Property(
 *       property="to_address",
 *       type="string",
 *       required={"true"},
 *       description="The to address"
 *   ),
 *   @OA\Property(
 *       property="carrier_document_type_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The carrier document type id"
 *   ),
 *   @OA\Property(
 *       property="carrier_document_number",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The carrier document number"
 *   ),
 *   @OA\Property(
 *       property="driver_document_type_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The driver document type id"
 *   ),
 *   @OA\Property(
 *       property="driver_document_number",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The driver document number"
 *   ),
 *   @OA\Property(
 *       property="total_weight",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The total weight number"
 *   ),
 *   @OA\Property(
 *       property="plate_number",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The plate number"
 *   ),
 *   @OA\Property(
 *       property="license_number",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The license number"
 *   ),
 *   @OA\Property(
 *       property="semitrailer_number",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The semitrailer number"
 *   ),
 *  @OA\Property(
 *       property="guideDetails",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="product_id", type="number"),
 *           @OA\Property(property="amount", type="number"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The Budget Request details"
 *   )
 * )
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
class Guide extends Base
{
    /**
     * Get all of the guideDetails for the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guideDetails()
    {
        return $this->hasMany(GuideDetail::class);
    }
}
