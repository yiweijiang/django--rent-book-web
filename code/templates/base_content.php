{% extends 'base.php' %}
{% load static %}
{% block css_style %}
    <link rel="stylesheet" href="{% static 'styles.css' %}">
    <style type="text/css">
        .sidebar {
            width: 160px;
            border: 2px solid #dddddd;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            box-sizing: initial;
        }
        .sidebar .category-box:first-child .title {
            border-top: none;
        }
        .sidebar .category-box .title:last-child {
            border-bottom: none;
        }
        .sidebar .category-box .title {
            background-color: #f5f5f5;
            padding: 10px 15px;
            border-top: 2px solid #dddddd;
            border-bottom: 2px solid #dddddd;
            color: #384047;
            line-height: normal;
        }
        .sidebar .category-box .title:first-child {
            font-weight: bold;
        } 
        .sidebar .category-box ul {
            list-style-type:none;
            margin: 0;
            padding: 0;
        }
        .sidebar .category-box li {

            list-style-type: none;
        }
        .sidebar .category-box a {
            display: block;
            padding: 10px 15px;
            color: #666666;
            position: relative;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            line-height: normal;
        }
        .sidebar .category-box a:after {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: .8em;
            font-family: FontAwesome;
        }
        .sidebar .category-box a:hover {
            background-color: #f5f5f5;
        }

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          width: auto;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: #FFFFFF;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #FFFF77;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }

    </style>
{% endblock %}

{% block content %}
    <div class="container" style="padding-top: 15px">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{% url 'index' %}">
                <img src="{% static 'tku.jpg' %}" width="30" height="30" class="d-inline-block align-top" alt="">
                TKU 租書會社
             </a>
             
             <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" aria-label="Search">
                <button class="btn btn-sm btn-outline-secondary" type="submit">搜尋</button>
            </form>

        </nav>
        <br>
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href="{% url 'show_hot_all' %}">熱門</a></li>
                <li><a href="{% url 'show_all' '1' %}">小說</a></li>
                <li><a href="{% url 'show_all' '2' %}">漫畫</a></li> 
                <li><a href="{% url 'show_all' '3' %}">DVD</a></li>
                
                <li style="float: right;"><a href="{% url 'registered' %}">免費註冊</a></li>

                {% if "email" in request.session %}
                <li style="float: right;"><a href="{% url 'logout' %}">登出</a></li>
                {% else %}
                <li style="float: right;"><a href="{% url 'login' %}">登入</a></li>
                {% endif %}

                <li style="float: right;"><a href="{% url 'member_only' %}">會員專區</a></li>
            </ul>
        </div>
        <br>
        <div style="width: auto; height: 120px; background-color:#f5f5f5; ">
            <h1>廣告出租</h1>
        </div>
        {% block product_content %}
        {% endblock %}
{% endblock %}