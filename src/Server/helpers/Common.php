<?php
/**
 * Created by PhpStorm.
 * User: tmtbe
 * Date: 16-7-15
 * Time: 上午11:38
 */
/**
 * 获取实例
 * @return \Server\SwooleDistributedServer
 */
function &get_instance()
{
    return \Server\SwooleDistributedServer::get_instance();
}

function shell_read()
{
    $fp = fopen('/dev/stdin', 'r');
    $input = fgets($fp, 255);
    fclose($fp);
    $input = chop($input);
    return $input;
}

/**
 * http发送文件
 * @param $path
 * @param $response
 * @return mixed
 */
function httpEndFile($path, $response)
{
    if (!file_exists($path)) {
        return false;
    }
    $extension = get_extension($path);
    $normalHeaders = get_instance()->config->get("fileHeader.normal", ['Content-Type: application/octet-stream']);
    $headers = get_instance()->config->get("fileHeader.$extension", $normalHeaders);
    foreach ($headers as $value) {
        list($hk, $hv) = explode(': ', $value);
        $response->header($hk, $hv);
    }
    $response->sendfile($path);
    return true;
}

/**
 * 获取后缀名
 * @param $file
 * @return mixed
 */
function get_extension($file)
{
    $info = pathinfo($file);
    return strtolower($info['extension']);
}

/**
 * 获取绝对地址
 * @param $path
 */
function get_www($path)
{
    $normal = 'http://localhost:' . get_instance()->config['http_server']['port'];
    return get_instance()->config->get('http.domain', $normal) . '/' . $path;
}