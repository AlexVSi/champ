import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';
import './style.css'
import App from './App.vue'
import Index from './pages/Index.vue'
import Reg from './pages/Reg.vue'

const router = createRouter({
	routes: [{
		path: '/',
		component: Index
	},
	{
		path: '/registration',
		component: Reg
	}],
	history: createWebHistory()
 })

const app = createApp(App)

app.use(router)
app.mount('#app')
