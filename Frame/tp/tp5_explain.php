<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/11
 * Time: 11:48
 */
echo "

��һ��·�ɶ���
    1�����ģʽ
    'url_route_on'  =>  true,
    'url_route_must'=>  false,
    2��ǿ��ģʽ
    'url_route_on'  		=>  true,
    'url_route_must'		=>  true,
��������Ϣ��
    (1)��ȡrequest·����Ϣ
    ����ʹ��\think\Request�࣬
    $request = Request::instance();
    echo "��ǰģ��������" . $request->module();
    echo "��ǰ������������" . $request->controller();
    echo "��ǰ����������" . $request->action();"
    ��2�������Ƿ�����
    input('?get.id');
    input('?post.name');
    ��3����ȡĳ������
    Request::instance()->get('id'); // ��ȡĳ��get����
    Request::instance()->get(); // ��ȡ���е�get�������������˵����飩
    input('get.id');
    input('get.');
    input('post.name');
    input('post.');
    input('session.user_id');
    input('session.');
    input('cookie.user_id');
    input('cookie.');
    ��4���ж��Ƿ���get����
    if (request()->isGet())��
    ��5���ж��Ƿ���post����
    if (request()->isPost());
    (6)�ж��Ƿ���Ajax����
    if (request()->isAjax())


������������
��1��
�̳�think����Ŀ�����
use think\Controller;

class Index extends Controller

��2��
�����������ʼʱ�����
_initialize

��3��
������beforeActionList���Կ���ָ��ĳ������Ϊ����������ǰ�ò���
�������Ϊ��Ҫ���õ�ǰ�÷�������������Ҫ���õ�ǰ�÷�����Ϊ�ܱ����ģ���ֵ�Ļ�Ϊ��ǰ�����������з�����ǰ�÷�����

(����1)���ݿ����ʹ��
    ÿ��ģ����������ݿ�
    1��ֱ��ʹ�����ݿ�����ԭ��sql query����ѯ��������execute��д�������
    Db::query('select * from think_user where id=?',[8]);
    Db::execute('insert into think_user (id, name) values (?, ?)',[8,'thinkphp']);
    2��ʹ�ö�����ݿ�����
    Db::connect($config)->query('select * from think_user where id=:id',['id'=>8]);
