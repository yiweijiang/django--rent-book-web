"""dbfinal URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from member.views import *
from insert_data import *
from django.conf.urls.static import static
from django.conf import settings


urlpatterns = [
    path('admin/', admin.site.urls),
    path('login/', login, name='login'),
    path('logout/', logout, name='logout'),
    path('registered/',registered, name='registered'),
    path('index/', index, name='index'),
    path('index/show/', show, name='show'),
    path('insert_data/', insert_comic_data),
    path('member_only/', member_only, name='member_only'),
    
    path('index/show/<str:o_kind>', show, name='show'),
    path('index/show_hot/<str:o_kind>/', show_hot, name='show_hot'),

    path('index/show_hot_all/', show_hot_all, name='show_hot_all'),

    path('index/show_all/<str:o_type>', show_all, name='show_all'),
    path('product_detail/', product_detail, name='product_detail'),
    path('product_detail/<int:o_id>', product_detail_show, name='product_detail'),
    path('product_detail/msg_Add/<int:o_id>', msg_Add, name='msg_Add'),
    path('product_join/<int:o_id>',product_join,name='product_join'),
    path('product_delete/<int:o_id>',product_delete,name='product_delete'),
    path('product_order/<int:o_id>',product_order,name='product_order'),  
    path('product_cancel/<int:o_id>',product_cancel,name='product_cancel'),  
] + static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)