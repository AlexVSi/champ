from flask import Flask, jsonify, request, abort, make_response
# from connect import *

app = Flask(__name__)

users = [
	{'id': 1, 'name': 'Виктория', 'firstname': 'Соловьева'},
	{'id': 2, 'name': 'Вадим', 'firstname': 'Петров'},
	{'id': 3, 'name': 'Илья', 'firstname': 'Лукичев'},
	{'id': 4, 'name': 'Артем', 'firstname': 'Степанов'},
	{'id': 5, 'name': 'Наталья', 'firstname': 'Нгуен'},
]

@app.route('/users', methods=['GET'])
def get_users():
	return jsonify(users)

@app.route('/users/<int:user_id>', methods=['GET'])
def get_user(user_id):
	user = list(filter(lambda u: u['id'] == user_id, users))
	if len(user) == 0:
		abort(404)
	return jsonify({'user': user[0]})

@app.route('/add', methods=['POST'])
def add_user():
	data = request.json
	user = {
		'id': users[-1]['id'] + 1,
		'name': data['name'],
		'firstname': data['firstname'],
	}
	users.append(user)
	body = {
		"success": True,
		"message": "Success",
	}
	return jsonify({"Status": 200, "Content-Type": "application/json", "body": body})

@app.errorhandler(404)
def error(error):
	return make_response(jsonify({'error': 'Not found'}), 404)

if __name__ == '__main__':
	app.run(debug=True)
