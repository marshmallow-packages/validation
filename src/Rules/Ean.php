<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRule;

class Ean extends AbstractRule
{
    /**
     * Create a new rule instance.
     *
     * @param array $lengths
     * @return void
     */
    public function __construct(protected array $lengths = [8, 13])
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool
    {
        return is_numeric($value) && $this->hasAllowedLength($value) && $this->checksumMatches($value);
    }

    /**
     * Determine if the current value has the lenghts of EAN-8 or EAN-13
     *
     * @return bool
     */
    public function hasAllowedLength($value): bool
    {
        return in_array(strlen($value), $this->lengths);
    }

    /**
     * Try to calculate the EAN checksum of the
     * current value and check the matching.
     *
     * @return bool
     */
    protected function checksumMatches($value): bool
    {
        return $this->calculateChecksum($value) === $this->cutChecksum($value);
    }

    /**
     * Cut out the checksum of the current value and return
     *
     * @return int
     */
    protected function cutChecksum($value): int
    {
        return intval(substr($value, -1));
    }

    /**
     * Calculate modulo checksum of given value
     *
     * @param mixed $value
     * @return int
     */
    protected function calculateChecksum($value): int
    {
        $checksum = 0;

        // chars without check digit in reverse
        $chars = array_reverse(str_split(substr($value, 0, -1)));

        foreach ($chars as $key => $char) {
            $multiplier = $key % 2 ? 1 : 3;
            $checksum += intval($char) * $multiplier;
        }

        $remainder = $checksum % 10;

        if ($remainder === 0) {
            return 0;
        }

        return 10 - $remainder;
    }
}
