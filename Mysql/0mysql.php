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
            select name,avg(score),count(score<60) as num from table having num >= 2  group by name;







';