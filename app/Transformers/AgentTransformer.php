<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class AgentTransformer extends TransformerAbstract
{
    public function transform(User $agent)
    {
        return [
            'id'    => (int) $agent->id,
            'name'  => $agent->name,
            'email' => $agent->email
        ];
    }
}