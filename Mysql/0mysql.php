<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/24
 * Time: 9:49
 */
echo '

mysql  �������   ��������ʲô��������ʲô����
       �߼����   ��ͨ��ERͼ,ʵ����ʵ��֮��Ĺ�ϵ
       �������   ��ѡ�����ݿ�Ĺ��ߣ�ȷ�����ݿ������������ֶ�����ѭ��ԭ��ȷ���ֶε��������ͣ�Ҫ��������ϵ���ݱ������ݱ��о����������
                   ��Ϊ��������ʱ�򣬶�Ҫ����������Ƿ�������һ�����д��ڣ�Ӱ��Ч��
       ���ܵ���   ����ֱ��֣�ˮƽ��ֱ�


sql   ���ӣ�   insert into zmn_user (user_name,user_sex) values ("lili","��"),("ii","nv"),("oo","kj");
      �޸ģ�   update zmn_user set user_name = "pp" where user_id = 23;
      ɾ����   delete from zmn_user where user_id = 2;
      ��ѯ�� һ�м���
            (1)select user_name,user_age + 1 from zmn_user;
            ���м���
            (2)select user_math_score - user_english_score from zmn_user;
            ���м�������еĺ�������
            ��3��select sum(user_price * user_num) from zmn_user;
            ****��עwhere������ʵ�Ǳ���ʽ ֻҪ��ǰ�����棬�ͰѸ���ȡ�����Ƚ���������߼������
            ����ͳ��
            ��4��select cat_id,avg(user_price) from zmn_user group by cat_id;
            �Լ�������Ľ����һ��ɸѡ
            ��5��select cat_id,sum(user_price) as user_sum_price from zmn_user having user_sum_price > 200;
            ��having��ʱ���������������ɸѡ����where,�Ǿ���where��having
            (6)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200;
            where,having������ɸѡ��ѯ����������ˣ���ôʹ��˳����where,having,group by
            (7)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200 group by cat_id;
            �����ż��������ϲ�������˵�ƽ���ɼ� name,depart,score
            select name,avg(score),sum(score<60) as num from table having num >= 2  group by name;
            ����һ���ֶ�����
            ��8��select name,score from table where score > 60 order by score desc;
            �������������������ֶ�����,�磺����ÿ��������������󣨼����𣩣�Ȼ����ÿ���˳ɼ���������
            (9) select name,score,name_id from table where score > 60 order by name_id desc,score desc;

            �����ǻ����Ĳ�ѯ ���֣�where ��having ��group by ��order by ��limit
            ����ʹ��˳��Ҫ�ϸ������ϱ��������������ɸѡ��where��having;���飺group by;����order by;����ȡ��������limit

            �Ӿ��ѯ
            where ���Ӳ�ѯ
            ��ÿ����Ŀ�����µ���Ʒ
            (1) select shop_id,,shop_name,shop_price from shop where shop_id in (select max(shop_id) from shop group by cat_id);
            from ���Ӳ�ѯ
            ��ÿ����Ŀ�����µ���Ʒ
            ��2��select cat_id,shop_id,shop_name,shop_price from (select shop_id,shop_name,shop_price from shop order by cat_id,shop_id desc) as tmp
            group by tmp.cat_id limit 1;
            ������Ʒ����Ŀ
            ��3��select cat_id,cat_name from cat_table where exist (select shop_name,cat_id from shop where shop.cat_id = cat.cat_id);

            ���Ӳ�ѯ
            inner join on  ��������
            left join on   ������У��ұ�û��null����
            right join on  �ұ����У����û��null����

            union��ѯ
            sql1����N�У�sql2����M��
            sql1 union sql2 ����N+M�У�sql1��sql2������Ӧ����ȣ��������sql1������Ϊ׼
            ע�⣺union ��Ƚ����Ƿ���ȣ���ȵ��л�ϲ����ȽϵĹ����л����Դ��
            union all �м�ʹ��ȣ�Ҳ����ϲ���ʵ������union all�����ߵ��Ӿ䲻ʹ��order by����



            write:
            (1)һ�м���
            select user_age + 1 from zmn_user;
            ��2�����м���
            select shop_num * shop_price from shop;
            ��3�����м���+��������
            select sum(shop_num * shop_price) from shop;
            ��4���������
            select cat_id,sum(shop_num * shop_price) from shop group by cat_id;
            ��5���Լ�����������ݽ�һ��ɸѡ
            select (shop_num * shop_price) as num from shop having num > 500;
            ��6��������������ݽ���ɸѡ�����������ɸѡ����
            select (shop_num * shop_price) as num from shop where cat_id > 20 having num > 500;
            ��7�������ż��������ϲ�������˵����۳ɼ�
            select name,avg(score),sum(score < 60) as num from table having num >= 2 group by name;
            ��8����һ���ֶ�����
            select name,avg(score) from table order by score desc;
            ��9���������ֶ�����
            select shop_num,shop_name from shop order by cat_id desc,shop_id desc;
            ��1���Ӿ�where
            select shop_name,shop_id,shop_price from shop where shop_id in (select max(shop_id) from shop group by cat_id);
            ��2���Ӿ�from
            select shop_name,shop_id,shop_price from (select shop_name,shop_id,shop_price from shop order by cat_id, order by shop_id desc) as tmp group by cat_id limit 1;
            ��3���Ӿ�exist
            select cat_id,cat_name from cat where exist (select shop_id,cat_id from shop where shop.cat_id = cat.cat_id);
















';