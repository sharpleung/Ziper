# Ziper类

[English](https://github.com/sharpleung/Ziper/blob/master/README_EN.md)

## 描述

> 在PHP-ZipArchive类的基础上进行二次封装使得调用更加便捷
> ***zip方法***:用于压缩文件/文件夹  
>***contents_to_zip方法***:该方法可以在Zip文件里面写入指定文件和内容
>***unzip方法***:解压zip文件                      



## 联系方式

- ![](https://img.shields.io/badge/%E4%BD%9C%E8%80%85-Gqleung-brightgreen.svg)  
- ![](https://img.shields.io/badge/%E5%8D%9A%E5%AE%A2-xiao%20leung's%20Blog-blueviolet) 
- [![](https://img.shields.io/badge/Github-sharpleung-green?logo=appveyor&style=flat)](https://github.com/sharpleung)

## 使用方法

- **压缩文件**

>@param  $filename     新建压缩文件的文件名，若不符合(*.zip)格式将自动添加zip后缀
>@param  $Fromfilename 被压缩文件/文件夹的路径
>@return             若错误返回错误信息,若压缩成功将返回 TRUE

```php
<?php
    include('ziper.class.php');
    $usezip  = new Ziper();
	$usezip->zip('file.zip','file.txt');//压缩文件
	$usezip->zip('file.zip','dir');//压缩文件
?>
```

- **解压ZIP文件**

> @param  string $filename 被压缩文件路径名
> @param  string $dir      解压缩所到目录
> @return string           返回错误原因

```php
<?php
    include('ziper.class.php');
	$usezip->unzip('file.zip','dir');//解压file.zip到文件夹dir
?>
```

- **Zip文件里面写入指定文件和内容**

>@param  string $filename    压缩文件名
>@param  string $zipfilename 需要向压缩文件写入的文件名
>@param  string $content     写入文件的内容
>@return string              成功返回True,否则返回错误内容

```php
<?php
    include('ziper.class.php');
	$usezip->contents_to_zip('file.zip','file.txt','contents');//往file.zip写入一个文件file.txt,内容为content
?>
```

