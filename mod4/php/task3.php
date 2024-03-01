<?php
// Путь к основному изображению
$sourceImagePath = 'путь_к_вашему_изображению.jpg';

// Путь к изображению водяного знака
$watermarkImagePath = 'путь_к_вашему_водяному_знаку.png';

// Размер водяного знака (в процентах от ширины и высоты основного изображения)
$watermarkSizePercent = 10;

// Загрузка основного изображения
$sourceImage = imagecreatefromjpeg($sourceImagePath);

// Загрузка изображения водяного знака
$watermarkImage = imagecreatefrompng($watermarkImagePath);

// Получение размеров основного изображения
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Получение размеров водяного знака
$watermarkWidth = $sourceWidth * ($watermarkSizePercent / 100);
$watermarkHeight = $sourceHeight * ($watermarkSizePercent / 100);

// Нахождение самой темной области в основном изображении
$darkestPixel = imagecolorat($sourceImage, 0, 0);
for ($x = 0; $x < $sourceWidth; $x++) {
    for ($y = 0; $y < $sourceHeight; $y++) {
        $pixelColor = imagecolorat($sourceImage, $x, $y);
        if ($pixelColor < $darkestPixel) {
            $darkestPixel = $pixelColor;
        }
    }
}

// Получение RGB компонентов самого темного пикселя
$darkestColor = imagecolorsforindex($sourceImage, $darkestPixel);

// Установка прозрачности водяному знаку
imagecolortransparent($watermarkImage, imagecolorallocatealpha($watermarkImage, $darkestColor['red'], $darkestColor['green'], $darkestColor['blue'], 0));

// Наложение водяного знака на самую темную область
imagecopyresampled($sourceImage, $watermarkImage, 0, 0, 0, 0, $watermarkWidth, $watermarkHeight, $sourceWidth, $sourceHeight);

// Вывод или сохранение результата
header('Content-Type: image/jpeg');
imagejpeg($sourceImage, 'путь_к_результирующему_изображению.jpg');

// Освобождение ресурсов
imagedestroy($sourceImage);
imagedestroy($watermarkImage);
?>
