<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/13
 * Time: 14:58
 */
echo '


�����Ż���
    ����ѯ��־���ݣ�Ȼ�����ɱ���
    ���ͨ������ѯ��־�����������ҳ���Ҫ�Ż���sql

    ��1����ѯ�����Ƚ϶࣬ÿ�β�ѯ��ʱ��Ƚϳ���sql
    ��2��IO���sql��IO�ܹؼ���sqlɨ�����ݿ�������������࣬���ľʹ�
    ��3��δ����������sql   �����к�ɨ����   Rows Send  ��  Rows examine  �Աȣ����ԶԶС��ɨ���У��Ǿ������������ļ����ر��


    һ��sql�������Ż�
        ʹ��explain��ѯsql��ִ�мƻ�
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

        ��������table  ��˼����

        ������type   ��˼����Ҫ���У���ʾ����ʹ���˺������ͣ�����õ�������������Ϊconst��eq_reg��ref��range��index��ALL
            const ��������Ψһ����
            eq_reg ��Χ����
            ref    ������������
            range  ������Χ����
            index  ����ɨ��
            ALL    ��ɨ��

        ������possible keys
            �����õ�����������Щ
        (��) key
            ʱ���õ�����������Щ
        (��) key_len
            �����ĳ��ȣ���������ԽСԽ�ã�mysql��ҳ����ȡ�ģ�һҳ�������������ѯЧ����Խϸ�
        (��) ref
            ��������һ�б�ʹ���ˣ����ܵĻ��������һ������
        (��) rows
            ���ؽ��������
        ���ˣ�Extra
            Using filesort:��Ҫ�Ż���ѯ���Է��ص��н�������
            Using temporary:��Ҫ�Ż���ѯ��������ʱ����д洢�����ͨ��������orderByʱ��


  ����count  max ���Ż�����
    ��һ����������֧��ʱ��
    (1)explain select max(create_time) from pay_info;
    ����ͷǳ����
    ��2��������Ҫ���ֶ�create_time��������
    create index idx_create_time on pay_info(create_time);
    ������˳�������

    ����max�Ĳ�ѯ���Խ�������

    ��������16-17���Ʊ��
        select count(year = 16 or null)��count (year = 17 or null) from table;
        count(*) ��count(id)����count(id)������id ֵΪnull�ļ���

   �����Ӳ�ѯ�Ż�->join
    һ�Զ��ϵ�������ظ��������Ӳ�ѯ�����ظ�����join���Ǳ����ظ�
    �Ӳ�ѯҪ�Ż���join��ѯ
    ��distinct������joinȥ��

    join ��Ҫд��on������on��������where����

   �ġ�group by ��ѯ�Ż�
        ÿ����Ա���ݵ�ӰƬ����
        (1)select action.ac_name,count(film.f_id) from action left join film on action.ac_id = film.f_id group by action.ac_id;
        ������Ա���з���
        ������ʱ��Ĳ���
        ��д��left join �� group by ������һ����ѯ���棬�Ȱ�group by��������Ϣ����һ����ʱ���ٰ���Ա��join����
        (2)select action.ac_name,f.num from action left join (select ac_id,count(f_id) from film group by ac_id) as f on action.ac_id = f.ac_id;

    �塢limit�Ż�
        limitͨ�����ڷ�ҳ������order byһ��ʹ�ã�����һ����filesort��ɨ����ɴ�����IO����
        (1)select film.f_id,descript from film where f_id > 20 order by title limit 20,10;
        �����ʹ���˱�ɨ�������
        ��д��ʹ���������������н���order by���������ھ���ɨ��20�еĲ�������Ҫ��һ���Ż���where f_id > 20 and f_id <= 20+10 limit 1,10;
        ��2��select f_id,descript from film where f_id > 20 and f_id <= 20+10 order by f_id limit 1,10;
        ����ɨ�������Ҳ��10��

    ���������Ż�
        ���ѡ����ʵ��н�������
        1����where �Ӿ䣬group by �Ӿ䣬order by �Ӿ䣬on �Ӿ���
        2�������ֶ�ԽСԽ��
        3����ɢ�ȴ���зŵ�����������ǰ�棬Ψһ��ǿ
        ���ڲ�ѯ��Ӱ��д��
        ���ظ�����������������ͬ���н�����ͬ������������������������ǰ�������ְ�����������������ʵ������������������
        innodb��������������������������������

        ʹ��pt-duplicate-key-checker���߼���������





































';