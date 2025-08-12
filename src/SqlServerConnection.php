<?php

namespace FrozenSilence\CrossDatabase;

use FrozenSilence\CrossDatabase\Query\Grammars\SqlServerGrammar as SqlServerQueryGrammar;
use Illuminate\Database\SqlServerConnection as IlluminateSqlServerConnection;

class SqlServerConnection extends IlluminateSqlServerConnection implements CanCrossDatabaseShazaamInterface
{
    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\SqlServerGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return new SqlServerQueryGrammar($this);
    }
}
