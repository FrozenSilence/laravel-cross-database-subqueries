<?php

namespace FrozenSilence\CrossDatabase\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\SqlServerGrammar as IlluminateSqlServerGrammar;

class SqlServerGrammar extends IlluminateSqlServerGrammar
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

            if (stripos($tableWithPrefix, $database . '.') === 0 || stripos($tableWithPrefix, $database . '[') === 0) {
                $from = 'from ' . $this->wrap($tableWithPrefix) . ' as ' . $this->wrap($table);
            } else {
                $from = 'from ' . $this->wrap($database) . '.[' . $tableWithPrefix . '] as [' . $table . ']';
            }
        } else {
            $from = 'from ' . $this->wrapTable($table);
        }

        if (is_string($query->lock)) {
            return $from . ' ' . $query->lock;
        }

        if (!is_null($query->lock)) {
            return $from . ' with(rowlock,' . ($query->lock ? 'updlock,' : '') . 'holdlock)';
        }

        return $from;
    }
}