������2����ѯ
    11������ʹ��where��������AND������ѯ��
    Db::table('__USER__')->where('status>1')->select();
    $info = Db::table('__TRAIN_PLAN__')->where('plan_id',17743)->field('train_id,plan_year')->find();


    Db::table('think_user')
        ->where('name','like','%thinkphp')
        ->where('status',1)
        ->find();
    12�����ֶ���ͬ������AND��ѯ���Լ�Ϊ���·�ʽ��
    Db::table('think_user')
        ->where('name&title','like','%thinkphp')
        ->find();
    13��whereOr��ѯ
    Db::table('think_user')
        ->where('name','like','%thinkphp')
        ->whereOr('title','like','%thinkphp')
        ->find();
    ���ֶ���ͬ���Լ�
    Db::table('think_user')
        ->where('name|title','like','%thinkphp')
        ->find();
    14��where������whereOr�����ڸ��ӵĲ�ѯ�����о�����Ҫ���һ����ʹ�ã�
    $result = Db::table('think_user')->where(function ($query) {
        $query->where('id', 1)->whereor('id', 2);
    })->whereOr(function ($query) {
        $query->where('name', 'like', 'think')->whereOr('name', 'like', 'thinkphp');
    })->select();
    15��where  ��  whereOr�Ĳ�ѯʹ�ñ��ʽ
    where('�ֶ���','���ʽ','��ѯ����');
    whereOr('�ֶ���','���ʽ','��ѯ����');
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
        (13)where('title','=', 'null');  ��ѯĳ���ֶ��Ƿ����ַ���null
        (14)where('name','=', 'not null');   ��ѯ�Ƿ����ַ���null
        (15)where('id','exp',' IN (1,3,8) ');     ͬ   where('id','not in',[1,5,8]);
    16����ʽ����
        ��1��where
            (11)where���ʽ��ѯ
                Db::table('think_user')
                    ->where('id','>',1)
                    ->where('name','thinkphp')
                    ->select();
            (12)where�����ѯ
                $map['name'] = 'thinkphp';
                $map['status'] = 1;
                // �Ѳ�ѯ���������ѯ����
                Db::table('think_user')->where($map)->select();
            (13)where������ʽ��ѯ
                $map['id']  = ['>',1];
                $map['mail']  = ['like','%thinkphp@qq.com%'];
                Db::table('think_user')->where($map)->select();
            (14)where�ַ�����ѯ
                Db::table('think_user')->where('type=1 AND status=1')->select();
                ���Ԥ�������
                Db::table('think_user')->where('id=:id and username=:name')->bind(['id'=>[1,\PDO::PARAM_INT],'name'=>'thinkphp'])->select();
        (2)table ���ѯ���߶���ѯ
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
            (11)��ĳ���ֶ����ñ���
                Db::table('think_user')->field('id,nickname as name')->select();
            (12)���ֶ�ʹ��sql����
                Db::table('think_user')->field('id,SUM(score)')->select();
            (13)���鷽ʽ������ĳ���ֶ����ñ���
                Db::table('think_user')->field(['id','nickname'=>'name'])->select();
            (14)���鷽ʽ�Ը����ӵ��ֶΣ�ʹ�ø�����
                Db::table('think_user')->field(['id','concat(name,'-',id)'=>'truename','LEFT(title,7)'=>'sub_title'])->select();
            (15)�ֶ��ų�����֧�ֿ���join����
                Db::table('think_user')->field('user_id,content',true)->select();
                //������
                Db::table('think_user')->field(['user_id','content'],true)->select();
            (16)�ֶ��Ų�
                Db::table('think_user')->field('title,email,content')->insert($data);
        (5)order
            (11)�ַ���
            Db::table('think_user')->where('status=1')->order('id desc,status')->limit(5)->select();
            (12)������ʽ
            Db::table('think_user')->where('status=1')->order(['order','id'=>'desc'])->limit(5)->select();
        (6)limit
            Db::table('think_article')->limit(10,25)->select();
        (7)group
            (11)group����ֻ��һ������������ֻ��ʹ���ַ�����
                Db::table('think_user')
                    ->field('user_id,username,max(score)')
                    ->group('user_id')
                    ->select();
        (8)having
            having����ֻ��һ������������ֻ��ʹ���ַ���
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
            �հ�ʹ��union all����
            Db::field('name')
              ->table('think_user_0')
              ->union('SELECT name FROM think_user_1',true)
              ->union('SELECT name FROM think_user_2',true)
              ->select();
        (11)distinct �����ֶεĲ�ͬ���ݣ������ǲ���ֵ
            Db::table('think_user')->distinct(true)->field('user_login')->select();
        (12)comment �����ɵ�sql���ע������
            Db::table('think_score')->comment('��ѯ����ǰʮ������')
                ->field('username,score')
                ->limit(10)
                ->order('score desc')
                ->select();
        (13)fetchSql
            $result = Db::table('think_user')->fetchSql(true)->find(1);
            ���result���Ϊ�� SELECT * FROM think_user where id = 1
        (14)force ǿ��ʹ������
            Db::table('think_user')->force('user')->select(); ʹ��user���Ƶ�����
        (15)failException ��ѯ�׳�����
            // ���ݲ����ڵĻ�ֱ���׳��쳣
            Db::name('blog')
                ->where(['status' => 1])
                ->failException()
                ->select();
    17��where ��ѯʱ���ʱ����ʽ
        // ��ȡ����Ĳ���
        Db::table('think_blog') ->whereTime('create_time', 'today')->select();
        // ��ȡ����Ĳ���
        Db::table('think_blog')->whereTime('create_time', 'yesterday')->select();
        // ��ȡ���ܵĲ���
        Db::table('think_blog')->whereTime('create_time', 'week')->select();
        // ��ȡ���ܵĲ���
        Db::table('think_blog')->whereTime('create_time', 'last week')->select();
        // ��ȡ���µĲ���
        Db::table('think_blog')->whereTime('create_time', 'month')->select();
        // ��ȡ���µĲ���
        Db::table('think_blog')->whereTime('create_time', 'last month')->select();
        // ��ȡ����Ĳ���
        Db::table('think_blog')->whereTime('create_time', 'year')->select();
        // ��ȡȥ��Ĳ���
        Db::table('think_blog')->whereTime('create_time', 'last year')->select();
        // ��ѯ����Сʱ�ڵĲ���
        Db::table('think_blog')->whereTime('create_time','-2 hours')->select();
    18���߼���ѯ
        ��1������ֶ���ͬһ����ѯ����
            Db::table('think_user')
                ->where('name|title','like','thinkphp%')
                ->where('create_time&update_time','>',0)
                ->find();
        ��2�������ֶ��ж����ѯ����������ʹ�����鶨���ѯ���ʽ
            Db::table('think_user')
                ->where('name',['like','thinkphp%'],['like','%thinkphp'])
                ->where('id',['>',0],['<>',10],'or')
                ->find();
        ��3����ͼ��ѯ ��ǰ׺���������ˣ���������д��ǰ׺
            Db::view('User','id,name')
                ->view('Profile','truename,phone,email','Profile.user_id=User.id')
                ->view('Score','score','Score.user_id=Profile.id')
                ->where('score','>',80)
                ->select();
        ��4���հ������Ӳ�ѯ
            Db::table('think_user')
                ->where('id','IN',function($query){
                    $query->table('think_profile')->where('status',1)->field('id');
                })
                ->select();



    1����ѯ�������ݡ���ѯ�������ݣ����ݿ�ʵ�����ǵ�����
    // table��������ָ�����������ݱ���
    Db::table('think_user')->where('id',1)->find();   find ������ѯ��������ڣ����� null
    Db::table('think_user')->where('status',1)->select();

    ������������ݱ�ǰ׺�����Ļ�������ʹ��
    Db::name('user')->where('id',1)->find();
    Db::name('user')->where('status',1)->select();

    ֻ����һ�����ݿ�
    db('user',[],false)->where('id',1)->find();
    db('user',[],false)->where('status',1)->select();

    2����ѯĳһ��ĳ���ֶ�
    // ����ĳ���ֶε�ֵ
    Db::table('think_user')->where('id',1)->value('name');
