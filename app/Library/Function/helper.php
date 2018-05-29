<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

if ( !function_exists('p') ) {
    // 传递数据以易于阅读的样式格式化后输出
    function p($data, $to_array = true)
    {
        // 定义样式
        $str = '<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
        // 如果是boolean或者null直接显示文字；否则print
        if (is_bool($data)) {
            $show_data = $data ? 'true' : 'false';
        } elseif (is_null($data)) {
            $show_data = null;
        } elseif (get_parent_class($data) === 'Illuminate\Support\Collection' && $to_array) {
            $data_array = $data->toArray();
            $show_data = '这是被转成数组的对象:<br>'.print_r($data_array, true);
        } else {
            $show_data = print_r($data, true);
        }
        $str .= $show_data;
        $str .= '</pre>';
        echo $str;
    }
}



if ( !function_exists('ajaxReturn') ) {
    /**
     * ajax返回数据
     *
     * @param  string  $data        需要返回的数据 
     * @param  integer $status_code 
     * @return \Illuminate\Http\JsonResponse
     */
    function ajaxReturn ($status_code = 200, $data = '')
    {
        // 如果是错误，返回错误信息
        if ($status_code != 200) {
            // 增加 status_code
            $data = ['status_code' => $status_code, 'message' => $data];
            return response()->json($data, $status_code);
        }
        // 如果是对象 先转成数组
        if (is_object($data)) {
            $data = $data->toArray();
        }
        /**
         * 将数组递归转字符串
         * @param  array $arr 需要转的数组
         * @return array
         */
        function toString($arr)
        {
            // app 禁止使用和为了统一字段做的判断
            $reserved_words = array('id', 'title', 'description');
            foreach ($arr as $k => $v) {
                // 如果是对象先转数组
                if (is_object($v)) {
                    $v = $v->toArray();
                }
                // 如果是数组，则递归转字符串
                if (is_array($v)) {
                    $arr[$k] = toString($v);
                } else {
                    // 判断是否有移动端禁止使用的字段
                    in_array($k, $reserved_words, true) && due('app不允许使用【' . $k . '】这个键名 —— 此提示是helper.php 中的ajaxReturn函数返回的');
                    // 转成字符串类型
                    $arr[$k] = strval($v);
                }
            }
            return $arr;
        }

        // 判断是否有返回的数据
        if (is_array($data)) {
            // 先把所有字段都转成字符串类型
            $data = toString($data);
        }
        return response()->json($data, $status_code);
    }
}



if ( !function_exists('sendEmail') ) {
    /**
     * 发送邮件函数
     *
     * @param  $email           收件人邮箱 如果群发 则传入数组
     * @param  $name            收件人名称
     * @param  $subject         标题
     * @param  $data            邮件模板中用的变量 示例：['name'=>'Sen','phone'=>'110']
     * @param  string $template 邮件模板
     * @return array            发送状态
     */
    function sendEmail($email, $name, $subject, $data, $template = 'emails.test')
    {
        Mail::send($template, $data, function ($message) use ($email, $name, $subject) {
            // 如果是数组；则群发邮件
            if (is_array($email)) {
                foreach ($email as $k => $v) {
                    $message->to($v, $name)->subject($subject);
                }
            } else {
                $message->to($email, $name)->subject($subject);
            }
        });
        if (count(Mail::failures()) > 0) {
            $data = array('status_code' => 500, 'message' => '邮件发送失败');
        } else {
            $data = array('status_code' => 200, 'message' => '邮件发送成功');
        }
        return $data;
    }
}

if ( !function_exists('upload') ) {
    /**
     * 上传文件函数
     *
     * @param         $file      表单的name名
     * @param  string $path      上传的路径
     * @param  bool   $childPath 是否根据日期生成子目录
     * @return array             上传的状态
     */
    function upload ($file, $path = 'upload', $childPath = true)
    {
        // 判断请求中是否包含name=file的上传文件
        if (!request()->hasFile($file)) {
            $data = ['status_code' => 500, 'message' => '上传文件为空'];
            return $data;
        }
        $file = request()->file($file);
        // 判断文件上传过程中是否出错
        if (!$file->isValid()) {
            $data = ['status_code' => 500, 'message' => '文件上传出错'];
            return $data;
        }
        // 兼容性的处理路径的问题
        if ($childPath == true) {
            $path = './' . trim($path, './') . '/' . date('Ymd') . '/';
        } else {
            $path = './' . trim($path, './') . '/';
        }
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        // 获取上传的文件名
        $oldName = $file->getClientOriginalName();
        // 组合新的文件名
        $newName = uniqid() . '.' . $file->getClientOriginalExtension();
        // 上传失败
        if (!$file->move($path, $newName)) {
            $data = ['status_code' => 500, 'message' => '保存文件失败'];
            return $data;
        }
        // 上传成功
        $data = ['status' => 200, 'message' => '上传成功', 'data' => ['old_name' => $oldName, 'new_name' => $newName, 'path' => trim($path, '.')]];
        return $data;
    }
}

if ( !function_exists('getUid') ) {
    /**
     * 返回登录的用户id
     *
     * @return mixed 用户id
     */
    function getUid()
    {
        return Auth::id();
    }
}

if ( !function_exists('save_to_file') ) {
    /**
     * 将数组以json格式写入文件
     * @param string $file_name 文件名
     * @param array  $data      数组
     */
    function save_to_file($file_name = 'test', $data = array())
    {
        is_dir('./Temp/') || mkdir('./Temp/');
        $file_name = str_replace('.php', '', $file_name);
        $file_name = './Temp/' . $file_name . '_' . date('Y-m-d_H-i-s', time()) . '.php';
        file_put_contents($file_name, json_encode($data));
    }
}