<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use OpenApi\Annotations as OA;

class ClearCacheController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/api/v1/artisan/clear-cache",
     *      operationId="clearCache",
     *      tags={"Artisan"},
     *      summary="Clear App cache",
     *      description="Clear App cache",
     *      @OA\Response(
     *          response=200,
     *          description="App cache cleared",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Error clearing cache. Please try again.",
     *      ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try {
            sleep(1); // TODO DelThis
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:clear');

            return $this->respondWithSuccess([
                'status'  => Response::HTTP_OK,
                'message' => 'App cache cleared.',
            ]);
        } catch (\Exception $e) {
            return $this->respondError('Error clearing cache. Please try again.', $e);
        }
    }
}
