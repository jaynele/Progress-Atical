<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/11
 * Time: 11:48
 */
echo "

（一）路由定义
    1、混合模式
    'url_route_on'  =>  true,
    'url_route_must'=>  false,
    2、强制模式
    'url_route_on'  		=>  true,
    'url_route_must'		=>  true,
（请求信息）
    (1)获取request路径信息
    可以使用\think\Request类，
    $request = Request::instance();
    echo "当前模块名称是" . $request->module();
    echo "当前控制器名称是" . $request->controller();
    echo "当前操作名称是" . $request->action();"
    （2）变量是否设置
    input('?get.id');
    input('?post.name');
    （3）获取某个变量
    Request::instance()->get('id'); // 获取某个get变量
    Request::instance()->get(); // 获取所有的get变量（经过过滤的数组）
    input('get.id');
    input('get.');
    input('post.name');
    input('post.');
    input('session.user_id');
    input('session.');
    input('cookie.user_id');
    input('cookie.');
    （4）判断是否是get请求
    if (request()->isGet())；
    （5）判断是否是post请求
    if (request()->isPost());
    (6)判断是否是Ajax请求
    if (request()->isAjax())


（二）控制器
（1）
继承think下面的控制器
use think\Controller;

class Index extends Controller

（2）
控制器里面初始时候加载
_initialize

（3）
控制器beforeActionList属性可以指定某个方法为其他方法的前置操作
数组键名为需要调用的前置方法名，所以需要调用的前置方法都为受保护的，无值的话为当前控制器下所有方法的前置方法。

(三、1)数据库基本使用
    每个模块下面的数据库
    1、直接使用数据库运行原生sql query（查询操作）和execute（写入操作）
    Db::query('select * from think_user where id=?',[8]);
    Db::execute('insert into think_user (id, name) values (?, ?)',[8,'thinkphp']);
    2、使用多个数据库连接
    Db::connect($config)->query('select * from think_user where id=:id',['id'=>8]);
