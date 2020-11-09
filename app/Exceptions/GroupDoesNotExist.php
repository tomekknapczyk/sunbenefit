<?php

namespace App\Exceptions;

use Exception;

class GroupDoesNotExist extends Exception
{
    public static function create(string $groupName)
    {
        return new static("There is no group named `{$groupName}`.");
    }

    public static function withId(int $groupId)
    {
        return new static("There is no group with id `{$groupId}`.");
    }
}
