<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * 
     */
    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
      * @OA\Get(
      *     path="/companies",
      *     operationId="getcompanies",
      *     tags={"Company"},
      *     @OA\Parameter(
      *       name="paginate",
      *       in="query",
      *       description="paginate",
      *       required=false,
      *       @OA\Schema(
      *           title="Paginate",
      *           example="true",
      *           type="boolean",
      *           description="The Paginate data"
      *       )
      *     ),
      *     @OA\Parameter(
      *       name="sortBy",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           example="id",
      *           description="The unique identifier of a turno resource"
      *       )
      *     ),
      *     @OA\Parameter(
      *       name="sortOrder",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           example="desc",
      *           description="The unique identifier of a turno resource"
      *       )
      *      ),
      *     @OA\Parameter(
      *       name="perPage",
      *       in="query",
      *       description="Sort order field",
      *       @OA\Schema(
      *           title="perPage",
      *           type="number",
      *           default="10",
      *           description="The unique identifier of a curso resource"
      *       )
      *      ),
      *     @OA\Parameter(
      *       name="dataSearch",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           description="Search data"
      *       )
      *      ),
      *     @OA\Parameter(
      *       name="dataFilter",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           description="The unique identifier of a turno resource"
      *       )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="Companies all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $companies = Company::filters($request->all())
            ->search($request->all());

        return (CompanyResource::collection($companies))->additional(
            [
                'message:' => 'Successfully response'
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     * 
    * @OA\Post(
    *   path="/companies",
    *   summary="Creates a new company",
    *   description="Creates a new company",
    *   tags={"Company"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/Company")
    *       )
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=200,
    *       description="The Provider resource created",
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=401,
    *       description="Unauthenticated."
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response="default",
    *       description="an ""unexpected"" error",
    *   )
    * )
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->document_number = $request->document_number;
        $company->email = $request->email;
        $company->description =$request->description;
        $company->phone_number = $request->phone_number;
        $company->user_created_id = $request->user_created_id;

        $company->save();
        return (new CompanyResource($company))->additional(
            [
                'message:' => 'successfully registered company'
            ],201
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     * 
* @OA\Get(
     *      path="/companies/{id}",
     *      operationId="getcompaniesById",
     *      tags={"Company"},
     *      summary="Get company information",
     *      description="Returns company data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Company id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *   )
     */
    public function show(Company $company)
    {
        return (new CompanyResource($company))->additional(
            [
                'message:' => 'successfully response'
            ],200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/companies/{id}",
     *      operationId="updatecompany",
     *      tags={"Company"},
     *      summary="Update existing company",
     *      description="Returns updated company data",
     *  @OA\Parameter(
     *      name="id",
     *      description="company id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Company")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Company")
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *   )
     * )
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->name = $request->name;
        $company->document_number = $request->document_number;
        $company->email = $request->email;
        $company->description =$request->description;
        $company->phone_number = $request->phone_number;
        $company->user_created_id = $request->user_created_id;

        $company->update();
        return (new CompanyResource($company))->additional(
            [
                'message:' => 'successfully updated active'
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/companies/{id}",
     *  operationId="deletecompanies",
     *  tags={"Company"},
     *  summary="Delete existing company",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="company id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\Response(
     *      response=204,
     *      description="Successful operation",
     *      @OA\JsonContent()
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *  )
     * )
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
