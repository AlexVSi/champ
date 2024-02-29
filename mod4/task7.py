stroka = 'hsjhashajjanfjkandsfjksjfhjhsdbgjsabdskjfhalhjkvnuqvh;kjsndfgndsjkfgkjegbgjkbjksddfghjklkjhgfjhgjlhjgsdjfaksjdhfkjashbfjkbfdvakjerbgie'
print(len(stroka))
max_str = ''
for i in range(len(stroka)):
	for j in range(i, len(stroka)):
		podstroka = stroka[i: j + 1]
		if podstroka == podstroka[::-1] and len(podstroka) > len(max_str):
			max_str = podstroka
print(max_str)