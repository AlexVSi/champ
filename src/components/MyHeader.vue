<script setup></script>
<template>
		<header>
			<div class="header__container container">
				<div class="header__logo">
				</div>
				<nav class="header__menu menu">
					<div class="hamburger-menu">
						<div class="hamburger"></div>
				  </div>
					<ul class="menu__list">
						<li class="menu__item"><a href="search.html">Поиск</a></li>
						<li class="menu__item"><a href="register.html">Регистрация</a></li>
						<li class="menu__item"><a href="profile.html">Личный кабинет</a></li>
						<li class="menu__item"><a href="add.html">Добавить</a></li>
						<li class="menu__item"><a href="search.html">Отзывы</a></li>
					</ul>
				</nav>
			</div>
		</header>
</template>
<style scoped>
header {
	background-color: #e5fff6;
}
.header__container {
	display: flex;
	justify-content: space-between;
	align-items: center;
	min-height: 80px;
	gap: 20px;
	padding-top: 10px;
	padding-bottom: 10px;
}
.header__logo img {
	object-fit: cover;
	width: auto;
	height: 70px;
}
.menu__list {
	display: flex;
	gap: 20px;
	flex-wrap: wrap;
}
.menu__item a {
	color: #000000;

}
</style>