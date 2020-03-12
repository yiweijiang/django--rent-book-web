{% extends 'base.php' %}
{% load static %}
{% block content %}
	<div class="container" style="padding-top: 100px; text-align:center;">
		<form action='.' class="form-signin" style=" display: inline-block;" method="POST">{% csrf_token %}

			<div class="text-center mb-4">
				<a href="{% url 'index' %}" style="color: black;">
				<img class="mb-4" src="{% static 'tku.jpg' %}" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">TKU 租書會社</h1>
				<p>登入會員！享受優惠 , 獲取第一手最新消息</p></a>
			</div>

			<div class="form-label-group">
				<label for="inputEmail">帳號:</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Account" required autofocus
				name="login_account">
			</div>
			<div class="form-label-group" style="padding-top: 10px;">
				<label for="inputPassword">密碼:</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required
				name="login_password">	
			</div>
			<div class="checkbox mb-3" style="padding-top: 10px;">
				<label>
				<input type="checkbox" value="remember-me"> 記住我
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">按此登入</button>
			<a href="{% url 'registered' %}">還沒有會員?按此註冊</a>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2019-20xx</p>
			{% if error %}
				<div class="form-label-group" style="padding-top: 10px;">
					<label style="color:red" for="inputPassword">{{ error }}</label>
				</div>
			{% endif %}

		</form>
	</div>
{% endblock %}