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
       �������   ��ѡ�����ݿ�Ĺ��ߣ�ȷ�����ݿ������������ֶ�����ѭ��ԭ��ȷ���ֶε��������ͣ�Ҫ�������ϵ���ݱ����ݱ��о����������
                   ��Ϊ��������ʱ�򣬶�Ҫ����������Ƿ�������һ�����д��ڣ�Ӱ��Ч��
       ���ܵ���   ����ֱ��֣�ˮƽ��ֱ�


sql   ��ӣ�   insert into zmn_user (user_name,user_sex) values ("lili","��"),("ii","nv"),("oo","kj");
      �޸ģ�   update zmn_user set user_name = "pp" where user_id = 23;
      ɾ����   delete from zmn_user where user_id = 2;
      ��ѯ�� һ�м���
            (1)select user_name,user_age + 1 from zmn_user;
            ���м���
            (2)select user_math_score - user_english_score from zmn_user;
            ���м�������еĺ�������
            ��3��select sum(user_price * user_num) from zmn_user;
            ****��עwhere������ʵ�Ǳ��ʽ ֻҪ��ǰ�����棬�ͰѸ���ȡ�����Ƚ���������߼������
            ����ͳ��
            ��4��select cat_id,avg(user_price) from zmn_user group by cat_id;
            �Լ�������Ľ����һ��ɸѡ
            ��5��select cat_id,sum(user_price) as user_sum_price from zmn_user having user_sum_price > 200;
            ��having��ʱ���������������ɸѡ����where,�Ǿ���where��having
            (6)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200;
            where,having������ɸѡ��ѯ����������ˣ���ôʹ��˳����where,having,group by
            (7)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200 group by cat_id;
            �����ż��������ϲ�������˵�ƽ���ɼ� name,depart,score
            select name,avg(score),count(score<60) as num from table having num >= 2  group by name;







';