<?php

namespace FrozenSilence\CrossDatabase;

use FrozenSilence\CrossDatabase\Concerns\QueriesRelationships as CrossDatabaseQueriesRelationships;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;

class EloquentBuilder extends Builder
{
    use QueriesRelationships, CrossDatabaseQueriesRelationships {
        CrossDatabaseQueriesRelationships::has insteadof QueriesRelationships;
    }
}
