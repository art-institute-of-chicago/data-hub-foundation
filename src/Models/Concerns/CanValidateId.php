<?php

namespace Aic\Hub\Foundation\Models\Concerns;

trait CanValidateId
{
    /**
     * Validate an id. Useful for validating routes or query string params.
     *
     * By default, only numeric ids greater than zero are accepted. Override this
     * method in child classes to implement different validation rules (e.g. UUID).
     *
     * @param mixed $id
     * @return boolean
     */
    public static function validateId($id)
    {
        // By default, only allow numeric ids greater than 0
        return is_numeric($id) && intval($id) > 0;
    }
}
