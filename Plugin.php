<?php

/**
 * 剪贴板内容格式化Markdown for Typecho后台编辑器
 *
 * @package Clipboard2markdown
 * @author 大袋鼠
 * @version 1.0.0
 * @link https://muguang.me/
 */
class Clipboard2markdown_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/write-post.php')->option = array('Clipboard2markdown_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-page.php')->option = array('Clipboard2markdown_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-post.php')->bottom = array('Clipboard2markdown_Plugin', 'outputAssets');
        Typecho_Plugin::factory('admin/write-page.php')->bottom = array('Clipboard2markdown_Plugin', 'outputAssets');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    public static function render()
    {
        echo '<section class="typecho-post-option"><label for="template" class="typecho-label">剪贴板Markdown格式化</label><p><div class="cell-right" style="margin-bottom: 10px;"><span class="switch-on" id="pastebin-switch"></span></div><div contenteditable="true" id="pastebin" style="opacity: 0.01;width: 100%;height: 1px;overflow: hidden;"></div>';
    }

    public static function outputAssets()
    {
        $jsPath = Helper::options()->pluginUrl . '/Clipboard2markdown/assets/clipboard2markdown.js';
        $output = '<style>[class|=switch]{position:relative;display:inline-block;width:40px;height:20px;border-radius:16px;line-height:32px;-webkit-tap-highlight-color:rgba(255,255,255,0)}.switch-on{border:1px solid white;box-shadow:white 0 0 0 16px inset;transition:border .4s,box-shadow .2s,background-color 1.2s;background-color:white;cursor:pointer}.slider{position:absolute;display:inline-block;width:20px;height:20px;background:white;box-shadow:0 1px 3px rgba(0,0,0,0.4);border-radius:50%;left:0;top:0}.switch-on .slider{left:20px;transition:background-color .4s,left .2s}.switch-off{border:1px solid #dfdfdf;transition:border .4s,box-shadow .4s;background-color:#fff;box-shadow:#dfdfdf 0 0 0 0 inset;background-color:#fff;cursor:pointer}.switch-off .slider{left:0;transition:background-color .4s,left .2s}.switch-on.switch-disabled{opacity:.5;cursor:auto}.switch-off.switch-disabled{background-color:#f0f0f0!important;cursor:auto}</style><script src="' . $jsPath . '"></script>';
        echo $output;
    }

}
