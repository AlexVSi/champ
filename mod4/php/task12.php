<?php
// Путь к исходному изображению
$sourceImagePath = 'путь_к_вашему_изображению.jpg';

// Путь к изображению фона
$backgroundImagePath = 'путь_к_вашему_рисунку_150x200.png';

// Загрузка исходного изображения
$sourceImage = imagecreatefromjpeg($sourceImagePath);

// Загрузка изображения фона
$backgroundImage = imagecreatefrompng($backgroundImagePath);

// Получение размеров исходного изображения
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Создание нового изображения с повторяющимся фоном
$newImage = imagecreatetruecolor($sourceWidth, $sourceHeight);

// Заливка нового изображения фоном
imagecopyresampled($newImage, $backgroundImage, 0, 0, 0, 0, $sourceWidth, $sourceHeight, imagesx($backgroundImage), imagesy($backgroundImage));

// Наложение исходного изображения на новое изображение с фоном
imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $sourceWidth, $sourceHeight, $sourceWidth, $sourceHeight);

// Вывод изображения
header('Content-Type: image/jpeg');
imagejpeg($newImage, null, 100);

// Освобождение памяти
imagedestroy($sourceImage);
imagedestroy($backgroundImage);
imagedestroy($newImage);
?>
