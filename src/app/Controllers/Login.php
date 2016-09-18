<?php
/**
 * Created by PhpStorm.
 * User: hainuo
 * Date: 16/9/7
 * Time: 下午4:54
 */
namespace app\Controllers;

class Login extends base
{
    public function http_index()
    {
//        $this->dump($this->config->get('server.set'));
        $this->json($this->config->get('server.set'));

//        $this->display(null, [
//            'dumps' => [
//                'a' => 2134234,
//            ],
//        ]);
//        $this->http_output->response->write(123412);
//        $this->http_output->response->end();

    }
}