<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/29
 * Time: 9:14
 */
echo '

慢查询
索引：key,最优的索引比好的索引要好两个数量级；
     索引可以包含多个列的值，列的顺序也很重要，这时只能高效使用最左前缀的列；
     一个包含两个列的索引和创建两个只包含一个列的索引，效果不一样

索引类型：为不同的场景提供不同的性能，索引是在存储引擎层实现而不是在服务器层实现；
         没有统一的索引标准，不同存储引擎的索引工作方式不一样；不是所有的存储引擎支持所有的索引类型；
         没有特别指明索引类型，一般使用的都是B-tree类型，
         myisam 是根据物理位置索引行的，innodb是按照主键索引行的，B-tree所有值按照顺序存储，每个叶子到根的距离相同，
         B-Tree索引可以加快数据的访问速度，因为不用再全表扫描，
         B-Tree索引是顺序组织存储的，适合查找范围数据，
         文本域索引树，按照字母顺序传递查找非常合适，

         全值匹配：所有列进行匹配，
         匹配最左前缀：只使用索引的第一列
         匹配列前缀：匹配某一列值的开头部分
         匹配范围值：只使用索引第一列
         精确匹配某一列并范围匹配另外一列
         只访问索引的查询：

 索引：用于按值查找，用于order by 查找
 索引限制：如果不是按照索引最左列开始查找，无法使用索引
          不能跳过索引列，只能按照索引顺序进行查询
          如果查询中有范围查询，比如列中用到like,那么like后面的列都不能使用索引优化，如果查询范围的列值数量有限，就用等于条件来替代
          索引顺序很关键，优化性能的时候，可能使用相同列进行查询，但是索引顺序不同来满足不同类型的查询

 B-Tree:
 Hash:哈希索引，精确匹配索引所有列才能实现，对每一行数据，存储引擎会对所有索引列计算一个哈希码，哈希码是一个较小的值，不同主键值的行的
            哈希码不同，先查找对应的哈希值，然后根据哈希值，指向对应行，最后比较对应行是否是查找的那个值，只需要存储对应的哈希值，所以
            索引结构紧凑，查找速度特别快，
            memory引擎支持哈希索引，也支持B-Tree索引，

            哈希索引对应的限制：只包含哈希值和行指针，不包含字段值，
                             不是按照索引值顺序存储的，所以不能用于排序
                             不支持部分索引列匹配查找，因为是使用所有索引列计算哈希值的，
                             只支持等值比较查询，
                             访问哈希索引的速度非常快，除非有哈希冲突，哈希冲突是可能两行有相同的哈希值
                             哈希冲突多了，维护的成本就会很高
                             哈希索引只适用于特定场合，一旦适用，速度就会非常快，
            innodb引擎：有个特殊的功能叫做‘自适应哈希索引’，当某些索引用的非常频繁，会在内存中在B-Tree基础上创建哈希索引，这样B-Tree索引
                        也有哈希索引的一些优点。这是完全自动，内部的行为，用户无法控制，除非关闭。













';