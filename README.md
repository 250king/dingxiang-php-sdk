# 顶象PHP SKD
因为要使用Lumen框架，而官方没有提供Composer安装，故自己弄一个集成。

## 依赖项
请在安装之前确保以下模块已安装且可用，否则运行的时候会报错：
* PHP JSON模块
* PHP CURL模块

## 安装
在项目的根目录执行安装指令：

```
composer require 250king/dingxiang-php-sdk
```

## 使用
目前仅支持以下服务：
* 设备指纹
* 无感验证
* 实时风险决策

具体使用方法请参考[https://www.dingxiang-inc.com/docs](https://www.dingxiang-inc.com/docs)
