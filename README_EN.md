# Ziper Class

## Description

> The second encapsulation based on PHP Ziprarchive class makes it more convenient for PHP to call and decompress zip file.
>
> ***function zip***: Zip the files / folders.
>
> ***function contents_to_zip***:This method can write the specified file and content in the zip file.
>
> ***function unzip***: Unzip the zip file                      



## Connection

- ![](https://img.shields.io/badge/%E4%BD%9C%E8%80%85-Gqleung-brightgreen.svg)  
- ![](https://img.shields.io/badge/%E5%8D%9A%E5%AE%A2-xiao%20leung's%20Blog-blueviolet) 
- [![](https://img.shields.io/badge/Github-sharpleung-green?logo=appveyor&style=flat)](https://github.com/sharpleung)

## Usage method

- ***Zip file***

>@param  $filename    The file name of the new compressed file. If it does not conform to the  format (*. Zip), the zip suffix will be added automatically  
>@param  $Fromfilename  Path to compressed file / folder 
>@return              Return true successfully, otherwise return error content 

```php
<?php
    include('ziper.class.php');
    $usezip  = new Ziper();
	$usezip->zip('file.zip','file.txt');//zip file
	$usezip->zip('file.zip','dir');//zip dir
?>
```

- ***Uzip file***

> @param  string $filename  Path name of compressed file 
> @param  string $dir      Extract the directory to
> @return string            Return error reason   

```php
<?php
    include('ziper.class.php');
	$usezip->unzip('file.zip','dir');//unzip file.zip to dir 
?>
```

- ***Write file to zip file***

>@param  string $filename    Zip filename
>@param  string $zipfilename  The name of the file that needs to be written to the compressed file 
>@param  string $content     Write the contents of the file 
>@return string               Return true successfully, otherwise return error content 

```php
<?php
    include('ziper.class.php');
	$usezip->contents_to_zip('file.zip','file.txt','contents');//Write file.txt to file.zip,contents is content
?>
```

