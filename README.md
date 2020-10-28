# php-debug

Simple debugging class for use in PHP scripts

## Setup

Use this class if you need to gather debugging information without access to a debugger, like in a customer's environment.

## Support

This library has not been tested on PHP versions prior to 5.3.29. If you try it, please let us know how it goes by opening a new issue.

If you find problems on any other versions, please also let us know in a new issue.

## Usage

To use php-debug, simply drop the `Debug.php` file somewhere in your source files and `include` or `require` it in the file that needs to be debugged. Then, create a new `Debug` object and use it to gather, save, and log data.

```php
// Instantiate Debug.
$debug = new Debug;

// Save / modify data.
$debug->set('hello', 'world');
$debug->set('counter', 0);
$debug->increase('counter');
```

When logging, data is stored in a `serialize`d array at your file location of choice (by default, `debug.log` in the same directory as `Debug.php`).

```php
// Save data to the log file.

$debug->log_data('hello');
// Log File: a:1:{i:0;a:3:{s:9:"timestamp";s:19:"2020/01/01 00:00:00";s:4:"name";s:5:"hello";s:4:"data";s:5:"world";}}

$debug->log_data('counter');
// Log File: a:2:{i:0;a:3:{s:9:"timestamp";s:19:"2020/01/01 00:00:00";s:4:"name";s:5:"hello";s:4:"data";s:5:"world";}i:1;a:3:{s:9:"timestamp";s:19:"2020/01/01 00:00:01";s:4:"name";s:7:"counter";s:4:"data";i:1;}}
```

## API

### `__construct($filename, $data, $max_entries)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$filename` | string |  | `'debug.json'` | The default file is created in the same directory as `Debug.php`. |
| `$data` | array |  | `array()` | Use this to initialize the saved data. |
| `$log_now` | boolean |  | `false` | Log any initialized data immediately. |
| `$max_entries` | integer |  | `500` | The log file will be limited to this many entries (not lines). |

#### Returns

| Type | Notes |
| --- | --- |
| `Debug` | The `Debug` object |

### `count($key)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being counted |

#### Returns

| Type | Notes |
| --- | --- |
| integer | The number of elements in the array (using `count`) or string (using `strlen`) |

### `is_empty($key)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being checked |

#### Returns

| Type | Notes |
| --- | --- |
| boolean | Whether or not the element is `empty` |

### `decrease($key, $val)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being decreased |
| `$val` | integer |  | `1` | The value by which to decrease |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

### `get($key)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being requested |

#### Returns

| Type | Notes |
| --- | --- |
| mixed | The value of the requested data element |

### `increase($key, $val)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being increased |
| `$val` | integer |  | `1` | The value by which to increase |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

### `log($data)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$data` | mixed | :heavy_check_mark: |  | The data element to log (can be a single value or multiple values in an integer-indexed array ) |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

### `log_data($keys)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$keys` | string \| array | :heavy_check_mark: |  | The key(s) for the data element(s) being logged (can be a single key or multiple keys in an integer-indexed array ) |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

### `merge($key, $data)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being merged |
| `$data` | array | :heavy_check_mark: |  | The data being merged into `$key` |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

### `set($key, $data)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being saved |
| `$data` | array | :heavy_check_mark: |  | The data being saved into `$key` |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

<!--
#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
|  |  |  |  |  |

#### Returns

| Type | Notes |
| --- | --- |
|  |  |
-->
