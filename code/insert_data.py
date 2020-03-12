from django.shortcuts import render
from member.models import *
import json
def insert_novel_data(request):

    form = 'error'

    with open('data/小說資料庫data.txt','r') as f:
        for k in f:
            result = json.loads(k).values()
            for i in result:
                comic_type = i['novel_type']
                name = i['name']
                price = i['price']
                publisher = i['publisher']
                author_list = i['author']
                img_url = i['img_url']
                language = i['language'].split()[0]
                date = i['date']

                if len(product.objects.filter(o_name=name)) == 0:
                    product.objects.create(
                        o_type = '1',
                        o_name = name,
                        o_price = price,
                        o_publisher = publisher,
                        o_stock = 2,
                        o_url = img_url,
                        o_kind = comic_type,
                        language = language,
                        p_date = date
                    )

                    for author_name in author_list:
                        author.objects.create(
                            o_id = product.objects.filter(o_name=name)[0].o_id,
                            a_name = author_name
                        )
    form = 'OK'

    return render(request, 'print_result.html', {'form': form})

def insert_comic_data(request):

    form = 'error'

    with open('data/漫畫資料庫data.txt','r') as f:
        for k in f:
            result = json.loads(k).values()
            for i in result:
                comic_type = i['comic_type']
                name = i['name']
                price = i['price']
                publisher = i['publisher']
                author_list = i['author']
                img_url = i['img_url']
                language = i['language'].split()[0]
                date = i['date']

                if len(product.objects.filter(o_name=name)) == 0:
                    product.objects.create(
                        o_type = '2',
                        o_name = name,
                        o_price = price,
                        o_publisher = publisher,
                        o_stock = 2,
                        o_url = img_url,
                        o_kind = comic_type,
                        language = language,
                        p_date = date
                    )

                    for author_name in author_list:
                        author.objects.create(
                            o_id = product.objects.filter(o_name=name)[0].o_id,
                            a_name = author_name
                        )
    form = 'OK'

    return render(request, 'print_result.html', {'form': form})


def insert_dvd_data(request):

    form = 'error'

    with open('data/DVD資料庫data.txt','r') as f:
        for k in f:
            result = json.loads(k).values()
            for i in result:

                dvd_type = i['dvd_type']
                price = i['price']
                name = i['name']
                img_url = i['img_url']
                publisher = i['publisher']
                date = i['date']
                area = i['area']
                count = i['count']


                if len(product.objects.filter(o_name=name)) == 0:
                    product.objects.create(
                        o_type = '3',
                        o_name = name,
                        o_price = price,
                        o_publisher = publisher,
                        o_stock = 2,
                        o_url = img_url,
                        o_kind = dvd_type,
                        p_date = date,
                        count = count,
                        area = area
                    )
    form = 'OK'

    return render(request, 'print_result.html', {'form': form})