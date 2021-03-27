<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="BillElectronic",
 *   type="object",
 *   @OA\Property(
 *       property="serie_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic serie_id"
 *   ),
 *   @OA\Property(
 *       property="client_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic client_id"
 *   ),
 *   @OA\Property(
 *       property="voucher_type_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic voucher_type_id"
 *   ),
 *   @OA\Property(
 *       property="branch_office_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic branch_office_id"
 *   ),
 *   @OA\Property(
 *       property="operation_type_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic operation_type_id"
 *   ),
 *   @OA\Property(
 *       property="seller_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic seller_id"
 *   ),
 *   @OA\Property(
 *       property="coin_id",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic coin_id"
 *   ),
 *  @OA\Property(
 *       property="exchange_rate",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic exchange_rate"
 *   ),
 *  @OA\Property(
 *       property="igv",
 *       type="string",
 *       required={"true"},
 *       example="12",
 *       description="The Bill Electronic igv"
 *   ),
 *  @OA\Property(
 *       property="expiration_date",
 *       type="number",
 *       required={"true"},
 *       example="2021-03-27",
 *       description="The Bill Electronic expiration_date"
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

class BillElectronic extends Base
{
    //
}
