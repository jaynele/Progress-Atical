<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/9
 * Time: 17:49
 */
class Info{
    protected $header = array("Content-type:application/x-www-form-urlencoded; charset=utf-8");
    /**
     * ����HTTP���󷽷�
     * @param  string $url    ����URL
     * @param  array  $params �������
     * @param  string $method ���󷽷�GET/POST
     *
     * @return array  $data   ��Ӧ����
     */
    public function http($url, $params, $method='POST', $multi = false){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $this->header,
            CURLOPT_HEADER         => 0
        );
        /* �����������������ض����� */
        switch(strtoupper($method)){
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //�ж��Ƿ����ļ�
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('��֧�ֵ�����ʽ��');
        }
        /* ��ʼ����ִ��curl���� */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if($error) throw new Exception('����������' . $error);
        return  $data;
    }


}