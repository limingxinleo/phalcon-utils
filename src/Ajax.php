<?php
// +----------------------------------------------------------------------
// | Demo [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2016/11/7 Time: 10:37
// +----------------------------------------------------------------------
namespace limx\phalcon;
class Ajax
{
    /**
     * [ajaxResponse 返回特定格式的json]
     * @author limx
     * @param int $status 状态码
     * @param array $data 数据包
     * @param string $message 错误信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxResponse($status = 1, $data = [], $message = '')
    {
        $out = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'timestamp' => time()
        ];

        echo json_encode($out);
        return false;
    }

    /**
     * [success 成功的信息]
     * @author limx
     * @param null $data 数据包
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = null)
    {
        return $this->ajaxResponse(1, $data);
    }

    /**
     * [error 返回错误信息]
     * @author limx
     * @param $message 错误提示
     * @param array $extra 额外的数据包
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $extra = [])
    {
        return $this->ajaxResponse(0, $extra, $message);
    }

}