/**
 * Created by 123 on 2017/8/10.
 */
function conClick() {
    document.getElementById('demo').innerHTML = Date();//document.getElementById('id')  ��ȡDOM����Ԫ�أ����ö�������
}
function changeImg() {
    var Obj = document.getElementById('im');
    if (Obj.src.match('on')) {
        Obj.src = './off.jpg';
    } else {
        Obj.src = './on.jpg';
    }
}
function testNum() {
    var val = document.getElementById('inp').value;//��ȡDOM����Ԫ��ֵ
    if (val == '' || isNaN(val)) {
        alert('�����֣����ţ���ֵ');
    }
}
//window.alert();window.write();innerHTML;console.log();
function lik1(){
    window.alert('fjjf');
}
function lik2(){
    //document.write('11');
    console.log('kdsfk');
}
//һ��̶�ֵ��Ϊ������,����11e2,11,1.1���ַ��������ţ�˫���ţ����ʽ������������������[1,2,3],����������{a:'1',b:'2'},����������  function aa(a,b) {return a+b;}
//var ��������


