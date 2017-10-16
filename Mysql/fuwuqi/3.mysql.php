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
            select count(year = 16 or year = 17)

































';