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
            select count(year = 16 or year = 17)

































';