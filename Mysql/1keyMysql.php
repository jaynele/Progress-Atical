<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/29
 * Time: 9:14
 */
echo '

慢查询:慢查询日志会记录所有超过long_query_time的sql语句，找到执行慢的sql，方便我们优化
1、查看慢查询状态是否开启，   show variables like "%slow%";

2、my.ini   添加下面的内容：
slow_query_log = on
slow-query-log-file = "D:/xampp/mysql/data/Lenovo-PC-slow.log"
long_query_time = 1

3、重启服务器，查看慢查询是否已经开启



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


字符串做索引，效率特别慢，
正确创建和使用索引是实现高性能查询的基础

高效发挥索引优点：
                 1、独立的列，是指索引列不能是条件表达式的一部分，也不能是函数的参数，养成简化where条件的习惯
                 2、前缀索引和索引选择性，选择性：不重复，索引性能更好
                 3、多列索引，在多个列上建立独立的单列索引，多个and条件，说明需要一个包含相关列的多列索引，而不是多个单列索引

三星索引：1、将所有记录放到一起
        2、索引中数据顺序跟查询中的排列索引一致
        3、索引中的列包含查询中需要的全部列

多列索引选择合适的索引列顺序：B-Tree索引：
            1、将选择性最高的列放索引的最前列，但是性能也不只依赖选择性，还依赖查询条件的值，
            2、
























explain显示了mysql如何使用索引来处理select语句以及连接表。可以帮助选择更好的索引和写出更优化的查询语句。

虽然这篇文章我写的很长，但看起来真的不会困啊，真的都是干货啊！！！！

先解析一条sql语句，看出现什么内容

EXPLAIN SELECT s.uid,s.username,s.name,f.email,f.mobile,f.phone,f.postalcode,f.address
FROM uchome_space AS s,uchome_spacefield AS f
WHERE 1
AND s.groupid=0
AND s.uid=f.uid

1. id

SELECT识别符。这是SELECT查询序列号。这个不重要,查询序号即为sql语句执行的顺序，看下面这条sql

EXPLAINSELECT *FROM (SELECT* FROMuchome_space LIMIT 10)AS s

它的执行结果为


可以看到这时的id变化了

2.select_type

select类型，它有以下几种值

2.1 simple 它表示简单的select,没有union和子查询

2.2 primary 最外面的select,在有子查询的语句中，最外面的select查询就是primary,上图中就是这样

2.3 union union语句的第二个或者说是后面那一个.现执行一条语句，explain
select  *  from uchome_space limit 10 union select * from uchome_space limit 10,10

会有如下结果

第二条语句使用了union

2.4 dependent union    UNION中的第二个或后面的SELECT语句，取决于外面的查询

2.5 union result        UNION的结果,如上面所示

还有几个参数，这里就不说了，不重要

3 table

输出的行所用的表，这个参数显而易见，容易理解

4 type

连接类型。有多个参数，先从最佳类型到最差类型介绍 重要且困难

4.1 system

表仅有一行，这是const类型的特列，平时不会出现，这个也可以忽略不计

4.2 const

表最多有一个匹配行，const用于比较primary key 或者unique索引。因为只匹配一行数据，所以很快

记住一定是用到primary key 或者unique，并且只检索出两条数据的 情况下才会是const,看下面这条语句

explain SELECT * FROM `asj_admin_log` limit 1,结果是

虽然只搜索一条数据，但是因为没有用到指定的索引，所以不会使用const.继续看下面这个

explain SELECT * FROM `asj_admin_log` where log_id = 111

log_id是主键，所以使用了const。所以说可以理解为const是最优化的

4.3 eq_ref

对于eq_ref的解释，mysql手册是这样说的:"对于每个来自于前面的表的行组合，从该表中读取一行。这可能是最好的联接类型，除了const类型。它用在一个索引的所有部分被联接使用并且索引是UNIQUE或PRIMARY KEY"。eq_ref可以用于使用=比较带索引的列。看下面的语句

explain select * from uchome_spacefield,uchome_space where uchome_spacefield.uid = uchome_space.uid

得到的结果是下图所示。很明显，mysql使用eq_ref联接来处理uchome_space表。

