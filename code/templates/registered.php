{% extends 'base.php' %}
{% load static %}
{% block content %}
	<div class="container" style="padding-top: 100px; text-align:center;">
		<form class="form-signin" style=" display: inline-block;" action='.' method="POST">{% csrf_token %}

			<div class="text-center mb-4">
				<a href="{% url 'index' %}" style="color: black;">
				<img class="mb-4" src="{% static 'tku.jpg' %}" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">TKU 租書會社</h1>
				<p>註冊會員！享受優惠 , 獲取第一手最新消息</p></a>
			</div>

			<div class="form-label-group">
				<label for="inputEmail">姓名:</label>
				<input type="text" id="inputName" class="form-control" placeholder="name" required autofocus
				name="registered_name">
			</div>
			<div class="form-label-group" style="padding-top: 10px;">
				<label for="inputEmail">手機號碼:</label>
				<input type="text" id="inputPhone" class="form-control" placeholder="cellphone" required autofocus
				name="registered_phone">
			</div>
			<div class="form-label-group" style="padding-top: 10px;">
				<label for="inputEmail">信箱:</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="email" required autofocus
				name="registered_email">
			</div>
			<div class="form-label-group" style="padding-top: 10px;">
				<label for="inputPassword">密碼:</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required
				name="registered_password">	
			</div>
			<div class="checkbox mb-3" style="padding-top: 10px;">
				<label>
				<input type="checkbox" value="remember-me"> 記住我
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">按此註冊</button>
			<a href="{% url 'login' %}">已經有會員?按此登入</a>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2019-20xx</p>
		</form>
	</div>
{% endblock %}