������3����������
    1���������ݣ�����һ������
    $data = ['foo' => 'bar', 'bar' => 'foo'];
    ���ݿ�ǰ׺(prefix)�Ѿ�����
    Db::name('user')->insert($data);
    $userId = Db::name('user')->getLastInsID();
    2������һ�����ݣ�����ֱ��ʹ��insertGetId�����������ݲ���������ֵ��
    Db::name('user')->insertGetId($data);
    3������������ݣ�������ӵ�����
    $data = [
        ['foo' => 'bar', 'bar' => 'foo'],
        ['foo' => 'bar1', 'bar' => 'foo1'],
        ['foo' => 'bar2', 'bar' => 'foo2']
    ];
    Db::name('user')->insertAll($data);
������4����������
    1������ĳһ������
    Db::table('think_user')->where('id', 1)->update(['name' => 'thinkphp']);
    2������ĳһ��ĳ���ֶ�
    Db::table('think_user')->where('id',1)->setField('name', 'thinkphp');
������5��ɾ������
    1����������ɾ��
    Db::table('think_user')->delete(1);
    Db::table('think_user')->delete([1,2,3]);

    2����������ɾ��
    Db::table('think_user')->where('id',1)->delete();
    Db::table('think_user')->where('id','<',10)->delete();







����.1��ģ������
    (1)����ģ��
    (2)ģ�����ƶ�Ӧ���ݱ���
    (3)���ģ����ʹ���������ݿ�ı�����ģ���д�����������
            // ���õ�ǰģ�Ͷ�Ӧ���������ݱ�����
                protected $table = 'think_user';

                // ���õ�ǰģ�͵����ݿ�����
                protected $connection = [
                    // ���ݿ�����
                    'type'        => 'mysql',
                    // ��������ַ
                    'hostname'    => '127.0.0.1',
                    // ���ݿ���
                    'database'    => 'thinkphp',
                    // ���ݿ��û���
                    'username'    => 'root',
                    // ���ݿ�����
                    'password'    => '',
                    // ���ݿ����Ĭ�ϲ���utf8
                    'charset'     => 'utf8',
                    // ���ݿ��ǰ׺
                    'prefix'      => 'think_',
                    // ���ݿ����ģʽ
                    'debug'       => false,
                ];
    (4)ģ������
        $user = new User($_POST);
        // post������ֻ��name��email�ֶλ�д��
        $user->allowField(['name','email'])->save();
    ��4.1��ģ������֮���ֺ���������������
        // ʹ��model���ֺ���ʵ����Userģ��
        $user = model('User');
        // ģ�Ͷ���ֵ
        $user->data([
            'name'  =>  'thinkphp',
            'email' =>  'thinkphp@qq.com'
        ]);
        $user->save();


        $user = model('User');
        // ��������
        $list = [
            ['name'=>'thinkphp','email'=>'thinkphp@qq.com'],
            ['name'=>'onethink','email'=>'onethink@qq.com']
        ];
        $user->saveAll($list);
    ��5����ȡ��������ID
        // ��ȡ����ID
        echo $user->user_id;
    ��6������������list�в��������������������������Ǹ��£����� �����������false�ˣ���������
        $user = new User;
        $list = [
            ['name'=>'thinkphp','email'=>'thinkphp@qq.com'],
            ['name'=>'onethink','email'=>'onethink@qq.com']
        ];
        $user->saveAll($list);
    ��7��create��������save��ͬ���ǣ�create֮�󷵻ص���user����ʵ��
        $user = User::create([
            'name'  =>  'thinkphp',
            'email' =>  'thinkphp@qq.com'
        ]);
        echo $user->name;
        echo $user->email;
        echo $user->id; // ��ȡ����ID

