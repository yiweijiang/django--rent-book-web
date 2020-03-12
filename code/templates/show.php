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
                    <a href="{%url 'show' '奇幻／魔法' %}">
                        <li><span>奇幻／魔法  >>></span></li>
                    </a>
                    <a href="{%url 'show' '科幻／機戰' %}">
                        <li><span>科幻／機戰  >>></span></li>
                    </a>
                    <a href="{%url 'show' '動作冒險' %}">
                        <li><span>動作冒險  >>></span></li>
                    </a>
                    <a href="{%url 'show' '戀愛故事' %}">
                        <li><span>戀愛故事  >>></span></li>
                    </a>
                    <a href="{%url 'show' '懸疑推理' %}">
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
        <br><br><br><br>
        </div>
            <div class="col-10">
                <p ><a href="#" style="color: black;">首頁</a>><a href="#" style="color: black;">{{ o_type }}</a>><a href="#" style="color: green;">{{ o_kind }}</a></p>  

                <div id='cssmenu'>
                    <ul>
                        <h4>排序:</h4>
                        <li class='active'><a href="{% url 'show' o_kind %}">最新</a></li>
                        <li class='active'><a href="{% url 'show_hot' o_kind %}">熱門點閱</a></li> 
                        <!--<li><a href='#'>銷量</a></li> 
                        <li><a href='#'>評價</a></li>-->
                    </ul>
                </div>
               <br>
               <div >
                   <div class="card card-body">
                        <div>
                        {% for i in data|slice:":20" %}
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
               </div>
               <div style="display:flex; align-items:center; justify-content:center;">
               <nav aria-label="Page navigation example" >
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <br><br><br><br>
            </div>
            </div>
            </div>

                

    </div>


{% endblock %}