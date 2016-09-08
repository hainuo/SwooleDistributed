<?php
/**
 * Created by PhpStorm.
 * User: hainuo
 * Date: 16/9/7
 * Time: 下午9:36
 */

namespace app\Controllers;


use Server\CoreBase\Controller;

/**
 * Class base
 *
 * @package app\Controllers
 */
class base extends Controller
{
    /**
     * 基础显示打包
     *
     * @param $views
     *
     */
    public function display($views, $data = [])
    {
        if (empty($views)) {
            $views = 'app::error_404';
            $array = [
                'controller' => 'TestController\html_test',
                'message'    => '页面不存在！',
            ];
        } else {
            $array = [
                'dumps' => [
                    'ddd' => 3434,
                ],
            ];
        }
        $template = $this->loader->view($views);

        $array = array_merge($array, $data);
        $output = $template->render($array);

        $this->http_output->response->write($output);
        $this->http_output->end();
    }

    /**
     * 输出信息
     */
    public function dump()
    {
//        var_dump($this->server->setting);
        $arr = func_get_args();
        foreach ($arr as $value) {
            $value = var_export($value, true);
            $value = '<pre>' . $value . '</pre>';
            $this->http_output->response->write($value);
        }
    }
}