<?php
namespace App\Api;

use PhalApi\Api;
use App\Common\GD;

/**
 * 默认接口服务类
 *
 * @author: dogstar <chanzonghuang@gmail.com> 2014-10-04
 */

class Site extends Api {

	public function getRules() {
        return array(
            'index' => array(
                'username' 	=> array('name' => 'username', 'default' => 'PhalApi'),
            ),
        );
        
	}
	
	/**
	 * 默认接口服务
     * @desc 默认接口服务，当未指定接口服务时执行此接口服务
	 * @return string title 标题
	 * @return string content 内容
	 * @return string version 版本，格式：X.X.X
	 * @return int time 当前时间戳
	 */
	public function index() {
        return array(
            'title' => 'Hello ' . $this->username,
            'version' => PHALAPI_VERSION,
            'time' => $_SERVER['REQUEST_TIME'],
        );
    }

    public function testGD() {
        $GD = new GD();
        $base64 = $GD->getUserDefaultAvatarRandom();
        $link = $GD->base64Upload($base64);

        return $link;
    }
}
