<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/1
 * Time: 15:29
 */

//什么是HTTP协议，协议是指计算机通信网络中两台计算机之间进行通信所必须共同遵守的规定或规则，
//超文本传输协议(HTTP)是一种通信协议，它允许将超文本标记语言(HTML)文档从Web服务器传送到客户端的浏览器


//请求头字段
//1.Accept：text/html ，image/gif       客户端期待接收的文件类型
//2.Accept-Encoding：  gzip,deflate     客户端可以接收的编码格式。
//3.Accept-Languages：zh-cn             客户端期望接收到的语言种类
//4.Cache-Control：no-cache ：不要读取缓存文件
//                no-store：禁止被缓存
//          only-if-cached：希望内容来自缓存
//            no-transform：告知代理，不要改媒体类型，例如：png 不能改为jpeg
//5.connection:Upgrade,
//             Keep-Alive：客户端到服务端的请求持续有效
//             close:响应完成后关闭    是否可以保持固定的HTTP连接
//6.Host:请求的目标主机
//7.cookie:
//8.pragma:no-cache
//9.user-Agent:使用的浏览器类型，操作系统版本，cpu类型，浏览器渲染引擎，浏览器语言和插件

//请求头：Accept  Accept-Encoding  Accept-Language  Cache-control   connection  host  cookie  pragma  user-agent


//浏览某个使用cookie的网站，服务器为用户生成一个唯一的识别码，


//当用户浏览某个使用Cookie的网站时，该网站的服务器就为用户产生一个唯一的识别码，
//并以此作为索引在服务器的后端数据库中产生一个项目。
//并在给用户的HTTP相应报文中添加一个叫做Set-Cookie的首部行，这里的“首部字段名称”就是“Set-Cookie”，
//对应的字段值就是服务器赋予该用户的“识别码”。其格式如下：
//Set-cookie：abcdefg(只作为示例，实际肯定比这个复杂)
//当用户收到这个响应式，其浏览器就在他管理的特定Cookie文件中添加一行，
//其中包括这个服务器的主机名（即host字段）和Set-cookie对应的这个网站的识别码，并放到HTTP请求报文的Cookie首部行中，如下：
//Cookie：abcdefg