<?php

namespace App\Transformers;

use App\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    public function transform(Client $client)
    {
        return [
            'id'    => (int) $client->id,
            'name'  => $client->name,
            'date'  => $client->created_at->format('d/m/Y H:i:s')
        ];
    }
}