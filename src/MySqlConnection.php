<?php

namespace FrozenSilence\CrossDatabase;

use FrozenSilence\CrossDatabase\Query\Grammars\MySqlGrammar as MySqlQueryGrammar;
use Illuminate\Database\MySqlConnection as IlluminateMySqlConnection;

class MySqlConnection extends IlluminateMySqlConnection implements CanCrossDatabaseShazaamInterface
{
    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\MySqlGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new MySqlQueryGrammar());
    }
}