（三、2）查询
    11、可以使用where方法进行AND条件查询：
    Db::table('__USER__')->where('status>1')->select();
    $info = Db::table('__TRAIN_PLAN__')->where('plan_id',17743)->field('train_id,plan_year')->find();


    Db::table('think_user')
        ->where('name','like','%thinkphp')
        ->where('status',1)
        ->find();
    12、多字段相同条件的AND查询可以简化为如下方式：
    Db::table('think_user')
        ->where('name&title','like','%thinkphp')
        ->find();
    13、whereOr查询
    Db::table('think_user')
        ->where('name','like','%thinkphp')
        ->whereOr('title','like','%thinkphp')
        ->find();
    多字段相同可以简化
    Db::table('think_user')
        ->where('name|title','like','%thinkphp')
        ->find();
    14、where方法和whereOr方法在复杂的查询条件中经常需要配合一起混合使用，
    $result = Db::table('think_user')->where(function ($query) {
        $query->where('id', 1)->whereor('id', 2);
    })->whereOr(function ($query) {
        $query->where('name', 'like', 'think')->whereOr('name', 'like', 'thinkphp');
    })->select();
    15、where  与  whereOr的查询使用表达式
    where('字段名','表达式','查询条件');
    whereOr('字段名','表达式','查询条件');
        (1)where('id','eq',100);
        (2)where('id','neq',100);
        (3)where('id','gt',100);
        (4)where('id','egt',100);
        (5)where('id','lt',100);
        (6)where('id','elt',100);
        (7)where('name','like','thinkphp%');
        (8)where('name','like',['%think','php%'],'OR');
        (9)where('id','between',[1,8]);
        (10)where('id','not in',[1,5,8]);
        (11)where('name', null);
        (12)where('name','not null');
        (13)where('title','=', 'null');  查询某个字段是否是字符串null
        (14)where('name','=', 'not null');   查询是否不是字符串null
        (15)where('id','exp',' IN (1,3,8) ');     同   where('id','not in',[1,5,8]);
    16、链式操作
        （1）where
            (11)where表达式查询
                Db::table('think_user')
                    ->where('id','>',1)
                    ->where('name','thinkphp')
                    ->select();
            (12)where数组查询
                $map['name'] = 'thinkphp';
                $map['status'] = 1;
                // 把查询条件传入查询方法
                Db::table('think_user')->where($map)->select();
            (13)where数组表达式查询
                $map['id']  = ['>',1];
                $map['mail']  = ['like','%thinkphp@qq.com%'];
                Db::table('think_user')->where($map)->select();
            (14)where字符串查询
                Db::table('think_user')->where('type=1 AND status=1')->select();
                配合预处理机制
                Db::table('think_user')->where('id=:id and username=:name')->bind(['id'=>[1,\PDO::PARAM_INT],'name'=>'thinkphp'])->select();
        (2)table 表查询或者多表查询
            (11)
                Db::table('__USER__')->where('status>1')->select();
            (12)
                Db::field('user.name,role.title')
                ->table(['think_user'=>'user','think_role'=>'role'])
                ->where('user.user_id = role.user_id')
                ->limit(10)->select();
        (3)alias
            Db::table('think_user')->alias('a')->join('__DEPT__ b ','b.user_id= a.id')->select();
            SELECT * FROM think_user a INNER JOIN think_dept b ON b.user_id= a.id
            Db::table('think_user')->alias(['think_user'=>'user','think_dept'=>'dept'])->join('think_dept','dept.user_id= user.id')->select();
            SELECT * FROM think_user user INNER JOIN think_dept dept ON dept.user_id= user.id
        (4)field
            (11)给某个字段设置别名
                Db::table('think_user')->field('id,nickname as name')->select();
            (12)对字段使用sql函数
                Db::table('think_user')->field('id,SUM(score)')->select();
            (13)数组方式，并给某个字段设置别名
                Db::table('think_user')->field(['id','nickname'=>'name'])->select();
            (14)数组方式对更复杂的字段，使用更方便
                Db::table('think_user')->field(['id','concat(name,'-',id)'=>'truename','LEFT(title,7)'=>'sub_title'])->select();
            (15)字段排除，不支持跨表和join操作
                Db::table('think_user')->field('user_id,content',true)->select();
                //或者用
                Db::table('think_user')->field(['user_id','content'],true)->select();
            (16)字段排查
                Db::table('think_user')->field('title,email,content')->insert($data);
        (5)order
            (11)字符串
            Db::table('think_user')->where('status=1')->order('id desc,status')->limit(5)->select();
            (12)数组形式
            Db::table('think_user')->where('status=1')->order(['order','id'=>'desc'])->limit(5)->select();
        (6)limit
            Db::table('think_article')->limit(10,25)->select();
        (7)group
            (11)group方法只有一个参数，并且只能使用字符串。
                Db::table('think_user')
                    ->field('user_id,username,max(score)')
                    ->group('user_id')
                    ->select();
        (8)having
            having方法只有一个参数，并且只能使用字符串
            Db::table('think_user')
                ->field('username,max(score)')
                ->group('user_id')
                ->having('count(test_time)>3')
                ->select();
        (9)join
            Db::table('think_artist')
                ->alias('a')
                ->join('__WORK__ w','a.id = w.artist_id')
                ->join('__CARD__ c','a.card_id = c.id')
                ->select();
        (10)union all
            闭包使用union all操作
            Db::field('name')
              ->table('think_user_0')
              ->union('SELECT name FROM think_user_1',true)
              ->union('SELECT name FROM think_user_2',true)
              ->select();
        (11)distinct 返回字段的不同数据，参数是布尔值
            Db::table('think_user')->distinct(true)->field('user_login')->select();
        (12)comment 给生成的sql添加注释内容
            Db::table('think_score')->comment('查询考试前十名分数')
                ->field('username,score')
                ->limit(10)
                ->order('score desc')
                ->select();
        (13)fetchSql
            $result = Db::table('think_user')->fetchSql(true)->find(1);
            输出result结果为： SELECT * FROM think_user where id = 1
        (14)force 强制使用索引
            Db::table('think_user')->force('user')->select(); 使用user名称的索引
        (15)failException 查询抛出错误
            // 数据不存在的话直接抛出异常
            Db::name('blog')
                ->where(['status' => 1])
                ->failException()
                ->select();
    17、where 查询时候的时间表达式
        // 获取今天的博客
        Db::table('think_blog') ->whereTime('create_time', 'today')->select();
        // 获取昨天的博客
        Db::table('think_blog')->whereTime('create_time', 'yesterday')->select();
        // 获取本周的博客
        Db::table('think_blog')->whereTime('create_time', 'week')->select();
        // 获取上周的博客
        Db::table('think_blog')->whereTime('create_time', 'last week')->select();
        // 获取本月的博客
        Db::table('think_blog')->whereTime('create_time', 'month')->select();
        // 获取上月的博客
        Db::table('think_blog')->whereTime('create_time', 'last month')->select();
        // 获取今年的博客
        Db::table('think_blog')->whereTime('create_time', 'year')->select();
        // 获取去年的博客
        Db::table('think_blog')->whereTime('create_time', 'last year')->select();
        // 查询两个小时内的博客
        Db::table('think_blog')->whereTime('create_time','-2 hours')->select();
    18、高级查询
        （1）多个字段有同一个查询条件
            Db::table('think_user')
                ->where('name|title','like','thinkphp%')
                ->where('create_time&update_time','>',0)
                ->find();
        （2）单个字段有多个查询条件，必须使用数组定义查询表达式
            Db::table('think_user')
                ->where('name',['like','thinkphp%'],['like','%thinkphp'])
                ->where('id',['>',0],['<>',10],'or')
                ->find();
        （3）视图查询 表前缀配置中有了，表名不用写表前缀
            Db::view('User','id,name')
                ->view('Profile','truename,phone,email','Profile.user_id=User.id')
                ->view('Score','score','Score.user_id=Profile.id')
                ->where('score','>',80)
                ->select();
        （4）闭包构建子查询
            Db::table('think_user')
                ->where('id','IN',function($query){
                    $query->table('think_profile')->where('status',1)->field('id');
                })
                ->select();



    1、查询单条数据、查询多条数据，数据库实例都是单例的
    // table方法必须指定完整的数据表名
    Db::table('think_user')->where('id',1)->find();   find 方法查询结果不存在，返回 null
    Db::table('think_user')->where('status',1)->select();

    如果设置了数据表前缀参数的话，可以使用
    Db::name('user')->where('id',1)->find();
    Db::name('user')->where('status',1)->select();

    只连接一次数据库
    db('user',[],false)->where('id',1)->find();
    db('user',[],false)->where('status',1)->select();

    2、查询某一条某个字段
    // 返回某个字段的值
    Db::table('think_user')->where('id',1)->value('name');
