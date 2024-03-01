<?php
// Путь к вашему изображению
$imagePath = 'screen.png';

// Загружаем изображение
$image = imagecreatefromjpeg($imagePath);

// Получаем размеры изображения
$width = imagesx($image);
$height = imagesy($image);

// Создаем новое изображение для маски
$mask = imagecreatetruecolor($width, $height);
imagealphablending($mask, false);
imagesavealpha($mask, true);

// Устанавливаем цвет фона маски в прозрачный
$transparent = imagecolorallocatealpha($mask, 0, 0, 0, 127);
imagefill($mask, 0, 0, $transparent);

// Устанавливаем цвет для затемнения (черный)
$darkColor = imagecolorallocate($mask, 0, 0, 0);

// Рисуем окружность в центре маски
imagefilledellipse($mask, $width / 2, $height / 2, 200, 200, $darkColor);

// Применяем маску к изображению
imagecopy($image, $mask, 0, 0, 0, 0, $width, $height);

// Освобождаем память, используемую для маски
imagedestroy($mask);

// Сохраняем результат
imagejpeg($image, 'screen.jpg');

// Освобождаем память, используемую для изображения
imagedestroy($image);
?>
