from django.shortcuts import render, render_to_response
from django.http import HttpResponse
from django import forms
from member.models import *
from django.contrib.sessions.models import Session
from django.contrib import messages
from django.db.models import Q

novel = product.objects.filter(o_type='1')
comic = product.objects.filter(o_type='2')
dvd = product.objects.filter(o_type='3')
novel_dict = {}
comic_dict = {}
dvd_dict = {}
comic_data = ['奇幻／魔法','科幻／機戰','動作冒險','戀愛故事','懸疑推理','運動／競技']
novel_data = ['愛情小說','奇幻小說','驚悚小說','輕小說']
dcd_data = ['電視劇','電影','動漫']
c = 0
for i in comic_data:
	comic_dict[c] = product.objects.filter(o_type='2',o_kind=i)
	c += 1
c = 0
for i in novel_data:
	novel_dict[c] = product.objects.filter(o_type='1',o_kind=i)
	c += 1
c = 0
for i in dcd_data:
	dvd_dict[c] = product.objects.filter(o_type='3',o_kind=i)
	c += 1
# Create your views here.
def index(request):
	return render(request, 'index.php', {'comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})

def index_kind(request,kind):
	data = novel.filter(o_kind=kind)
	return render(request, 'show.php',{'data':data,'o_kind':kind})

def Msg(request):

	if request.method == 'POST':
		if 'email' in request.session:
			email = request.session['email']
			submit = request.POST['submit']

			msg_add.objects.create(text=submit)
		else:
			return render_to_response('login.php', {'message':'請先登入!'})


	return render_to_response('product.php')

def index_type(request):
	return render(request, 'index.php', {'comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})

def login(request):

	if request.method == 'POST':
		email = request.POST['login_account']
		pwd = request.POST['login_password']
		check = member.objects.filter(m_acc=email)

		if len(check) > 0:
			if len(member.objects.filter(m_acc=email,m_pwd=pwd)) > 0:
				request.session['email'] = check[0].m_acc
				return render(request, 'index.php', {'comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})
			else:
				return render(request, 'login.php',{'error':'帳號或密碼錯誤'})
		else:
			return render(request, 'login.php',{'error':'帳號或密碼錯誤'})
	return render(request, 'login.php')

def logout(request):
	if 'email' in request.session:
		del request.session['email']
		

		for i in product.objects.all():
			if i.o_id in request.session:
				del request.session[i.o_id]

	#return render(request, 'index.php', {'comic': comic,'novel': novel,'dvd':dvd})
	return render(request, 'index.php', {'comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})

def registered(request):
	if request.method == 'POST':
		name = request.POST['registered_name']
		email = request.POST['registered_email']
		pwd = request.POST['registered_password']
		phone = request.POST['registered_phone']

		filte_name = member.objects.filter(m_acc=email)

		if len(filte_name) == 0:
			#s_info = 'Session ID:' + sid +  str(s.get_decoded())

			member.objects.create(
				m_pwd=pwd,
				m_acc=email,
				m_name=name,
				m_phone=phone
			)
			request.session['email'] = member.objects.filter(m_acc=email)[0].m_acc

			return render(request, 'index.php', {'comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})

		else:
			return render(request, 'registered.php')

	#return render(request, 'registered.html', {'user': user})
	return render(request, 'registered.php')#,{'email':request.GET['email']})


def member_only(request):
	
	if "email" in request.session:
		novel = product.objects.filter(o_type='1')
		comic = product.objects.filter(o_type='2')
		dvd = product.objects.filter(o_type='3')

		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
		data = sub.objects.filter(m_id=m_id)

		product_dict = []

		for i in data:
			product_dict.append([product.objects.filter(o_id=i.o_id)[0],sub.objects.filter(o_id=i.o_id)[0],i.o_id])
			#product_list.append(product.objects.filter(o_id=i.o_id)[0])

		order_data = List.objects.filter(m_id=m_id)
		order_list = []
		for i in order_data:

			import datetime
			order_date = List.objects.filter(o_id=i.o_id)[0]
			import datetime
			end_date = order_date.l_date + datetime.timedelta(days =7)
			order_list.append([product.objects.filter(o_id=i.o_id)[0],order_date,end_date,i.o_id])

		return render(request, 'member_only.php', {'product_dict':product_dict,'date':data,'order_list':order_list})
	else:
		return render(request,'index.php', {'message':'請先登入!','comic': comic_dict,'novel': novel_dict,'dvd':dvd_dict})
		#return render_to_response('login.php', {'message':'請先登入!'})

def product_detail(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})
	o_type = product.objects.filter(o_id=o_id)[0].o_type
	data = product.objects.filter(o_id=o_id)[0]
	res_data = product.objects.filter(o_kind=data.o_kind).filter(~Q(o_id=o_id))
	return render(request, 'product_detail.php', {'data_dict':data_dict,'res_data':res_data})

def product_detail_show(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '

	m_id = None
	if 'email' in request.session:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id

	if len(sub.objects.filter(o_id=data.o_id,m_id=m_id)) > 0:
		request.session['check'] = True
	else:
		request.session['check'] = False

	if len(List.objects.filter(o_id=data.o_id,m_id=m_id,l_state=1)) > 0:
		request.session['check_order'] = True
	else:
		request.session['check_order'] = False

	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}


	click.objects.create(o_id=o_id)
	res_data = product.objects.filter(o_kind=data.o_kind).filter(~Q(o_id=o_id))

	count = {}
	for i in res_data:
		product_id = i.o_id
		count[product_id] = len(click.objects.filter(o_id=product_id))
	count_dict = sorted(count.items(), key=lambda d: d[1])
	data_list = []
	for x in count_dict:
		data_list.append(product.objects.filter(o_id=x[0])[0])

	msg_data = msg.objects.filter(o_id=o_id)
	print(res_data)
	#return render(request,'index.php')
	return render(request, 'product_detail.php',{'data_dict':data_dict,'res_data':data_list[::-1],'msg_data':msg_data})

def product_delete(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})
	m_id = None
	if 'email' not in request.session:
		render_to_response('login.php')
	else:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
		if len(sub.objects.filter(o_id=o_id,m_id=m_id)) > 0:
			request.session['check'] = False
			sub.objects.filter(o_id=o_id,m_id=m_id).delete()
		#elif 'check' in request.session:
		#	del request.session['check']

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '
	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}
	res_data = product.objects.filter(o_kind=data.o_kind)
	msg_data = msg.objects.filter(o_id=o_id)

	return render(request, 'product_detail.php',{'data_dict':data_dict,'msg_data':msg_data})


def product_order(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})
	m_id = None
	if 'email' not in request.session:
		render(request,'login.php', {})
	else:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
		if len(List.objects.filter(o_id=o_id,m_id=m_id,l_state=1)) == 0:
			request.session['check_order'] = True
			List.objects.create(o_id=o_id,m_id=m_id,l_num=1,l_state=1)
		#elif 'check' in request.session:
		#	del request.session['check']

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '
	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}
	res_data = product.objects.filter(o_kind=data.o_kind)
	msg_data = msg.objects.filter(o_id=o_id)
	print('nkfjvnkvjndkfnvjk')
	return render(request, 'product_detail.php',{'data_dict':data_dict,'msg_data':msg_data})

def product_cancel(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})
	m_id = None
	if 'email' not in request.session:
		render_to_response('login.php')
	else:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
		if len(List.objects.filter(o_id=o_id,m_id=m_id,l_state=1)) > 0:
			request.session['check'] = False
			List.objects.filter(o_id=o_id,m_id=m_id,l_state=1).delete()

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '
	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}
	res_data = product.objects.filter(o_kind=data.o_kind)
	msg_data = msg.objects.filter(o_id=o_id)

	return render(request, 'product_detail.php',{'data_dict':data_dict,'msg_data':msg_data})


def product_join(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})
	m_id = None
	if 'email' not in request.session:
		render(request,'login.php', {})
	else:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
		if len(sub.objects.filter(o_id=o_id,m_id=m_id)) == 0:
			request.session['check'] = True
			sub.objects.create(o_id=o_id,m_id=m_id,sub_num=1)
		#elif 'check' in request.session:
		#	del request.session['check']

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '
	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}
	res_data = product.objects.filter(o_kind=data.o_kind)
	msg_data = msg.objects.filter(o_id=o_id)

	return render(request, 'product_detail.php',{'data_dict':data_dict,'msg_data':msg_data})


def msg_Add(request, o_id):
	if len(product.objects.filter(o_id=o_id)) == 0:
		return render(request, 'index.php', {'message':'沒有此商品!','comic':comic,'dvd':dvd,'novel':novel})

	data = product.objects.filter(o_id=o_id)[0]
	author_list = author.objects.filter(o_id=int(data.o_id))
	author_data = ''
	for i in author_list:
		author_data = author_data + i.a_name + ', '
	data_dict = {
		'o_id' : data.o_id,
		'o_name' : data.o_name,
		'o_publisher' : data.o_publisher,
		'o_price' : data.o_price,
		'o_type' : data.o_type,
		'o_stock' : data.o_stock,
		'language' : data.language,
		'count' : data.count,
		'area' : data.area,
		'o_url' : data.o_url,
		'p_date' : data.p_date,
		'o_kind' : data.o_kind,
		'author' : author_data[:-2]
	}
	m_id = None
	if 'email' in request.session:
		m_id = member.objects.filter(m_acc=request.session['email'])[0].m_id
	else:
		return render(request, 'product_detail.php',{'data_dict':data_dict})

	check = False
	if len(sub.objects.filter(o_id=data.o_id,m_id=m_id)) > 0:
		check = True

	msg.objects.create(mem_id=m_id,text=request.POST['msg'],o_id=o_id)
	msg_data = msg.objects.filter(o_id=o_id)

	return render(request, 'product_detail.php',{'data_dict':data_dict,'msg_data':msg_data})


def show_hot(request,o_kind):
	if o_kind == 'all':
		data = product.objects.all()
		count = {}
		for i in data:
			product_id = i.o_id
			count[product_id] = len(click.objects.filter(o_id=product_id))

		count_dict = sorted(count.items(), key=lambda d: d[1])

		data_list = []
		for x in count_dict:
			data_list.append(product.objects.filter(o_id=x[0])[0])

		return render(request, 'show.php',{'data':data_list[::-1],'o_kind':'all','o_type':''}) #{'data_dict':data_dict,'res_data':res_data})pass


	data = product.objects.filter(o_kind=o_kind)
	k_list = ['小說','漫畫','DVD']

	if len(data) == 0:
		print('小說\n\n')
		# data = product.objects.filter(o_type=o_kind)
		if o_kind == '小說':
			t = 1
		elif o_kind == '漫畫':
			t = 2
		elif o_kind == 'DVD':
			t = 3

		data = product.objects.filter(o_type=t)
		count = {}
		for i in data:
			product_id = i.o_id
			count[product_id] = len(click.objects.filter(o_id=product_id))
		count_dict = sorted(count.items(), key=lambda d: d[1])
		data_list = []
		for x in count_dict:
			data_list.append(product.objects.filter(o_id=x[0])[0])
		o_type = int(data[0].o_type) - 1
		return render(request, 'show.php',{'data':data_list[::-1],'o_kind':o_kind,'o_type':''}) 

	count = {}
	for i in data:
		product_id = i.o_id
		count[product_id] = len(click.objects.filter(o_id=product_id))
	count_dict = sorted(count.items(), key=lambda d: d[1])
	data_list = []
	for x in count_dict:
		data_list.append(product.objects.filter(o_id=x[0])[0])
	o_type = int(data[0].o_type) - 1
	print(o_type, k_list[o_type])
	# return render(request, 'show.php',{'data':data_list[::-1],'o_kind':o_kind,'o_type':o_type}) #{'data_dict':data_dict,'res_data':res_data})

	return render(request, 'show.php',{'data':data_list[::-1],'o_kind':o_kind,'o_type':k_list[o_type]}) #{'data_dict':data_dict,'res_data':res_data})

def show_hot_all(request):
	data = product.objects.all()
	count = {}
	for i in data:
		product_id = i.o_id
		count[product_id] = len(click.objects.filter(o_id=product_id))
	count_dict = sorted(count.items(), key=lambda d: d[1])

	data_list = []
	for x in count_dict:
		data_list.append(product.objects.filter(o_id=x[0])[0])

	return render(request, 'show.php',{'data':data_list[::-1],'o_kind':'all','o_type':''}) #{'data_dict':data_dict,'res_data':res_data})


def show(request,o_kind):

	if o_kind == 'all':
		data = product.objects.filter()
		return render(request, 'show.php',{'data':data,'o_kind':'all','o_type':''}) #{'data_dict':data_dict,'res_data':res_data})pass

	data = product.objects.filter(o_kind=o_kind)
	print(data)
	o_type = int(data[0].o_type) - 1
	k_list = ['小說','漫畫','DVD']

	return render(request, 'show.php',{'data':data,'o_kind':o_kind,'o_type':k_list[o_type]})
	# return render(request, 'show.php',{'data':data,'o_kind':k_list[o_kind],'o_type':k_list[o_type]})

def show_all(request,o_type):

	kind_list = ['小說','漫畫','DVD']
	if o_type in kind_list:
		idx = kind_list.index(o_type)

	data = product.objects.filter(o_type=o_type)
	o_kind = data[0].o_kind
	k_list = ['小說','漫畫','DVD']

	return render(request, 'show.php',{'data':data,'o_kind':k_list[int(o_type)-1]}) 
	#return render(request, 'show.php',{'data':data,'o_kind':int(o_type)-1}) 