（三、3）插入数据
    1、插入数据，插入一条数据
    $data = ['foo' => 'bar', 'bar' => 'foo'];
    数据库前缀(prefix)已经有了
    Db::name('user')->insert($data);
    $userId = Db::name('user')->getLastInsID();
    2、插入一条数据，插入直接使用insertGetId方法新增数据并返回主键值：
    Db::name('user')->insertGetId($data);
    3、插入多条数据，返回添加的条数
    $data = [
        ['foo' => 'bar', 'bar' => 'foo'],
        ['foo' => 'bar1', 'bar' => 'foo1'],
        ['foo' => 'bar2', 'bar' => 'foo2']
    ];
    Db::name('user')->insertAll($data);
（三、4）更新数据
    1、更新某一条数据
    Db::table('think_user')->where('id', 1)->update(['name' => 'thinkphp']);
    2、更新某一条某个字段
    Db::table('think_user')->where('id',1)->setField('name', 'thinkphp');
（三、5）删除数据
    1、根据主键删除
    Db::table('think_user')->delete(1);
    Db::table('think_user')->delete([1,2,3]);

    2、给定条件删除
    Db::table('think_user')->where('id',1)->delete();
    Db::table('think_user')->where('id','<',10)->delete();







（四.1）模型新增
    (1)创建模型
    (2)模型名称对应数据表名
    (3)如果模型中使用其他数据库的表，则在模型中创建两个属性
            // 设置当前模型对应的完整数据表名称
                protected $table = 'think_user';

                // 设置当前模型的数据库连接
                protected $connection = [
                    // 数据库类型
                    'type'        => 'mysql',
                    // 服务器地址
                    'hostname'    => '127.0.0.1',
                    // 数据库名
                    'database'    => 'thinkphp',
                    // 数据库用户名
                    'username'    => 'root',
                    // 数据库密码
                    'password'    => '',
                    // 数据库编码默认采用utf8
                    'charset'     => 'utf8',
                    // 数据库表前缀
                    'prefix'      => 'think_',
                    // 数据库调试模式
                    'debug'       => false,
                ];
    (4)模型新增
        $user = new User($_POST);
        // post数组中只有name和email字段会写入
        $user->allowField(['name','email'])->save();
    （4.1）模型新增之助手函数，新增和批量
        // 使用model助手函数实例化User模型
        $user = model('User');
        // 模型对象赋值
        $user->data([
            'name'  =>  'thinkphp',
            'email' =>  'thinkphp@qq.com'
        ]);
        $user->save();


        $user = model('User');
        // 批量新增
        $list = [
            ['name'=>'thinkphp','email'=>'thinkphp@qq.com'],
            ['name'=>'onethink','email'=>'onethink@qq.com']
        ];
        $user->saveAll($list);
    （5）获取自增主键ID
        // 获取自增ID
        echo $user->user_id;
    （6）批量新增，list中不带主键就是新增，带主键就是更新，但是 如果带主键，false了，就是新增
        $user = new User;
        $list = [
            ['name'=>'thinkphp','email'=>'thinkphp@qq.com'],
            ['name'=>'onethink','email'=>'onethink@qq.com']
        ];
        $user->saveAll($list);
    （7）create新增，和save不同的是，create之后返回的是user对象实例
        $user = User::create([
            'name'  =>  'thinkphp',
            'email' =>  'thinkphp@qq.com'
        ]);
        echo $user->name;
        echo $user->email;
        echo $user->id; // 获取自增ID

