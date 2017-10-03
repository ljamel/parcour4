<?php

namespace blog;

class NotNullValidator extends Validator
{
    public function isValid($value)
    {
        return $value != '';
    }
}