目前的疑问：

       4.3.1 为什么是只有uchome_space一个表用到了eq_ref,并且sql语句如果变成

       explain select * from uchome_space,uchome_spacefield where uchome_space.uid = uchome_spacefield.uid

       结果还是一样，需要说明的是uid在这两个表中都是primary

4.4 ref 对于每个来自于前面的表的行组合，所有有匹配索引值的行将从这张表中读取。如果联接只使用键的最左边的前缀，或如果键不是UNIQUE或PRIMARY KEY（换句话说，如果联接不能基于关键字选择单个行的话），则使用ref。如果使用的键仅仅匹配少量行，该联接类型是不错的。

看下面这条语句 explain select * from uchome_space where uchome_space.friendnum = 0，得到结果如下，这条语句能搜出1w条数据


4.5 ref_or_null 该联接类型如同ref，但是添加了MySQL可以专门搜索包含NULL值的行。在解决子查询中经常使用该联接类型的优化。

上面这五种情况都是很理想的索引使用情况

4.6 index_merge 该联接类型表示使用了索引合并优化方法。在这种情况下，key列包含了使用的索引的清单，key_len包含了使用的索引的最长的关键元素。

4.7 unique_subquery

4.8 index_subquery

4.9 range 给定范围内的检索，使用一个索引来检查行。看下面两条语句

explain select * from uchome_space where uid in (1,2)

explain select * from uchome_space where groupid in (1,2)

uid有索引，groupid没有索引，结果是第一条语句的联接类型是range,第二个是ALL.以为是一定范围所以说像 between也可以这种联接,很明显

explain select * from uchome_space where friendnum = 17

这样的语句是不会使用range的，它会使用更好的联接类型就是上面介绍的ref

4.10 index     该联接类型与ALL相同，除了只有索引树被扫描。这通常比ALL快，因为索引文件通常比数据文件小。（也就是说虽然all和Index都是读全表，但index是从索引中读取的，而all是从硬盘中读的）

当查询只使用作为单索引一部分的列时，MySQL可以使用该联接类型。
4.11  ALL  对于每个来自于先前的表的行组合，进行完整的表扫描。如果表是第一个没标记const的表，这通常不好，并且通常在它情况下很差。通常可以增加更多的索引而不要使用ALL，使得行能基于前面的表中的常数值或列值被检索出。

5 possible_keys 提示使用哪个索引会在该表中找到行，不太重要

6 keys MYSQL使用的索引，简单且重要

7 key_len MYSQL使用的索引长度

8 ref   ref列显示使用哪个列或常数与key一起从表中选择行。

9 rows 显示MYSQL执行查询的行数，简单且重要，数值越大越不好，说明没有用好索引

10 Extra  该列包含MySQL解决查询的详细信息。

10.1 Distinct     MySQL发现第1个匹配行后，停止为当前的行组合搜索更多的行。一直没见过这个值

10.2 Not exists

10.3 range checked for each record

没有找到合适的索引

10.4 using filesort

MYSQL手册是这么解释的“MySQL需要额外的一次传递，以找出如何按排序顺序检索行。通过根据联接类型浏览所有行并为所有匹配WHERE子句的行保存排序关键字和行的指针来完成排序。然后关键字被排序，并按排序顺序检索行。”目前不太明白

10.5 using index 只使用索引树中的信息而不需要进一步搜索读取实际的行来检索表中的信息。这个比较容易理解，就是说明是否使用了索引

explain select * from ucspace_uchome where uid = 1的extra为using index（uid建有索引）

explain select count(*) from uchome_space where groupid=1 的extra为using where(groupid未建立索引)

10.6 using temporary

为了解决查询，MySQL需要创建一个临时表来容纳结果。典型情况如查询包含可以按不同情况列出列的GROUP BY和ORDER BY子句时。

出现using temporary就说明语句需要优化了，举个例子来说

EXPLAIN SELECT ads.id FROM ads, city WHERE   city.city_id = 8005   AND ads.status = “online”   AND city.ads_id=ads.id ORDER BY ads.id desc