（四.2）模型更新
    1、数字是主键id
    $user = User::get(1);
    $user->name     = 'thinkphp';
    $user->email    = 'thinkphp@qq.com';
    $user->save();
    2、只是更新某些字段
    $user = new User();
    // post数组中只有name和email字段会写入
    $user->allowField(['name','email'])->save($_POST, ['id' => 1]);
    3、批量更新
    $user = new User;
    $list = [
        ['id'=>1, 'name'=>'thinkphp', 'email'=>'thinkphp@qq.com'],
        ['id'=>2, 'name'=>'onethink', 'email'=>'onethink@qq.com']
    ];
    $user->saveAll($list);
    4、闭包更新可以使用更复杂的更新条件
    $user = new User;
    $user->save(['name' => 'thinkphp'],function($query){
        // 更新status值为1 并且id大于10的数据
        $query->where('status', 1)->where('id', '>', 10);
    });
（四.3）模型删除
    1、删除指定主键的数据
    $user = User::get(1);
    $user->delete();
    2、闭包删除
    User::destroy(function($query){
        $query->where('id','>',10);
    });
（四.4）模型查询
    1、查单个数据，
    $user = User::get(1);
    echo $user->name;

    11、获取一条的多个属性值，获取包含获取器处理的全部数据属性
    $user = User::get(1);
    // 获取全部获取器数据
    dump($user->toArray());

    111、查询某些字段
    User::where('status',1)->column('id,name'); // 同tp3的getField

    2、查多个数据
    $list = User::all([1,2,3]);
    foreach($list as $key=>$user){
        echo $user->name;
    }

    3、使用闭包查询
    $list = User::all(function($query){
        $query->where('status', 1)->limit(3)->order('id', 'asc');
    });
    foreach($list as $key=>$user){
        echo $user->name;
    }
    4、查询缓存，返回的是对象
    $user = User::get(1,'',true);
    $list  = User::all('1,2,3','',true);
（四、5）模型聚合查询  count sum avg min max
    1、动态调用
    $user = new User;
    $user->count();
    $user->where('status','>',0)->count();
    $user->where('status',1)->avg('score');
    $user->max('score');
（五、6）模型时间戳自动写入
    （1）配置
    数据库配置中设置：'auto_timestamp' => true,    关闭全局写入更新时间戳改false就可以了
    模型类里面添加一个受保护的属性设置：protected $autoWriteTimestamp = true;   关闭当前模型写入更新时间戳也是改false就可以了
    （2）默认创建时间字段，更新时间字段
    字段名默认创建时间字段为create_time，更新时间字段为update_time
    写入数据的时候，系统会自动写入create_time和update_time字段，
    $user = new User();
    $user->name = 'THINKPHP';
    $user->save();
    echo $user->create_time; // 输出类似 2016-10-12 14:20:10
    echo $user->update_time; // 输出类似 2016-10-12 14:20:10
    （3）调整创建时间字段，更新时间字段
    如果你的数据表字段不是默认值的话，可以按照下面的方式定义：
    class User extends Model
    {
        // 定义时间戳字段名
        protected $createTime = 'create_at';
        protected $updateTime = 'update_at';
    }
    （4）如果只要写入时间字段，不要更新时间字段，可以照下面这样设置
    如果你只需要使用create_time字段而不需要自动写入update_time，则可以单独设置关闭某个字段，例如：
    class User extends Model
    {
        // 关闭自动写入update_time字段
        protected $updateTime = false;
    }
    （5）关闭时间戳自动写入功能
    如果不需要任何自动写入的时间戳字段的话，可以关闭时间戳自动写入功能，设置如下：
    class User extends Model
    {
        // 关闭自动写入时间戳
        protected $autoWriteTimestamp = false;
    }
（五、7）只读字段，一旦写入，就无法更新
    1、只需要在模型中定义readonly属性：
    namespace app\index\model;

    use think\Model;

    class User extends Model
    {
        protected $readonly = ['name','email'];
    }

