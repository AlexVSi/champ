from sqlalchemy import create_engine, Column, Integer, String
from sqlalchemy.orm import declarative_base
from sqlalchemy.orm import sessionmaker
from flask import Flask, jsonify, request

Base = declarative_base()

engine = create_engine('mysql+mysqlconnector://root:Isaiah4110Mysql@localhost:3306/FlaskBd', echo=True)

class Users(Base):
	__tablename__ = 'Users'

	id = Column(Integer, primary_key=True, nullable=False)
	login = Column(String, nullable=False)
	password = Column(String, nullable=False)
	name = Column(String, nullable=False)
	firstname = Column(String, nullable=False)

try:
	Base.metadata.create_all(engine)
	session = sessionmaker(bind=engine)
	s = session()
	print(session)
except:
	print('Отсутствует подключение')

response = s.query(Users).all()

arr = []
for i in response:
	arr += i

print(arr)
# print(jsonify(response))
