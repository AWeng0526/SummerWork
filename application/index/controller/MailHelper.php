<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class MailHelper
{
    private $mail;
    private $username;
    private $password;
    private $host;
    public $fromName;
    public $charSet = 'UTF-8';
    public $encoding = 'base64';
    public $port = 587;

    /**
     * 构造函数
     *
     * @param [array] $config :初始化$mail的基本参数数组
     * @return void
     */
    public function __construct($config)
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->isSMTP();                          //采用smtp协议
            $this->mail->Username   = $config['username'];  //初始化用户名
            $this->username         = $config['username'];
            $this->fromName         = $config['username'];
            $this->mail->Password   = $config['password'];  //初始化密码
            $this->password         = $config['password'];
            $this->mail->Host       = $config['host'];      //初始化host
            $this->host             = $config['host'];
            $this->mail->IsHTML($config['isHtml']);         //支持html格式内容
            $this->mail->SMTPAuth   = true;                 //smtp协议认证
            $this->mail->SMTPSecure = 'tls';
        } catch (Exception $e) {
            throw new Exception("Fail construct", $e);
        }
    }

    /**
     * 发送邮件
     *
     * @param array $mail:发送邮件的参数数组
     * @param string $body:发送邮件内容
     * @return void
     */
    public function sendMail($mail, $body)
    {
        try {
            $this->mail->Port = $this->port;
            $this->mail->CharSet  = $this->charSet;     //字符集
            $this->mail->Encoding = $this->encoding;    //编码方式
            $this->mail->Subject = $mail['subject'];    //邮件标题
            $this->mail->From = $this->username;        //发件人地址
            $this->mail->FromName = $this->fromName;  //发件人姓名
            $this->mail->AddAddress($mail['address']);  //收件人地址
            $this->mail->Body = $body;          //邮件内容
            $this->mail->Send();
        } catch (Exception $e) {
            throw new Exception("Fail send mail", $e);
        }
    }
}
$config = array(
    'username' => '1154598143@qq.com',
    'password' => 'dptfuiudfnkybagj',
    'host' => 'smtp.qq.com',
    'isHtml' => true,
);
$test = new MailHelper($config);

$mail = [
    'address'   => '1154598143@qq.com',
    'subject'   => 'SubjectTest',
];
$test->sendMail($mail, 'msgBody');
