<script setup></script>
<template>
		<footer>
			<div class="footer__container container">
				<div class="contacts__block">
					<ul class="contacts__list">
						<li class="contact__item"><a href="">8 (800)123-45-67</a></li>
						<li class="contact__item"><a href="" type="email">mail@newlife.ru</a></li>
					</ul>
				</div>
				<nav class="footer__menu menu">
					<ul class="menu__list">
						<li class="menu__item"><a href="#">Главная</a></li>
						<li class="menu__item"><a href="register.html">Регистрация</a></li>
						<li class="menu__item"><a href="login.html">Авторизация</a></li>
						<li class="menu__item"><a href="profile.html">Личный кабинет</a></li>
						<li class="menu__item"><a href="add.html">Найдено животное</a></li>
						<li class="menu__item"><a href="search.html">Поиск</a></li>
					</ul>
				</nav>
			</div>
		</footer>
</template>
<style scoped>
footer {
	background-color: #d7d7d7;
	/* height: 80px; */
}
.footer__container {
	display: flex;
	justify-content: space-between;
	align-items: center;
	height: 100%;
	padding: 15px 0;
}

.contacts__list {
	display: flex;
	flex-direction: column;
	gap: 10px;
	align-items: flex-start;
}
.contact__item a {
	color: #000000;
}
</style>