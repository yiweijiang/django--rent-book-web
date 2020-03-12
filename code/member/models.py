from django.db import models
from django.utils import timezone
#建立會員資料表
class member(models.Model):
	m_id = models.AutoField(primary_key=True)
	m_pwd = models.CharField(max_length=30)
	m_acc = models.CharField(max_length=30)
	m_phone = models.CharField(max_length=30)
	m_date = models.DateTimeField(auto_now_add=True)
	m_name = models.TextField(default=None)

class product(models.Model):
	o_id = models.AutoField(primary_key=True)
	o_name = models.TextField()
	o_price = models.IntegerField()
	o_type = models.CharField(max_length=3)
	o_publisher = models.TextField()
	o_stock = models.IntegerField()
	o_url = models.TextField()
	o_kind = models.CharField(max_length=30,default='')
	#n_author = models.TextField(default=None)
	d_number = models.IntegerField(default=0)
	p_date = models.CharField(max_length=30,default='')
	language = models.CharField(max_length=30,default='')
	count = models.CharField(max_length=30,default='')
	area = models.CharField(max_length=30,default='')

class List(models.Model):
	l_id = models.AutoField(primary_key=True)
	o_id = models.IntegerField()
	m_id = models.IntegerField()
	l_date = models.DateTimeField(auto_now_add=True)
	l_num = models.IntegerField()
	l_state	 = models.IntegerField(default=2)

class sub(models.Model):   #訂閱清單
	sub_id = models.AutoField(primary_key=True)
	m_id = models.IntegerField()
	o_id = models.IntegerField()
	sub_num = models.IntegerField()
	s_date = models.DateTimeField(default=timezone.now)

class fine(models.Model):
	f_id = models.AutoField(primary_key=True)
	l_id = models.IntegerField()
	f_money	 = models.IntegerField()

class publisher(models.Model):
	p_id = models.AutoField(primary_key=True)
	p_phone = models.CharField(max_length=30)

class author(models.Model):
	o_id = models.IntegerField()
	a_name = models.CharField(max_length=30)

class msg(models.Model):
	m_id = models.AutoField(primary_key=True)
	mem_id = models.IntegerField()
	o_id = models.IntegerField(default=0)
	text = models.TextField()
	date = models.DateTimeField(auto_now_add=True)

class click(models.Model):
	c_id = models.AutoField(primary_key=True)
	o_id = models.IntegerField()
	date = models.DateTimeField(auto_now_add=True)