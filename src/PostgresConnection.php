<?php

namespace FrozenSilence\CrossDatabase;

use FrozenSilence\CrossDatabase\Query\Grammars\PostgresGrammar as PostgresQueryGrammar;
use Illuminate\Database\PostgresConnection as IlluminatePostgresConnection;

class PostgresConnection extends IlluminatePostgresConnection implements CanCrossDatabaseShazaamInterface
{
    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\PostgresGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return new PostgresQueryGrammar($this);
    }
}
