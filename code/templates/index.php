{% extends 'base_content.php' %}
{% load static %}

{% block product_content %}
		<div class="row" style="padding-top: 15px;">
			<div class="col">
				<div class="sidebar" style="width: 150px;">
<!--					
			<div class="category-box">
	            <div class="title">熱門分類</div>
	            <ul>
	                <a href="{%url 'show' '本日免費' %}">
	                    <li><span>本日免費  >>></span></li>
	                </a>
	                <a href="{%url 'show' '免費專區' %}">
	                    <li><span>免費專區  >>></span></li>
	                </a>
	                <a href="{%url 'show' '限時特價' %}">
	                    <li><span>限時特價  >>></span></li>
	                </a>
	                <a href="{%url 'show' '漫畫完結區' %}">
	                    <li><span>漫畫完結區  >>></span></li>
	                </a>
	                <a href="{%url 'show' '排行榜' %}">
	                    <li><span>排行榜  >>></span></li>
	                </a>
	            </ul>
	        </div>
-->
	        <div class="category-box">
	            <div class="title">漫畫</div>
	            <ul>
	                <a href="{%url 'show' '奇幻／魔法' %}">
	                    <li><span>奇幻／魔法  >>></span></li>
	                </a>
	                <a href="{%url 'show' '科幻／機戰' %}">
	                    <li><span>科幻／機戰  >>></span></li>
	                </a>
	                <a href="{%url 'show' '動作冒險' %}">
	                    <li><span>動作冒險  >>></span></li>
	                </a>
	                <a href="{%url 'show' '懸疑推理' %}">
	                    <li><span>戀愛故事  >>></span></li>
	                </a>
	                <a href="{%url 'show' '戀愛故事' %}">
	                    <li><span>懸疑推理  >>></span></li>
	                </a>
	                <a href="{%url 'show' '運動／競技' %}">
	                    <li><span>運動／競技  >>></span></li>
	                </a>
	            </ul>
	        </div>

	        <div class="category-box">
	            <div class="title">小說</div>
	            <ul>
	                <a href="{%url 'show' '愛情小說' %}">
	                    <li><span>愛情小說  >>></span></li>
	                </a>
	                <a href="{%url 'show' '奇幻小說' %}">
	                    <li><span>奇幻小說  >>></span></li>
	                </a>
	                <a href="{%url 'show' '驚悚小說' %}">
	                    <li><span>驚悚小說  >>></span></li>
	                </a>
	                <a href="{%url 'show' '輕小說' %}">
	                    <li><span>輕小說  >>></span></li>
	                </a>
	            </ul>
	        </div>

	        <div class="category-box">
	            <div class="title">DVD</div>
	            <ul>
	                <a href="{%url 'show' '電視劇' %}">
	                    <li><span>電視劇  >>></span></li>
	                </a>
	                <a href="{%url 'show' '電影' %}">
	                    <li><span>電影  >>></span></li>
	                </a>
	                <a href="{%url 'show' '動漫' %}">
	                    <li><span>動漫  >>></span></li>
	                </a>
	            </ul>
	        </div>

		</div>
		</div>
			<div class="col-10">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="{% static '海賊王.png' %}" class="d-block w-100" alt="...">
						</div>
					<div class="carousel-item">
						<img src="{% static '妳的名字.jpg' %}" class="d-block w-100" alt="...">
					</div>
						<div class="carousel-item">
							<img src="{% static '春上村樹.jpg' %}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="{% static '東野圭吾.jpg' %}" class="d-block w-100" alt="...">
						</div>	
						<div class="carousel-item">
							<img src="{% static '幾米.jpg' %}" class="d-block w-100" alt="...">
						</div>												
					</div>

					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<br>
				<H1>漫畫專區</H1>
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'c1')" id="defaultOpen">奇幻／魔法</button>
					<button class="tablinks" onclick="openCity(event, 'c2')">科幻／機戰</button>
					<button class="tablinks" onclick="openCity(event, 'c3')">動作冒險</button>
					<button class="tablinks" onclick="openCity(event, 'c4')">懸疑推理</button>
					<button class="tablinks" onclick="openCity(event, 'c5')">戀愛故事</button>
					<button class="tablinks" onclick="openCity(event, 'c6')">運動／競技</button>
				</div>

				<div id="c1" class="tabcontent" style="height: 300px;">
					{% for i in comic.0|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>

				<div id="c2" class="tabcontent" style="height: 300px;">
					{% for i in comic.1|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="c3" class="tabcontent" style="height: 300px;">
					{% for i in comic.2|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>

				<div id="c4" class="tabcontent" style="height: 300px;">
					{% for i in comic.3|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="c5" class="tabcontent" style="height: 300px;">
					{% for i in comic.4|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>

				<div id="c6" class="tabcontent" style="height: 300px;">
					{% for i in comic.5|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>				
				<br><br>
				<H1>小說專區</H1>
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'n1')" id="defaultOpen">愛情小說</button>
					<button class="tablinks" onclick="openCity(event, 'n2')">奇幻小說</button>
					<button class="tablinks" onclick="openCity(event, 'n3')">驚悚小說</button>
					<button class="tablinks" onclick="openCity(event, 'n4')">輕小說</button>
				</div>

				<div id="n1" class="tabcontent" style="height: 300px;">
					{% for i in novel.0|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="n2" class="tabcontent" style="height: 300px;">
					{% for i in novel.1|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="n3" class="tabcontent" style="height: 300px;">
					{% for i in novel.2|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="n4" class="tabcontent" style="height: 300px;">
					{% for i in novel.3|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<br>
				<H1>DVD專區</H1>
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'd1')" id="defaultOpen">電視劇</button>
					<button class="tablinks" onclick="openCity(event, 'd2')">電影</button>
					<button class="tablinks" onclick="openCity(event, 'd3')">動漫</button>
					
				</div>
				<div id="d1" class="tabcontent" style="height: 300px;">
					{% for i in dvd.0|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="d2" class="tabcontent" style="height: 300px;">
					{% for i in dvd.1|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<div id="d3" class="tabcontent" style="height: 300px;">
					{% for i in dvd.2|slice:":5" %}
					<div class="card" style="width: 10rem; float: left; margin:5px;">
						<!--<a href="{% url 'product_detail' %}" style="color: black;">-->
						<a href="{% url 'product_detail' i.o_id %}" style="color: black;">
							<img class="card-img-top" src="{{ i.o_url }}" alt="Card image cap">
							<div class="card-body" style="text-align: center;">	
								<a href="#" class="card-link" style="color: #000000">{{ i.o_name }}</a>
							</div>
						</a>
					</div>
					{% endfor %}
				</div>
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>
	{% if message %}
		<script>
			alert('{{ message }}');
		</script>
	{% endif %}

	<script>
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
{% endblock %}