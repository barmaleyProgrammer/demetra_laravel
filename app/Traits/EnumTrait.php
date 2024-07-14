<?php

namespace App\Traits;

trait EnumTrait
{
    public static function fromValue(?string $value = ''): self|null
    {
        foreach (self::cases() as $case) {
            if (strtolower($case->value) === strtolower($value)) {
                return $case;
            }
        }

        return null;
    }

    public static function toIdNameArray(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[] = [
                'id' => strtolower($case->value),
                'name' => mb_convert_case($case->value, MB_CASE_TITLE, 'UTF-8'),
            ];
        }

        return $result;
    }
}
