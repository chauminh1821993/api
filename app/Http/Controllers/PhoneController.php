<?php

namespace App\Http\Controllers;

use App\Helpers\KResponse;
use App\Helpers\ResCodes;
use App\Http\Requests\PhoneRequest;
use App\Repositories\PhoneRepository;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="localhost/demo-api/public/api",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="This is my website API for save and display phone"
 *     )
 * )
 */
class PhoneController extends Controller
{

    /**
     * @var PhoneRepository
     */
    private $phoneRepository;

    /**
     * PhoneController constructor.
     * @param PhoneRepository $phoneRepository
     */
    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;

    }

    /**
     * This function get list Phones
     * @return Response
     *
     * @SWG\Get(
     *      path="/phones",
     *      summary="Get a listing of the Phone.",
     *      tags={"Phone"},
     *      description="Get all Phones",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="status",
     *                  type="string",
     *                  enum={"OK", "NG"},
     *                  example="OK"
     *              ),
     *              @SWG\Property(
     *                  property="results",
     *                  type="object",
     *                  @SWG\Property(
     *                      property="current_page",
     *                      type="number"
     *                  ),
     *                  @SWG\Property(
     *                      property="data",
     *                      type="array",
     *                      @SWG\Items(ref="#/definitions/Phone")
     *                  ),
     *                  @SWG\Property(
     *                      property="first_page_url",
     *                      type="string"
     *                  ),
     *                  @SWG\Property(
     *                      property="from",
     *                      type="number"
     *                  ),
     *                  @SWG\Property(
     *                      property="last_page",
     *                      type="number"
     *                  ),
     *                  @SWG\Property(
     *                      property="last_page_url",
     *                      type="string"
     *                  ),
     *                  @SWG\Property(
     *                      property="next_page_url",
     *                      type="string"
     *                  ),
     *                  @SWG\Property(
     *                      property="path",
     *                      type="string"
     *                  ),
     *                  @SWG\Property(
     *                      property="per_page",
     *                      type="number"
     *                  ),
     *                  @SWG\Property(
     *                      property="prev_page_url",
     *                      type="string"
     *                  ),
     *                  @SWG\Property(
     *                      property="to",
     *                      type="number"
     *                  ),
     *                  @SWG\Property(
     *                      property="total",
     *                      type="number"
     *                  )
     *              ),
     *          )
     *      )
     * )
     */
    public function index()
    {
        try {
            $datas = $this->phoneRepository->getLists();
            return KResponse::send($datas, ResCodes::STATUS_OK, ResCodes::OK);
        } catch (\Exception $e) {
            return KResponse::send([], ResCodes::STATUS_NOT_OK, ResCodes::SERVER_ERROR, ['server' => $e->getMessage()]);
        }
    }

    /**
     * @param PhoneRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/phones",
     *      summary="Store a newly created Phone in storage",
     *      tags={"Phone"},
     *      description="Store Phone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="phone",
     *          in="formData",
     *          description="Phone that should be stored",
     *          required=true,
     *          type="number",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="status",
     *                  type="string",
     *                  enum={"OK", "NG"},
     *                  example="OK"
     *              ),
     *              @SWG\Property(
     *                  property="results",
     *                  ref="#/definitions/Phone"
     *              ),
     *          )
     *      )
     * )
     */
    public function store(PhoneRequest $request)
    {
        try {
            $datas = $this->phoneRepository->storePhone($request);
            return KResponse::send($datas, ResCodes::STATUS_OK, ResCodes::OK);
        } catch (\Exception $e) {
            return KResponse::send([], ResCodes::STATUS_NOT_OK, ResCodes::SERVER_ERROR, ['server' => $e->getMessage()]);
        }
    }
}