����.2��ģ�͸���
    1������������id
    $user = User::get(1);
    $user->name     = 'thinkphp';
    $user->email    = 'thinkphp@qq.com';
    $user->save();
    2��ֻ�Ǹ���ĳЩ�ֶ�
    $user = new User();
    // post������ֻ��name��email�ֶλ�д��
    $user->allowField(['name','email'])->save($_POST, ['id' => 1]);
    3����������
    $user = new User;
    $list = [
        ['id'=>1, 'name'=>'thinkphp', 'email'=>'thinkphp@qq.com'],
        ['id'=>2, 'name'=>'onethink', 'email'=>'onethink@qq.com']
    ];
    $user->saveAll($list);
    4���հ����¿���ʹ�ø����ӵĸ�������
    $user = new User;
    $user->save(['name' => 'thinkphp'],function($query){
        // ����statusֵΪ1 ����id����10������
        $query->where('status', 1)->where('id', '>', 10);
    });
����.3��ģ��ɾ��
    1��ɾ��ָ������������
    $user = User::get(1);
    $user->delete();
    2���հ�ɾ��
    User::destroy(function($query){
        $query->where('id','>',10);
    });
����.4��ģ�Ͳ�ѯ
    1���鵥�����ݣ�
    $user = User::get(1);
    echo $user->name;

    11����ȡһ���Ķ������ֵ����ȡ������ȡ�������ȫ����������
    $user = User::get(1);
    // ��ȡȫ����ȡ������
    dump($user->toArray());

    111����ѯĳЩ�ֶ�
    User::where('status',1)->column('id,name'); // ͬtp3��getField

    2����������
    $list = User::all([1,2,3]);
    foreach($list as $key=>$user){
        echo $user->name;
    }

    3��ʹ�ñհ���ѯ
    $list = User::all(function($query){
        $query->where('status', 1)->limit(3)->order('id', 'asc');
    });
    foreach($list as $key=>$user){
        echo $user->name;
    }
    4����ѯ���棬���ص��Ƕ���
    $user = User::get(1,'',true);
    $list  = User::all('1,2,3','',true);
