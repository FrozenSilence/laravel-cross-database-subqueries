<?php

namespace FrozenSilence\CrossDatabase\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\MySqlGrammar as IlluminateMySqlGrammar;

class MySqlGrammar extends IlluminateMySqlGrammar
{
    /**
     * Compile the "from" portion of the query.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string                             $table
     *
     * @return string
     */
    protected function compileFrom(Builder $query, $table)
    {
        if (is_string($table) && strpos($table, '<-->') !== false) {
            list($prefix, $table, $database) = explode('<-->', $table);

            $tableWithPrefix = $prefix . $table;

            if (strpos($tableWithPrefix, $database . '.') === 0) {
                return 'from ' . $this->wrap($tableWithPrefix) . ' as ' . $this->wrap($table);
            }

            return 'from ' . $this->wrap($database) . '.' . $this->wrap($tableWithPrefix) . ' as ' . $this->wrap($table);
        }

        return 'from ' . $this->wrapTable($table);
    }


}
