<?php

/**
*TODO:栈元素输入输出
*    创建类，构造数组、数组长度、栈顶指针、岀栈标识4个属性
*/    
Class Stack{
    protected $MaxSize = 10;
    protected $arr = [];
    protected $top = -1;
    protected $out;    //岀栈标识

/**
*TODO:入栈操作
*@pagram int $e 入栈元素
*/
    public function Push($e){
        /*    判断：满栈则返回错误    */
        if($this->top == $this->MaxSize){
            return error;
        }
        /*    先后移栈顶指针后赋值    */
        $this->top = ++$this->top;
        $this->arr[$this->top] = $e;
        /*    输出    */
        echo "栈顶指针现在所属位置".$this->top."--";
        echo "$e 入栈成功"."<br/>";
    }

/**
*TODO:岀栈操作
*/
    public function Pop(){
        /*    判断：空栈则返回错误    */
        if($this->top == -1){
            return error;
        }
        /*    先移除栈元素针后前移栈顶指针    */
        $this->out = $this->arr[$this->top];
        $this->top = --$this->top;
        /*    输出    */
        
        echo "栈顶指针现在所属位置".$this->top."--";
        echo "$this->out  岀栈成功"."<br/>";
        /*    销毁移除元素    */
        unset($this->out);    
    }

/**
*TODO:程序结束时执行
*/
    public function __destruct(){
        echo "over";
    }
}

    $stack = new Stack();
    $stack->Push("entner");//Push没有加循环，可参看系列文章三-队列
    $stack->Push("susan");
    $stack->Push("george");
    $stack->Pop();    //这里同样可以使用循环操作
    $stack->Pop();
    $stack->Pop();
