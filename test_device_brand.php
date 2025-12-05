<?php

require 'vendor/autoload.php';

use App\Helpers\DeviceBrandHelper;

// Test getRandomDeviceBrand
echo "=== Test DeviceBrandHelper ===" . PHP_EOL;
echo "Random brands: " . PHP_EOL;
for ($i = 0; $i < 5; $i++) {
    $brand = DeviceBrandHelper::getRandomDeviceBrand();
    $encoded = DeviceBrandHelper::encodeDeviceBrand($brand);
    echo "  - $brand (encoded: $encoded)" . PHP_EOL;
}

echo PHP_EOL . "All brands with encoding:" . PHP_EOL;
foreach (DeviceBrandHelper::getEncodingMap() as $brand => $code) {
    echo "  - $brand => $code" . PHP_EOL;
}

echo PHP_EOL . "Test encoding/decoding:" . PHP_EOL;
$testBrand = DeviceBrandHelper::getRandomDeviceBrand();
$encoded = DeviceBrandHelper::encodeDeviceBrand($testBrand);
$decoded = DeviceBrandHelper::decodeDeviceBrand($encoded);
echo "  Original: $testBrand" . PHP_EOL;
echo "  Encoded: $encoded" . PHP_EOL;
echo "  Decoded: $decoded" . PHP_EOL;