���ġ�5��ģ�;ۺϲ�ѯ  count sum avg min max
    1����̬����
    $user = new User;
    $user->count();
    $user->where('status','>',0)->count();
    $user->where('status',1)->avg('score');
    $user->max('score');
���塢6��ģ��ʱ����Զ�д��
    ��1������
    ���ݿ����������ã�'auto_timestamp' => true,    �ر�ȫ��д�����ʱ�����false�Ϳ�����
    ģ�����������һ���ܱ������������ã�protected $autoWriteTimestamp = true;   �رյ�ǰģ��д�����ʱ���Ҳ�Ǹ�false�Ϳ�����
    ��2��Ĭ�ϴ���ʱ���ֶΣ�����ʱ���ֶ�
    �ֶ���Ĭ�ϴ���ʱ���ֶ�Ϊcreate_time������ʱ���ֶ�Ϊupdate_time
    д�����ݵ�ʱ��ϵͳ���Զ�д��create_time��update_time�ֶΣ�
    $user = new User();
    $user->name = 'THINKPHP';
    $user->save();
    echo $user->create_time; // ������� 2016-10-12 14:20:10
    echo $user->update_time; // ������� 2016-10-12 14:20:10
    ��3����������ʱ���ֶΣ�����ʱ���ֶ�
    ���������ݱ��ֶβ���Ĭ��ֵ�Ļ������԰�������ķ�ʽ���壺
    class User extends Model
    {
        // ����ʱ����ֶ���
        protected $createTime = 'create_at';
        protected $updateTime = 'update_at';
    }
    ��4�����ֻҪд��ʱ���ֶΣ���Ҫ����ʱ���ֶΣ�������������������
    �����ֻ��Ҫʹ��create_time�ֶζ�����Ҫ�Զ�д��update_time������Ե������ùر�ĳ���ֶΣ����磺
    class User extends Model
    {
        // �ر��Զ�д��update_time�ֶ�
        protected $updateTime = false;
    }
    ��5���ر�ʱ����Զ�д�빦��
    �������Ҫ�κ��Զ�д���ʱ����ֶεĻ������Թر�ʱ����Զ�д�빦�ܣ��������£�
    class User extends Model
    {
        // �ر��Զ�д��ʱ���
        protected $autoWriteTimestamp = false;
    }
���塢7��ֻ���ֶΣ�һ��д�룬���޷�����
    1��ֻ��Ҫ��ģ���ж���readonly���ԣ�
    namespace app\index\model;

    use think\Model;

    class User extends Model
    {
        protected $readonly = ['name','email'];
    }

���塢8����ɾ��
    1��ɾ������
    // ��ɾ��
    User::destroy(1);
    // ��ʵɾ��
    User::destroy(1,true);
    $user = User::get(1);
    // ��ɾ��
    $user->delete();
    // ��ʵɾ��
    $user->delete(true);
    2����ɾ�����ݵĲ�ѯ
    ��1��Ĭ��������ǲ�������ɾ��
    ��2��ʹ��������Բ�ѯ��ɾ��
    User::withTrashed()->find();
    User::withTrashed()->select();
    ��3��ʹ������ֻ��ѯ��ɾ��
    User::onlyTrashed()->find();
    User::onlyTrashed()->select();
