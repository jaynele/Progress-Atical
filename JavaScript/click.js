/**
 * Created by 123 on 2017/8/10.
 */
function conClick() {
    document.getElementById('demo').innerHTML = Date();//document.getElementById('id')  获取DOM对象元素，设置对象内容
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
    var val = document.getElementById('inp').value;//获取DOM对象元素值
    if (val == '' || isNaN(val)) {
        alert('是文字，符号，空值');
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
//一般固定值称为字面量,整数11e2,11,1.1，字符串单引号，双引号，表达式字面量，数组字面量[1,2,3],对象字面量{a:'1',b:'2'},函数字面量  function aa(a,b) {return a+b;}
//var 声明变量