id  select_type  table   type    possible_keys   key      key_len  ref                     rows  filtered  Extra
------  -----------  ------  ------  --------------  -------  -------  --------------------  ------  --------  -------------------------------
     1  SIMPLE       city   ref     ads_id,city_id  city_id  4        const                   2838    100.00 Using temporary; Using filesort
     1  SIMPLE       ads     eq_ref  PRIMARY         PRIMARY  4        city.ads_id       1    100.00  Using where

这条语句会使用using temporary,而下面这条语句则不会

EXPLAIN SELECT ads.id FROM ads, city WHERE   city.city_id = 8005   AND ads.status = "online   AND city.ads_id=ads.id ORDER BYcity.ads_id desc

id  select_type  table   type    possible_keys   key      key_len  ref                     rows  filtered  Extra
------  -----------  ------  ------  --------------  -------  -------  --------------------  ------  --------  ---------------------------
     1  SIMPLE       city   ref     ads_id,city_id  city_id  4        const                   2838    100.00 Using where; Using filesort
     1  SIMPLE       ads    eq_ref  PRIMARY         PRIMARY  4        city.ads_id       1    100.00  Using where

这是为什么呢？他俩之间只是一个order by不同，MySQL 表关联的算法是 Nest Loop Join，是通过驱动表的结果集作为循环基础数据，然后一条一条地通过该结果集中的数据作为过滤条件到下一个表中查询数据，然后合并结果。EXPLAIN 结果中，第一行出现的表就是驱动表（Important!）以上两个查询语句，驱动表都是 city，如上面的执行计划所示！
对驱动表可以直接排序，对非驱动表（的字段排序）需要对循环查询的合并结果（临时表）进行排序（Important!）
因此，order by ads.id desc 时，就要先 using temporary 了！
驱动表的定义
wwh999 在 2006年总结说，当进行多表连接查询时， [驱动表] 的定义为：
1）指定了联接条件时，满足查询条件的记录行数少的表为[驱动表]；
2）未指定联接条件时，行数少的表为[驱动表]（Important!）。
永远用小结果集驱动大结果集

今天学到了一个很重要的一点：当不确定是用哪种类型的join时，让mysql优化器自动去判断，我们只需写select * from t1,t2 where t1.field = t2.field
10.7 using where

WHERE子句用于限制哪一个行匹配下一个表或发送到客户。除非你专门从表中索取或检查所有行，如果Extra值不为Using where并且表联接类型为ALL或index，查询可能会有一些错误。（这个说明不是很理解，因为很多很多语句都会有where条件，而type为all或index只能说明检索的数据多，并不能说明错误，useing where不是很重要，但是很常见）

如果想要使查询尽可能快，应找出Using filesort 和Using temporary的Extra值。
10.8 Using sort_union(...), Using union(...),Using intersect(...)

这些函数说明如何为index_merge联接类型合并索引扫描

10.9 Using index for group-by

类似于访问表的Using index方式，Using index for group-by表示MySQL发现了一个索引，可以用来查询GROUP BY或DISTINCT查询的所有列，而不要额外搜索硬盘访问实际的表。并且，按最有效的方式使用索引，以便对于每个组，只读取少量索引条目。

实例讲解


通过相乘EXPLAIN输出的rows列的所有值，你能得到一个关于一个联接如何的提示。这应该粗略地告诉你MySQL必须检查多少行以执行查询。当你使用max_join_size变量限制查询时，也用这个乘积来确定执行哪个多表SELECT语句。



2017年1.26的拓展      我是无所不能的coder的分界线

回头看看几年前写的这篇博客，真的也是很浅显，只是简单的介绍了explain后每个选项的概念，对于实例没有太多的讲解，而且最重要的是没有指出那种情况下的选项（结合实际情况）才是最优化的，ok,start again

很明显，在所有explain的结果中最重要的要数type/key/rows/extra这4个字段了,那接下来我着重在说一下这四个字段代表的意思及如何优化

现有两个表，一个项目表（project），一个留言表(t_message)，用户可以针对不同的项目进行流行操作。

现有一个最基本的联表操作，

EXPLAIN SELECT * FROM project AS p JOIN jmw_message.t_message AS t ON p.id = t.target_id
结果是这样的

