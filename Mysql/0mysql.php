<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/24
 * Time: 9:49
 */
echo '

mysql  需求分析   ：数据是什么，数据有什么特性
       逻辑设计   ：通过ER图,实体与实体之间的关系
       物理设计   ：选择数据库的工具，确定数据库名，表名，字段名遵循的原则，确认字段的数据类型，要建立表关系数据表，数据表中尽量少用外键
                   因为插入数据时候，都要检测这个外键是否在另外一个表中存在，影响效率
       性能调优   ：垂直拆分，水平拆分表


sql   添加：   insert into zmn_user (user_name,user_sex) values ("lili","男"),("ii","nv"),("oo","kj");
      修改：   update zmn_user set user_name = "pp" where user_id = 23;
      删除：   delete from zmn_user where user_id = 2;
      查询： 一列计算
            (1)select user_name,user_age + 1 from zmn_user;
            两列计算
            (2)select user_math_score - user_english_score from zmn_user;
            两列计算外加列的函数计算
            （3）select sum(user_price * user_num) from zmn_user;
            ****备注where条件其实是表达式 只要当前行是真，就把该行取出，比较运算符和逻辑运算符
            分组统计
            （4）select cat_id,avg(user_price) from zmn_user group by cat_id;
            对计算出来的结果进一步筛选
            （5）select cat_id,sum(user_price) as user_sum_price from zmn_user having user_sum_price > 200;
            有having的时候，如果还有其他的筛选条件where,那就先where后having
            (6)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200;
            where,having都是做筛选查询，如果分组了，那么使用顺序是where,having,group by
            (7)select cat_id,sum(user_price) as user_sum_price from zmn_user where cat_id > 23 having user_sum_price > 200 group by cat_id;
            查两门及两门以上不及格的人的平均成绩 name,depart,score
            select name,avg(score),sum(score<60) as num from table having num >= 2  group by name;
            按照一个字段排序
            （8）select name,score from table where score > 60 order by score desc;
            按照两个及两个以上字段排序,如：按照每个人最新人排序后（即倒叙），然后按照每个人成绩倒叙排列
            (9) select name,score,name_id from table where score > 60 order by name_id desc,score desc;

            上面是基础的查询 五种：where 、having 、group by 、order by 、limit
            五种使用顺序要严格按照以上避免出错，其中做筛选：where、having;分组：group by;排序：order by;限制取出数量：limit

            子句查询
            where 型子查询
            查每个栏目下最新的商品
            (1) select shop_id,,shop_name,shop_price from shop where shop_id in (select max(shop_id) from shop group by cat_id);
            from 型子查询
            查每个栏目下最新的商品
            （2）select cat_id,shop_id,shop_name,shop_price from (select shop_id,shop_name,shop_price from shop order by cat_id,shop_id desc) as tmp
            group by tmp.cat_id limit 1;
            查有商品的栏目
            （3）select cat_id,cat_name from cat_table where exist (select shop_name,cat_id from shop where shop.cat_id = cat.cat_id);





            select user_age + 1 from zmn_user;
            select shop_num * shop_price from shop;
            select sum(shop_num) from shop;
            select sum(shop_num) from shop group by cat_id;
            select sum(shop_num) as num from shop having num > 50 group by cat_id;
            select cat_id,sum(shop_num) as num from shop where cat_id > 20 having num > 50 group by cat_id;
            name,class,score  成绩不及格有2门及2门以上的人的平均成绩
            select name,avg(score),sum(score < 60) as num from table having num >= 2 group by name;
            select name,score from table order by score desc;












';