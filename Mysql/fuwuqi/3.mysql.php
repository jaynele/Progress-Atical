<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/13
 * Time: 14:58
 */
echo '


具体优化：
    慢查询日志内容，然后生成报表
    如何通过慢查询日志报表结果，查找出需要优化的sql

    （1）查询次数比较多，每次查询的时间比较长的sql
    （2）IO大的sql，IO很关键，sql扫描数据库的行数，行数多，消耗就大
    （3）未命中索引的sql   发送行和扫描行   Rows Send  和  Rows examine  对比，如果远远小于扫描行，那就是命中索引的几率特别低


    一、sql索引及优化
        使用explain查询sql的执行计划
        *************************** 1. row ************
           id: 1
  select_type: SIMPLE
        table: zmn_user
         type: range
possible_keys: PRIMARY
          key: PRIMARY
      key_len: 4
          ref: NULL
         rows: 49
        Extra: Using where; Using index

        （——）table  意思：表

        （二）type   意思：重要的列，显示链接使用了何种类型，从最好到最差的链接类型为const、eq_reg、ref、range、index、ALL
            const 主键或者唯一索引
            eq_reg 范围查找
            ref    基于索引查找
            range  索引范围查找
            index  索引扫描
            ALL    表扫描

        （三）possible keys
            可能用到的索引有哪些
        (四) key
            时间用到的索引有哪些
        (五) key_len
            索引的长度，索引长度越小越好，mysql以页来读取的，一页中索引数量多查询效率相对较高
        (六) ref
            索引的哪一列被使用了，可能的话，最好是一个常数
        (七) rows
            返回结果的行数
        （八）Extra
            Using filesort:需要优化查询，对返回的行进行排序，
            Using temporary:需要优化查询，创建临时表进行存储结果，通常发生在orderBy时候


  二、count  max 的优化方法
    （一）查找最后的支付时间
    (1)explain select max(create_time) from pay_info;
    这个就非常糟糕
    （2）所以需要在字段create_time建立索引
    create index idx_create_time on pay_info(create_time);
    索引是顺序排序的

    对于max的查询可以建立索引

    （二）查16-17年的票数
        select count(year = 16 or null)，count (year = 17 or null) from table;
        count(*) 与count(id)区别：count(id)过滤了id 值为null的计数

   三、子查询优化->join
    一对多关系，对于重复的现象，子查询过滤重复，而join则是保持重复
    子查询要优化成join查询
    用distinct把链接join去重

    join 需要写好on条件，on条件优于where条件

   四、group by 查询优化
        每个演员参演的影片数量
        (1)select action.ac_name,count(film.f_id) from action left join film on action.ac_id = film.f_id group by action.ac_id;
        按照演员进行分组
        避免临时表的操作
        改写：left join 与 group by 不放在一个查询里面，先把group by出来的信息建成一个临时表，再把演员表join起来
        (2)select action.ac_name,f.num from action left join (select ac_id,count(f_id) from film group by ac_id) as f on action.ac_id = f.ac_id;

    五、limit优化
        limit通常用于分页处理，与order by一起使用，这样一般是filesort表扫描造成大量的IO问题
        (1)select film.f_id,descript from film where f_id > 20 order by title limit 20,10;
        上面的使用了表扫描的问题
        改写：使用索引或者主键列进行order by，所以现在就是扫描20行的操作，需要进一步优化，where f_id > 20 and f_id <= 20+10 limit 1,10;
        （2）select f_id,descript from film where f_id > 20 and f_id <= 20+10 order by f_id limit 1,10;
        上面扫描的行数也是10行

    六、索引优化
        如何选择合适的列建立索引
        1、在where 从句，group by 从句，order by 从句，on 从句中
        2、索引字段越小越好
        3、离散度大的列放到联合索引的前面，唯一性强
        利于查询，影响写入
        找重复或者冗余索引：相同的列建立的同类型索引，建立联合索引，前列索引又包含了主键索引，其实就是冗余索引的例子
        innodb索引后面会加上主键索引构成联合索引

        使用pt-duplicate-key-checker工具及冗余索引





































';