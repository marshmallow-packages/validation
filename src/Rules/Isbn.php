<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

class Isbn extends Ean
{
    public function __construct(protected array $lengths = [10, 13])
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
        // normalize value
        $value = preg_replace("/[^0-9x]/i", '', $value);

        if (!$this->hasAllowedLength($value)) {
            return false;
        }

        switch (strlen($value)) {
            case 10:
                return $this->shortChecksumMatches($value);

            case 13: // isbn-13 is a subset of ean-13
                return preg_match("/^(978|979)/", $value) && parent::checksumMatches($value);
        }

        return false;
    }

    /**
     * Determine if checksum for ISBN-10 numbers is valid
     *
     * @return bool
     */
    private function shortChecksumMatches($value)
    {
        return $this->getShortChecksum($value) % 11 === 0;
    }

    /**
     * Calculate checksum of short ISBN numbers
     *
     * @return int
     */
    private function getShortChecksum($value)
    {
        $checksum = 0;
        $multiplier = 10;
        foreach (str_split($value) as $digit) {
            $digit = strtolower($digit) == 'x' ? 10 : intval($digit);
            $checksum += $digit * $multiplier;
            $multiplier--;
        }

        return $checksum;
    }
}
