{% extends 'base_content.php' %}
{% load static %}
{% block product_content %}
        <br>
        <p ><a href="#" style="color: black;">首頁</a>><a href="#" style="color: black;">我的專區</a>><a href="#" style="color: green;">借閱紀錄</a></p>  


        <p>
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="record love">借閱紀錄</button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="record love">我的收藏</button>
            

        </p>
         <div class="collapse show multi-collapse" id="record">
            <div class="card card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">名稱</th>
                    <th scope="col">借閱日</th>
                    <th scope="col">租借狀態</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    {% for value in order_list %}
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ value.0.o_name }}</td>
                        <td>{{value.1.l_date}}</td>
                        <td style="color: red;">{{value.2}} 到期</td>
                        <td><button onclick="detail({{value.3}})" type="button" class="btn btn-dark btn-sm">詳細資料</button></td>
                    </tr>
                    {% endfor %}
                    <!--
                    <tr>
                        <th scope="row">2</th>
                        <td>火影忍者01</td>
                        <td>2019/5/8</td>
                        <td style="color: blue;">已歸還</td>
                        <td><button type="button" class="btn btn-dark btn-sm">詳細資料</button></td>
                    </tr>-->
                    </tbody>
                </table>
            </div>

        </div>
        <div class="collapse multi-collapse" id="love">
            <div class="card card-body">
            <div>
                {% for value in product_dict %}
                <div class="card" style="width: 12rem; height: 20rem; float: left; margin:5px;">
                    <a href="#">
                    <img class="card-img-top" src="{{ value.0.o_url }}" alt="Card image cap"></a>
                    <div class="card-body" style="text-align: center;">
                        <a href="#" class="card-link" style="color: #000000">{{ value.0.o_name }}</a>
                        <br><button onclick="cancel({{value.2}})" type="button" class="btn btn-dark btn-sm">刪除</button>
                    </div>
                </div>
                {% endfor %}
                </div>
            </div>-->
        </div>
        <br><br><br><br>
        </div>
    </div>
    <script>
        function detail(o_id) {
            console.log(o_id.toString());
            window.location.href = "/product_detail/" + o_id.toString();
        }

        //function cancel(o_id) {
        //    console.log(o_id.toString());
         //   window.location.href = "/product_cancel/" + o_id.toString();
        //}
    </script>


{% endblock %}