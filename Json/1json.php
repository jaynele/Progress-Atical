<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/2
 * Time: 14:31
 */

echo '

json 三种类型值
简单型值：字符串，数值，布尔值，null
对象：一种复杂数据类型，一系列有序的键值对，键值可以是简单类型值，也可以是复杂数据类型
数组：一种复杂数据类型，一系列值的列表，通过数值索引来引用其中的值，数组的值可以是简单类型，对象或数组


一、简单型值:
json字符串必须使用双引号，但是简单型值只是复杂数据类型的一部分






二、对象：
    (1)js中对象属性不用加双引号，

        var jsonStr = {
            name : "lili",
            age : 5
        };

    (2)js中对象属性可以加上双引号

        var jsonStr = {
            "name" : "lili",
            "age" : 5
        };


    （3）json中没有变量的概念,也没有结尾分号，属性必须用双引号，json的值可以是简单型，也可以是复杂数据类型,复杂类型两个name属性名，
    但是分别属于不同对象，所以没有问题

        1、简单型
            {
                "name" : "lili",
                "age" : 5
            }

        2、复杂数据类型
            {
                "name" : "lili",
                "age" : 5,
                "schoolName" : {
                    "name" : 23,
                    "schoolCate" : "图文"
                }
            }


三、数组
    （1）js中的数组
        var arr = [25, "hi" , true];

    （2）json中数组
        1、json中简单数组，json中数组,还是没有变量，没有结尾的分号
            [25 , "hi" , true]
        2、json中数据结构更复杂的数组
            [
                {
                    "name" : "lili",
                    "age" : 5,
                    "book" : [
                        "title1",
                        "title2",
                        "title3"
                    ]
                },
                {
                    "name" : "tok",
                    "age" : 10,
                    "book" : [
                        "tikk",
                        "tijkd",
                        "flsd"
                    ]
                }
            ]


四、对象和数组通常是json数据结构的最外层形式，可以形成各种各样的数据结构
json数据结构可以解析为js对象，




























';