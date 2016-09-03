<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/9/1
 * Time: 19:57
 */

namespace core\lib;

use \core\lib\conf;

/**
 *
 * 未完成的功能：
 * 1.对目标目录是否存在的判断
 * 2.如果上传时出现重名，自动重命名
 *
 */
class fileupload
{
    /**
     * PHP上传类upload.php上传文件的信息，此值由构造函数取得，如果上传文件失败或出错或未上传，则此值为false
     *
     * @var array
     */
    private $file = false;


    /**
     * 构造函数：取得上传文件的信息
     *
     * 如果在上传文件的工程中发生错误，那么出错的文件不会放在结果中返回，结果中的文件都是可用的
     *
     * @param string $tag form表单中<input>标签中name属性的值，例<input name="p" type="file">
     *
     * 例1，上传单个文件：
     * <input name="upfile" type="file">
     *
     * 例2，上传多个文件：
     * <input name="upfile[]" type="file">
     * <input name="upfile[]" type="file">
     *
     * 结果（保存在$file变量中）如下：
     *
     * array(
     * [0] => array(
     *      'name'      => 'abc.txt'
     *      'type'      => 'text/plain’
     *      'tmp_name'  => '/tmp/phpgxecCb'
     *      'error'     => 0
     *      'size'      => 62
     *      )
     * [1] => array(
     *      'name'      => 'abc.txt'
     *      'type'      => 'text/plain’
     *      'tmp_name'  => '/tmp/phpgxecCb'
     *      'error'     => 0
     *      'size'      => 62
     *      )
     * )
     */
    public function __construct($tag)
    {
        $file = $_FILES[$tag];

        if (!isset($file) || empty($file)) {
            return false; //没有上传文件
        }

        $num = count($file['name']); //PHP上传类upload.php上传文件的个数

        $data = array(); //用来保存上传文件的信息的数组

        //上传了多个文件
        if ($num > 1) {
            for($i = 0; $i < $num; $i++) {
                $d = array();
                $d['name'] = $file['name'][$i];
                $d['type'] = $file['type'][$i];
                $d['tmp_name'] = $file['tmp_name'][$i];
                $d['error'] = $file['error'][$i];
                $d['size'] = $file['size'][$i];

                if ($d['error'] == 0) {
                    $data[] = $d;
                } else {
                    unlink($d['tmp_name']);
                }
            }
        } else {
            $d = array();
            $d['name']  = $file['name'];
            $d['type'] = $file['type'];
            $d['tmp_name'] = $file['tmp_name'];
            $d['error'] = $file['error'];
            $d['size'] = $file['size'];

            if ($d['error'] == 0) {
                $data[] = $d;
            } else {
                unlink($d['tmp_name']);
            }
        }

        if (empty($data)) {
            return false;
        } else {
            $this -> file = $data; //保存上传文件的信息
        }
    }

    /**
     * 将上传的文件从临时文件夹移动到目标路径
     *
     * @param array $src 文件信息数组，是$file数组的其中一个元素（仍然是数组）
     * @param string $destpath 上传的目标路径
     * @param string $filename 上传后的文件名，如果为空，则使用上传时的文件名
     * @return bool
     */
    public function save($src, $destpath, $filename = null)
    {
        $srcTName = $src['tmp_name']; //原始上传文件的临时文件名
        $srcFName = $src['name'];     //原始文件名

        //如果$filename参数为空，则使用上传时的文件名
        if (empty($filename)) {
            $filename = $srcFName;
        }

        //$dest是文件最终要复制到的路径和文件名
        if (empty($destpath)) {
            $dest = conf::get('DEFAULT_ADDRESS', 'fileupload') . '/' . $filename;
        } else {
            //修正路径中的斜杠，将末尾的\修改为/，如果末尾不是\也不是/，则给末尾添加一个/
            $pathend = $destpath[strlen($destpath) - 1]; //上传的目标路径的最后一个字符
            if ($pathend == '\\') {
                $dest = substr_replace($destpath, '/', strlen($destpath)-1).$filename;
            } else if ($pathend != '/') {
                $dest = $destpath.'/'.$filename;
            } else {
                $dest = $destpath.$filename;
            }
        }
        //上传文件成功
        if (move_uploaded_file($srcTName, $dest)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 取得上传文件的信息
     *
     * @return array
     */
    public function getFileInfo()
    {
        return $this->file;
    }
}