出现这种情况是最容易理解的了，因为这只是简单联表查询，没有加任何条件，在实际情况下是不会出现这种sql的。从上图的结果中可以看出mysql对t_message表进行了全表扫描，对project表使用了eq_ref,这符合了mysql对什么情况下会使用到eq_ref的定义，这是非常理想的一种连接类型。

下面我们讨论一个实际情况下会遇到的例子，我们联表取前100条数据，
EXPLAIN SELECT * FROM project AS p JOIN jmw_message.t_message AS t ON p.id = t.target_id LIMIT 100


可以发现，除了影响的行数稍微多了一点（可以忽略，甚至可以理解为没有不同），其他所有的参数都是相同的，也就是说，这种情况下搜索全部数据和搜索100条数据的耗时是一样的，为什么会这样呢？不应该啊！！

这里需要着重说明的是：上面两条语句explain得到的结果是相同的，是因为他们的索引使用策略是相同的，即都没有很好的使用索引，（因为没有where条件和order by语句）但他们的最终耗时是不同的，很明显传输100条数据肯定要比传送1条数据慢。所以，最终耗时会在sending data（用show profile查看）上消耗的比例最大

那实际情况下，最有可能会遇到什么问题呢？

1 根据项目id作为搜索条件（即使用where条件）

2 根据时间或者id来排序（即使用order by条件）

3 根据以上两个

下面我们开始举栗子

《1》搜索最新的100条留言

《2》搜索出某个项目下最新的10条留言

《3》搜索出某个项目最近一个月每天有多少条留言

《4》搜索出最近一个月每天有多少条留言

《5》搜索某个用户今天留言数量

《6》搜索今天有多少条新增留言

下面我们开始吃栗子

《1》搜索最新的100条留言

          EXPLAIN SELECT * FROM project AS p JOIN jmw_message.t_message AS t ON p.id = t.target_id ORDER BY t.id DESC LIMIT 100 ;
          EXPLAIN SELECT * FROM project AS p JOIN jmw_message.t_message AS t ON p.id = t.target_id ORDER BY p.id DESC LIMIT 100

以下两条语句都能实现效果，但索引使用情况却完全不同。第一条语句要比第二条优化的多，



可以看到，第一条语句的type值为index,影响结果即只有100行，也就是说非常合适的使用了索引。正所谓，福无双至祸不单行，当你一个地方出问题的时候，难免其他地方也出问题，因为没有使用合理的索引-->导致全表扫描-->影响结果集太大-->从而导致使用了using temporary和using filesort(这个也很重要)。那这两条语句很明显只有order by条件的一点小小的不同.说实话，我不是很理解为什么会出现这种情况因为这两个条件分表是两个表的主键，都有主键索引，唯一合理的解释可能是因为这时候联表之后t_message是主表（因为他是留言表，一切以他为准），而order by排序当然应该是根据主表的主键拍排序才会使用到索引了，似乎有点牵强，但貌似这么理解没有大毛病

下面着重说一下using temporary和using filesort

using temporary 官方解释：”为了解决查询，MySQL需要创建一个临时表来容纳结果。典型情况如查询包含可以按不同情况列出列的GROUP BY和ORDER BY子句时。“”很明显就是通过where条件一次性检索出来的结果集太大了，内存放不下了，只能通过家里临时表来辅助处理

using filesort 官方解释：“MySQL需要额外的一次传递，以找出如何按排序顺序检索行。通过根据联接类型浏览所有行并为所有匹配WHERE子句的行保存排序关键字和行的指针来完成排序。然后关键字被排序，并按排序顺序检索行”

我这里的理解是：对于order by的字段没有使用到字段，所以使用了using filesort.   这两个问题同时出现的可能性很大啊！！！

《2》搜索出某个项目下最新的10条留言

EXPLAIN SELECT * FROM t_message WHERE target_id = 770 ORDER BY id DESC LIMIT 10;
EXPLAIN SELECT * FROM t_message WHERE target_id = 770 ORDER BY publish_time DESC LIMIT 10

以上两条select语句的执行搜索结果是一样的，但explain分析结果不同，只是因为order by 条件的不同











';