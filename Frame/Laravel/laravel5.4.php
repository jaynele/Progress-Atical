<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/19
 * Time: 16:51
 */
echo '


1、根目录下面的.evn文件，其实还有一个.env.example文件，最好
    将example文件也提交到版本控制器中，这样开发团队就知道你使用的开发环境
    但不要把.env文件提交到版本控制器中
    .env中参数的读取可以使用env()函数，第二个是当值不存在时候的默认值


2、根目录下config文件夹是配置文件目录
    访问配置项值：config("App.timezone");即文件名加"."然后加配置名
    设置配置项值：config(["app.timezone" => "America/Chicago"]);


3、app目录，项目加载流程
    console目录，自定义的artisan命令
    php artisan list make
    make:job 可以生成队列任务
    make:event 生成目录可以存放事件类
    make:mail 存放事件发送类
    make:notification 存放应用发送的通知
    make:policy 授权策略类，用于判断某个用户是否有权限访问特定的资源文件
    providers 目录包含应用所有服务提供者
    （1）入口文件，        载入 Composer 生成的自动加载设置
    （2）bootstrap目录，   获取 Laravel 应用实例
    （3）app目录http下kernel文件，   错误处理、日志、检测应用环境，处理前需要经过的 HTTP 中间件，
        这些中间件处理 HTTP 会话的读写、判断应用是否处于维护模式、验证 CSRF 令牌
    （4）app目录下providers目录下文件，服务提供者， config/app.php 配置文件的 providers 数组中
        所有提供者的 register 方法被调用，然后，所有提供者被注册之后，boot 方法被调用
        服务提供者负责启动框架的所有各种各样的组件，比如数据库、队列、验证器，以及路由组件等，
        正是因为他们启动并配置了框架提供的所有特性，服务提供者是整个 Laravel 启动过程中最重要的部分
    （5）所有服务提供者被注册，分发请求给路由或控制器，同时运行指定的中间件


4、开发环境
    （1）vmware
    (2) 简历Homestead
        1、git clone https://github.com/laravel/homestead.git Homestead
        进入到Homestead
        2、bash init.sh


5、路由缓存，注册新的路由后，都需要执行 php artisan route:cache,这样每次都会从缓存中读取路由
    清楚路由缓存，可以执行命令  php artisan route:clear


6、session 在config目录下session.php配置中















';