���塢9������ת����д����߶�ȡʱ���Զ����ֶν��д���֧�ָ��ֶ����������Զ�ת��������д��Ͷ�ȡ��ʱ���Զ���������ת���������磺
    1��д��
    class User extends Model
    {
        protected $type = [
            'status'    =>  'integer',
            'score'     =>  'float',
            'birthday'  =>  'datetime',
            'info'      =>  'array',
        ];
    }
    2�����ݿ��ѯĬ��ȡ���������ݶ����ַ������ͣ������Ҫת��Ϊ���������ͣ���Ҫ���ã�֧�ֵ����Ͱ����������ͣ�
���塢10���Զ����
    1��ģ��������������

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

���塢11����ѯ��Χ������װ���ݿ��ѯ
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

���塢12��ģ�ͷֲ㣬ͬһ��ģ����ҵ��ֲ�

    Logic�ࣺapp\index\logic\User.php
    namespace app\index\logic;

    use think\Model;

    class User extends Model
    {
    }
    ʵ����������\think\Loader::model('User','logic');
���塢13��������ʺ�ת��
    toArray();
(�塢14)����
    һ��һ����  hasOne
    һ�Զ����
    ��Զ����
���塢15���¼�

������1����ͼ

        (111)ģ��Ŀ¼
        ģ�������и�view�ļ��У������ٽ����������ֵ��ļ��У�Ȼ�����潨view���������ֵ�html�ļ�

        ��1����ͼʵ����
            return view('hello',['name'=>'thinkphp']);

        ��2��ģ���и�ֵ
            (11)��ֵ��ֵ
            {$name}
            (12)���鸳ֵ
            {$name.title}

        ��3���ж����
            {eq name='name' value='value'}
            ���
            {else/}
            �����
            {/eq}

������2��ģ�����

        ��1����ͨģ�����
            ��Ҫ�������и�ֵ��Ȼ����ģ�������
        ��2��ϵͳ����ģ�����
            ����Ҫ�������и�ֵ��ֱ����ģ�������

������3��ģ���б���ֵ�Ĵ���
        1��
        {$data.name|md5}
        {$num|date="y-m-d",###}
        {$data.name|substr=0,3}
        ��������ú���ĺ���ʱ������Ϊ���溯���ĵ�һ����������������ʹ��

        2��ģ�����Ҫ���������������
        {$name|md5|strtoupper|substr=0,3}
        ������൱��    <?php echo (substr(strtoupper(md5($name)),0,3)); ?>
        �����ᰴ�մ����ҵ�˳�����ε���

        3��ģ�����Ĭ��ֵ
        {$num|default="��ֵ����Ϊ��"}
        ��$num��ֵ����Ϊ�յ�ʱ�򣬻���default�е�ֵ

        4��ģ���������
        {$a+$b}
        {$a-$b}
        {$a+$b*10+$c}

        5��ģ����Ԫ����
        {$status? '����' : '����'}
        {$info['status']? $info['msg'] : $info['error']}
        {$info.status? $info.msg : $info.error }

        6��ģ�岼��
        7��ģ��̳�
        8��ģ��֮�����ļ�

        9��Ϊ��ʱ��ģ����ѭ�����
        {volist name="list" id="vo" empty="��ʱû������" }
        {$vo.id}|{$vo.name}
        {/volist}

        empty��֧�ַ���html��ǩ�������Կ�������assign��ֵ��empty����

        10��volist  ѭ�����
        11��for     ѭ�����

        12���Ƚ�   eq   neq   gt   egt   lt   elt
        13���ж�   switch   if   in   notin   between   notbetween   empty

        14����Դ�ļ�����
        <script type='text/javascript' src='/static/js/common.js'>
        <link rel="stylesheet" type="text/css" href="/static/css/style.css" />

        ����ļ�����Ϊ����ģ�
        {load href="/static/js/common.js" /}
        {load href="/static/css/style.css" /}

        15��ʹ��ԭ��PHP����ǩ{php}{/php}






















";