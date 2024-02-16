<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Status enum.
 *
 * @method static self IN_PROGRESS()
 * @method static self COMPLETE()
 * @method static self FAILED()
 */
class Status extends Enum
{
    const IN_PROGRESS = 'in_progress';
    const COMPLETE = 'complete';
    const FAILED = 'failed';
}
