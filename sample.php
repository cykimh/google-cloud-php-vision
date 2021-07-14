<?php

require 'vendor/autoload.php';

use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\VisionClient;

$vision = new VisionClient();

// Annotate an image, detecting faces.
$imageResource = fopen(__DIR__ . "/images/youtube_screen.png", 'r');
$image = $vision->image(
    $imageResource,
    [Type::DOCUMENT_TEXT_DETECTION]
);
$annotation = $vision->annotate($image);

echo "====START====\r\n";
$document = $annotation->fullText();
echo $document->text();