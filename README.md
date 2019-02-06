# Laravel UseCase Generator

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Overview
Clean ArchitectureでUseCaseを実装する際のテンプレートを自動生成します。

## Demo
![demo](https://raw.github.com/wiki/YAhiru/laravel-usecase-generator/gif/demo.gif)

## Requirements
Laravel ~5.5  
PHP ~7.0

## Installation
To install this package with composer using the following command
```bash
composer require --dev yahiru/laravel-usecase-generator
```

## Usage

基本的なコマンドは以下になります
```bash
php artisan make:usecase UserRegister
```
git@github.com:YAhiru/laravel-usecase-generator.git

もちろん、任意のディレクトリを指定することも可能です。
```bash
php artisan make:usecase User/UserRegister
```

### Options
#### -a
AdapterInterfaceを同時に作成します
```bash
php artisan make:usecase UserRegister -a
```

#### -m
ViewModelを同時に作成します

```bash
php artisan make:usecase UserRegister -m
```

#### -i
InputDataを同時に作成します

```bash
php artisan make:usecase UserRegister -i
```

#### --all
AdapterInterface、ViewModel、InputDataを同時に作成します

```bash
php artisan make:usecase UserRegister --all
```

全てのオプションをまとめて指定することで、`--all`と同じ動作をさせることも可能です

```bash
php artisan make:usecase UserRegister -aim
```

## Custom
細かい動作を変えたいこともあると思います。  
その場合は以下のコマンドでconfigファイルを作成してください
```bash
php artisan vendor:publish --provider="Yahiru\LaravelUseCaseGenerator\UseCaseGeneratorServiceProvider"
```

`config`ディレクトリの下に`usecase.php`が作成されます。 

### Change directory
UseCaseが生成されるディレクトリを指定したい場合もあると思います。  
その場合は `root_path` の値を変更してください。  
デフォルトは `app_path('UseCases')` になっています。
```php
    'root_path' => base_path('/path/to/dir'),
```

### Change namespace
フレームワークとは別のNamespaceに設定していることもあると思います。  
その場合は `namespace` の値を変更してください。  
デフォルトは `'App\\UseCases\\'` になっています。
```php
    'namespace' => 'Custome\\UseCase\\',
```

### Change class names

自動で生成されるクラス名が気に入らないこともあるでしょう。  
その場合は `name` の各値を変更してください。  
`__USE_CASE__` という値はユースケースのクラス名に置換されます。  
```php
     'name' => [
         'adapter' => '__USE_CASE__Adapter',
         'inputdata' => 'InputData',
         'viewmodel' => 'ViewModel',
     ],
```