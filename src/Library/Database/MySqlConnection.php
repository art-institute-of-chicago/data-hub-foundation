<?php

namespace Aic\Hub\Foundation\Library\Database;

use Aic\Hub\Foundation\Library\Database\Query\MySqlBuilder as Builder;
use Aic\Hub\Foundation\Library\Database\Query\Grammars\MySqlGrammar as QueryGrammar;
use Illuminate\Database\MySqlConnection as Connection;

class MySqlConnection extends Connection
{
    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\MySqlGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar());
    }

    /**
     * Get a new query builder instance.
     *
     * @return \Aic\Hub\Foundation\Library\Database\Query\MySqlBuilder
     */
    public function query()
    {
        return new Builder(
            $this,
            $this->getQueryGrammar(),
            $this->getPostProcessor()
        );
    }
}
