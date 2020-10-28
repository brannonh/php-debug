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

When logging, data is stored in as JSON at your file location of choice (by default, `debug.json` in the same directory as `Debug.php`).

```php
// Save data to the log file.
$debug->log_data('hello');
$debug->log_data('counter');
```

## API

The following function documentation is sorted alphabetically. To learn the basics and get started quickly, we recommend reading [__construct], [set], [get], [merge], [log_data], and [log_all].

  - [__construct]
  - [count]
  - [decrease]
  - [get]
  - [increase]
  - [is_empty]
  - [log_all]
  - [log_data]
  - [log]
  - [merge]
  - [set]

### `__construct($filename, $data, $log_now, $max_entries)`

All the parameters of the constructor have default values, so none are necessary to get started with `Debug`. The `$data` parameter sets the internal data store and should always be an associative array. The behavior of `Debug` is undefined when it is set to a scalar or an object.

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

[:tophat:](#api)

### `count($key)`

Count the number of values in the array or the number of characters in the string stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being counted |

#### Returns

| Type | Notes |
| --- | --- |
| integer | The number of elements in the array (using `count`) or string (using `strlen`) |

[:tophat:](#api)

### `is_empty($key)`

Get the result of PHP's `empty()` function for the data element stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being checked |

#### Returns

| Type | Notes |
| --- | --- |
| boolean | Whether or not the element is `empty` |

[:tophat:](#api)

### `decrease($key, $val)`

Perform `--` or `-=` operations on the data element stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being decreased |
| `$val` | integer |  | `1` | The value by which to decrease |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `get($key)`

Obtain the value of the data element stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being requested |

#### Returns

| Type | Notes |
| --- | --- |
| mixed | The value of the requested data element |

[:tophat:](#api)

### `increase($key, $val)`

Perform `++` or `+=` operations on the data element stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being increased |
| `$val` | integer |  | `1` | The value by which to increase |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `log_all()`

Write all stored data elements to the log file.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
|  | void |  |  |  |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `log_data($keys)`

Write the data elements stored at `$keys` to the log file.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$keys` | string \| array | :heavy_check_mark: |  | The key(s) for the data element(s) being logged (can be a single key or multiple keys in an integer-indexed array ) |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `log($data)`

Write miscellaneous data to the log file.

In general we recommend using [log_all] or [log_data], but this function is provided for any special cases that may present themselves. `log_all` and `log_data` use this function internally.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$data` | mixed | :heavy_check_mark: |  | The data element to log (can be a single value or multiple values in an integer-indexed array ) |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `merge($key, $data)`

Merge the `$data` array into the data element stored at `$key`. This is an easy way to update multiple values in a data element at once. Assumes `$key` references an array.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being merged |
| `$data` | array | :heavy_check_mark: |  | The data being merged into `$key` |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

### `set($key, $data)`

Save `$data` as the value of the data element stored at `$key`.

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$key` | string | :heavy_check_mark: |  | The key for the data element being saved |
| `$data` | array | :heavy_check_mark: |  | The data being saved into `$key` |

#### Returns

| Type | Notes |
| --- | --- |
| void |  |

[:tophat:](#api)

<!--
### `function_name($parameters)`

#### Parameters

| Parameter | Type | Required | Default | Notes |
| --- | --- | :---: | --- | --- |
| `$` |  | :heavy_check_mark: |  |  |

#### Returns

| Type | Notes |
| --- | --- |
|  |  |
-->

<!-- API Links -->
[__construct]: #__constructfilename-data-log_now-max_entries
[count]: #countkey
[decrease]: #decreasekey-val
[get]: #getkey
[increase]: #increasekey-val
[is_empty]: #is_emptykey
[log_all]: #log_all
[log_data]: #log_datakeys
[log]: #logdata
[merge]: #mergekey-data
[set]: #setkey-data
