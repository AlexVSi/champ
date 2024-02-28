const App = new Vue({
	el: '#app',
	data () {
		return {
			posts: [
				{id: 1, title: 'JavaScript 1', body: 'Описание постов 1'},
				{id: 2, title: 'JavaScript 2', body: 'Описание постов 2'},
				{id: 3, title: 'JavaScript 3', body: 'Описание постов 3'},
			],
			dialogVisiable: false,
			title: '',
			body: '',
		}
	},
	props: {
		show: {
			type: Boolean,
			default: false,
		}
	},
	methods: {
		createPost() {
			const newPost = {
				id: Date.now(),
				title: this.title,
				body: this.body
			}
			this.posts.push(newPost)
		},
		removePost(post) {
			this.posts = this.posts.filter(p => p.id !== post.id)
		},
		hideDialog() {
			this.dialogVisiable = false
		},
		showDialog() {
			this.dialogVisiable = true
		},
	},
})
