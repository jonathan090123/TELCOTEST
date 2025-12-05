<?php

namespace App\Helpers;

class DeviceBrandHelper
{
    // List device brand dari dataset dengan encoding
    protected static array $deviceBrands = [
        'Apple' => 0,
        'Huawei' => 1,
        'Oppo' => 2,
        'Realme' => 3,
        'Samsung' => 4,
        'Vivo' => 5,
        'Xiaomi' => 6,
    ];

    /**
     * Get random device brand dari dataset
     */
    public static function getRandomDeviceBrand(): string
    {
        $brands = array_keys(self::$deviceBrands);
        return $brands[array_rand($brands)];
    }

    /**
     * Get semua device brands
     */
    public static function getAllDeviceBrands(): array
    {
        return array_keys(self::$deviceBrands);
    }

    /**
     * Encode device brand string ke integer (untuk ML features)
     */
    public static function encodeDeviceBrand(string $brand): int
    {
        return self::$deviceBrands[$brand] ?? 0;
    }

    /**
     * Decode integer ke device brand string
     */
    public static function decodeDeviceBrand(int $encoded): string
    {
        $reverseMap = array_flip(self::$deviceBrands);
        return $reverseMap[$encoded] ?? 'Apple';
    }

    /**
     * Get mapping encode/decode
     */
    public static function getEncodingMap(): array
    {
        return self::$deviceBrands;
    }
}

