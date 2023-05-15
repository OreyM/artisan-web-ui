<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Action;
use App\Actions\Artisan\CreateNewTableAction;
use App\Exceptions\FailedValidationExeption;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DatabaseController extends ApiController
{
    /**
     * @OA\Post(
     *      path="/api/v1/artisan/table/create",
     *      operationId="createTable",
     *      tags={"Artisan"},
     *      summary="Create new table",
     *      description="Create new database table with Model, Migration, Seed and Factory",
     *      @OA\Parameter(
     *          name="table_name",
     *          description="New table name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(type="string"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="Response status code",
     *                  example="200",
     *              ),
     *              @OA\Property(title="Success message", property="message", type="string")
     *          ),
     *       ),
     *      @OA\Response(response=400, description="Validation failed | Bad request | DB Error"),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTable(): JsonResponse
    {
        try {
            Action::call(CreateNewTableAction::class);

            return $this->respondWithSuccess([
                'status'  => Response::HTTP_OK,
                'message' => 'New table has been created.',
            ]);
        } catch (FailedValidationExeption $e) {
            return $this->respondError($e->getMessage(), $e);
        } catch (QueryException $e) {
            switch ($e->getCode()) {
                case '42S01':
                    return $this->respondError('Table already exists.', $e);
                default:
                    return $this->respondError($e->getMessage(), $e);
            }
        } catch (\Exception $e) {
            return $this->respondError('Error creating new table.', $e);
        }
    }
}
