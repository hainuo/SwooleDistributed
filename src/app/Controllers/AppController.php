<?php
namespace app\Controllers;

use app\Models\AppModel;
use Server\CoreBase\Controller;

/**
 * Created by PhpStorm.
 * User: tmtbe
 * Date: 16-7-15
 * Time: 下午3:51
 */
class AppController extends Controller
{
    /**
     * @var AppModel
     */
    public $AppModel;

    /**
     * http测试
     */
    public function http_test()
    {
        $this->AppModel = $this->loader->model('AppModel', $this);
        $this->http_output->end($this->AppModel->test());
    }

    public function http_test_task()
    {
        $AppTask = $this->loader->task('AppTask');
        $AppTask->testTask();
        $AppTask->startTask(function ($serv, $task_id, $data) {
            $this->http_output->end($data);
        });
    }
}