（五、8）软删除
    1、删除操作
    // 软删除
    User::destroy(1);
    // 真实删除
    User::destroy(1,true);
    $user = User::get(1);
    // 软删除
    $user->delete();
    // 真实删除
    $user->delete(true);
    2、软删除数据的查询
    （1）默认情况下是不包含软删除
    （2）使用下面可以查询软删除
    User::withTrashed()->find();
    User::withTrashed()->select();
    （3）使用下面只查询软删除
    User::onlyTrashed()->find();
    User::onlyTrashed()->select();
（五、9）类型转换，写入或者读取时候，自动对字段进行处理，支持给字段设置类型自动转换，会在写入和读取的时候自动进行类型转换处理，例如：
    1、写法
    class User extends Model
    {
        protected $type = [
            'status'    =>  'integer',
            'score'     =>  'float',
            'birthday'  =>  'datetime',
            'info'      =>  'array',
        ];
    }
    2、数据库查询默认取出来的数据都是字符串类型，如果需要转换为其他的类型，需要设置，支持的类型包括如下类型：
（五、10）自动完成
    1、模型类中设置属性

    namespace app\index\model;

    use think\Model;

    class User extends Model
    {
        protected $auto = [];
        protected $insert = ['ip','status' => 1];
        protected $update = ['login_ip'];

        protected function setIpAttr()
        {
            return request()->ip();
        }
    }

（五、11）查询范围，即封装数据库查询
    class User extends Model
    {

        protected function scopeAgeAbove($query, $lowest_age)
        {
            return $query->where('user_id','=',$lowest_age)->limit(1);
        }

        public function getInfo($age)
        {
            // return $age;
            return User::scope('ageAbove',$age)->find();
        }

    }

（五、12）模型分层，同一个模块下业务分层

    Logic类：app\index\logic\User.php
    namespace app\index\logic;

    use think\Model;

    class User extends Model
    {
    }
    实例化方法：\think\Loader::model('User','logic');
（五、13）数组访问和转换
    toArray();
(五、14)关联
    一对一关联  hasOne
    一对多关联
    多对多关联
（五、15）事件

（六、1）视图

        (111)模板目录
        模块下面有个view文件夹，下面再建控制器名字的文件夹，然后下面建view出来的名字的html文件

        （1）视图实例化
            return view('hello',['name'=>'thinkphp']);

        （2）模板中赋值
            (11)单值赋值
            {$name}
            (12)数组赋值
            {$name.title}

        （3）判断输出
            {eq name='name' value='value'}
            相等
            {else/}
            不相等
            {/eq}

（六、2）模板变量

        （1）普通模板变量
            需要控制器中赋值，然后在模板中输出
        （2）系统常量模板变量
            不需要控制器中赋值，直接在模板中输出

（六、3）模板中变量值的处理
        1、
        {$data.name|md5}
        {$num|date="y-m-d",###}
        {$data.name|substr=0,3}
        如果变量用后面的函数时候，是作为后面函数的第一个参数，可以这样使用

        2、模板变量要经过多个函数处理
        {$name|md5|strtoupper|substr=0,3}
        上面的相当于    <?php echo (substr(strtoupper(md5($name)),0,3)); ?>
        函数会按照从左到右的顺序依次调用

        3、模板变量默认值
        {$num|default="传值内容为空"}
        当$num有值但是为空的时候，会用default中的值

        4、模板变量运算
        {$a+$b}
        {$a-$b}
        {$a+$b*10+$c}

        5、模板三元运算
        {$status? '正常' : '错误'}
        {$info['status']? $info['msg'] : $info['error']}
        {$info.status? $info.msg : $info.error }

        6、模板布局
        7、模板继承
        8、模板之包含文件

        9、为空时候模板中循环输出
        {volist name="list" id="vo" empty="暂时没有数据" }
        {$vo.id}|{$vo.name}
        {/volist}

        empty不支持放入html标签，但可以控制器里assign赋值给empty变量

        10、volist  循环输出
        11、for     循环输出

        12、比较   eq   neq   gt   egt   lt   elt
        13、判读   switch   if   in   notin   between   notbetween   empty

        14、资源文件加载
        <script type='text/javascript' src='/static/js/common.js'>
        <link rel="stylesheet" type="text/css" href="/static/css/style.css" />

        上面的简化内容为下面的：
        {load href="/static/js/common.js" /}
        {load href="/static/css/style.css" /}

        15、使用原生PHP语句标签{php}{/php}






















";