<?php

namespace App\Traits;

use Illuminate\Support\Collection as LaravelCollection;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item;

trait Transformable
{
    public function transform($data, $transform)
    {
        if($data instanceof LaravelCollection) {
            $resource = new FractalCollection($data, new $transform);
        } else {
            $resource = new Item($data, new $transform);
        }

        return (new Manager())->createData($resource)->toArray();
    }
}