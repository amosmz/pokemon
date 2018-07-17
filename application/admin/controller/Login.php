<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
    public function index(){
        $this->model = model('Admin');
        if(request()->isPost()){
            $data = input('post.');
            // if(!captcha_check($data['verify'])){
            //      $this->error('验证码错误');
            // }else{
                $ret = $this->model->getByAccount($data['account']);
                if(!$ret || $ret->status !=0 ) {
                    $this->error('用户不存在，获取用户已被禁用');
                }
                if($ret->password != md5($data['password'])) {
                    $this->error('密码不正确');
                }
                session('loginUser', $ret, 'admin');
                return $this->success('登录成功', url('Index/index'));
            // }
        }
        return $this->fetch();
    }

    public function logout() {
        // 清除session
        session(null, 'admin');
        // 跳出
        $this->redirect('Login/index');
    }
}
