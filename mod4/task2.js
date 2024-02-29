function calculateDistance(x1, y1, x2, y2) {
	const deltaX = x2 - x1;
	const deltaY = y2 - y1;
	const distance = Math.sqrt(deltaX ** 2 + deltaY ** 2);
	return distance;
}

// Пример использования функции
const point1 = { x: 0, y: 0 };
const point2 = { x: 3, y: 4 };

const distance = calculateDistance(point1.x, point1.y, point2.x, point2.y);
console.log(`Расстояние между точками: ${distance}`);
