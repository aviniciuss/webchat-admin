<?php

namespace App\Transformers;

use App\Dialog;
use League\Fractal\TransformerAbstract;

class DialogTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'client',
        'agent'
    ];

    public function transform(Dialog $dialog)
    {
        return [
            'id'      => (int) $dialog->id,
            'channel' => $dialog->channel,

        ];
    }

    public function includeClient(Dialog $dialog)
    {
        return $this->item($dialog->client, new ClientTransformer());
    }

    public function includeAgent(Dialog $dialog)
    {
        return $this->item($dialog->agent, new AgentTransformer());
    }
}