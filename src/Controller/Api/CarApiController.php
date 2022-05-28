<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Model\Car;
use Bangdinhnfq\Unlock\Transformer\CarTransformer;

class CarApiController extends AbstractApiController
{
    private $carTransformer;

    /**
     * Success: 200
     * Created: 201
     * validation error: 400
     * Authentication / Authorization: 401, 403
     * @param Request $request
     * @param Response $response
     * @param CarTransformer $carTransformer
     */
    public function __construct(Request $request, Response $response, CarTransformer $carTransformer)
    {
        parent::__construct($request, $response);
        $this->carTransformer = $carTransformer;
    }

    /**
     * GET https://carforrent.com/api/v1/cars?color=red&brand=ford&limit=1&offset=1
     * GET https://carforrent.com/api/v1/cars?color=red&brand=ford&pgae=1
     *  'Content-Type' => 'application/json'
     * @return Response
     */
    public function listCars(): Response
    {
        $cars = [
            new Car(),
            new Car(),
        ];
        $results = [];
        foreach ($cars as $car){
            $results[] = $this->carTransformer->transform($car);
        }
        return $this->response->success($results);
    }

    public function getCar(int $id): ?Car
    {
        return new Car();
    }

    public function postCar(): Car
    {
        $data = $this->request->getRequestJsonBody();
        // CarValidation
        // CarService create a new car
        // CarTransformer
        return new Car();
    }

    public function putCar($id, $data): Car
    {
        return new Car();
    }

    public function deleteCar($id): bool
    {
        return true;
    }
}
