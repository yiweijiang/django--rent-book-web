{% extends 'base_content.php' %}
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
                    <a href="{% url 'show' '奇幻／魔法' %}">
                        <li><span>奇幻／魔法  >>></span></li>
                    </a>
                    <a href="{% url 'show' '科幻／機戰' %}">
                        <li><span>科幻／機戰  >>></span></li>
                    </a>
                    <a href="{% url 'show' '動作冒險' %}">
                        <li><span>動作冒險  >>></span></li>
                    </a>
                    <a href="{% url 'show' '戀愛故事' %}">
                        <li><span>戀愛故事  >>></span></li>
                    </a>
                    <a href="{% url 'show' '懸疑推理' %}">
                        <li><span>懸疑推理  >>></span></li>
                    </a>
                    <a href="{% url 'show' '運動／競技' %}">
                        <li><span>運動／競技  >>></span></li>
                    </a>
                </ul>
            </div>

            <div class="category-box">
                <div class="title">小說</div>
                <ul>
                    <a href="{% url 'show' '愛情小說' %}">
                        <li><span>愛情小說  >>></span></li>
                    </a>
                    <a href="{% url 'show' '奇幻小說' %}">
                        <li><span>奇幻小說  >>></span></li>
                    </a>
                    <a href="{% url 'show' '驚悚小說' %}">
                        <li><span>驚悚小說  >>></span></li>
                    </a>
                    <a href="{% url 'show' '輕小說' %}">
                        <li><span>輕小說  >>></span></li>
                    </a>
                </ul>
            </div>

            <div class="category-box">
                <div class="title">DVD</div>
                <ul>
                    <a href="{% url 'show' '電視劇' %}">
                        <li><span>電視劇  >>></span></li>
                    </a>
                    <a href="{% url 'show' '電影' %}">
                        <li><span>電影  >>></span></li>
                    </a>
                    <a href="{% url 'show' '動漫' %}">
                        <li><span>動漫  >>></span></li>
                    </a>
                </ul>
            </div>

        </div>
        <br><br><br><br>
        </div>
            <div class="col-10">{{ o_id }}

                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    
                    <div class="col-auto">
                        <img class="card-img-top" src="{{ data_dict.o_url }}" style="margin: 25px 0;" >
                    </div>
                    
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"  style="font-weight:bold; margin: 0px 10px;">{{ data_dict.o_name }}</h3><br>
                        <table class="table ">
                            <tbody>
                                {% if data_dict.o_type != '3' %}
                                <tr>
                                    <th scope="row">作者：</th>
                                    <td>{{ data_dict.author }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">出版社：</th>
                                    <td>{{ data_dict.o_publisher }}</td>
                                    <!--<td>東立</td>-->
                                </tr>
                                <tr>
                                    <th scope="row">出版日期：</th>
                                    <td>{{ data_dict.p_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">語言：</th>
                                    <td>繁體中文</td>
                                </tr>
                                {% else %}
                                <tr>
                                    <th scope="row">發行公司：</th>
                                    <td>{{ data_dict.o_publisher }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">發行日期：</th>
                                    <td>{{ data_dict.p_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">張數：</th>
                                    <td>{{ data_dict.count }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">DVD區碼：</th>
                                    <td>{{ data_dict.area }}</td>
                                    <!--<td>東立</td>-->
                                </tr>
                                {% endif %}

                                <tr>
                                    <th scope="row">定價：</th>
                                    <td>{{ data_dict.o_price }}元</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger">庫存:{{ data_dict.o_stock }}</button>

                            {% if not request.session.check %}

                            <button type="button" id="joinlove" class="btn btn-danger" onclick="joinlove()">收藏</button>
                            {% else %}
                                <button type="button" id="joinlove" style="color:white" class="btn btn-danger" onclick="deletelove()">已收藏</button>
                            {% endif %}
                            </button>
                            {% if not request.session.check_order %}
                            <button type="button" id="joinlove" class="btn btn-danger" onclick="order()">我要預約</button>
                            {% else %}
                                <button type="button" id="joinlove" style="color:white" class="btn btn-danger" onclick="cancel()">已預約</button>
                            {% endif %}
                            </button>
                        </div>
                    </div>

                    
                </div>
                    <p>__________________________________________________________________________________________________________________________________________</p>
                    <H4>看了此商品的人，也看了...</H4>
                    <br>

                    <div class="card card-body">
                        <div>
                        {% for i in res_data|slice:":5" %}
                        <div class="card" style="width: 10.7rem; height: 18rem; float: left; margin:2px;">
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
                    </div>
                        
                    <div>
                    <h3 class="text-center">會員留言板</h3>
                    <hr>
                        {% for i in msg_data %}
                        <div class="panel panel-default">
                            <div class="panel-heading"> {{ i.m_id }}
                                <span class="pull-right">{{ i.date }}</span>
                            </div>
                                <div class="panel-body">{{ i.text }}</div>
                                <p>_______________________________</p>
                        </div>
                        {% endfor %}

                    <hr>
                    <p class="pull-right">以 {{ request.session.email }} 的身份留言</p>
                    <h4>新增留言</h4>
                    <form action="{% url 'msg_Add' data_dict.o_id %}" method="post">{% csrf_token %}
                        <textarea name="msg" class="form-control" required></textarea>
                        <br>
                        <input type="submit" name="submit" value="送出" class="btn btn-primary btn-sm pull-right">
                    </form>
                    </div>
                        
                    </div>
                    <br>


            <br><br><br><br>
            </div>

    </div>

    <script>
        function joinlove() {
            window.location.href = "{% url 'product_join' data_dict.o_id %}";
        }
        function deletelove(){
            window.location.href = "{% url 'product_delete' data_dict.o_id %}";
        }
        function order() {
            window.location.href = "{% url 'product_order' data_dict.o_id %}";
        }
        function cancel(){
            window.location.href = "{% url 'product_cancel' data_dict.o_id %}";
        }
    </script>

{% endblock %}