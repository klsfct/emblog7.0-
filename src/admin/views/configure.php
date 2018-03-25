<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>setTimeout(hideActived,2600);</script>
<div class="containertitle2">
<a class="navi3" href="./configure.php">基本设置</a>
<a class="navi4" href="./seo.php">SEO设置</a>
<a class="navi4" href="./style.php">后台风格</a>
<a class="navi4" href="./blogger.php">个人设置</a>
<?php if(isset($_GET['activated'])):?><span class="actived">设置保存成功</span><?php endif;?>
</div>
<form action="configure.php?action=mod_config" method="post" name="input" id="input">
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td width="18%" align="right">站点标题：</td>
        <td width="82%"><input maxlength="200" style="width:390px;" class="input" value="<?php echo $blogname; ?>" name="blogname" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">站点副标题：</td>
        <td><textarea name="bloginfo" cols="" rows="3" style="width:386px;" class="textarea"><?php echo $bloginfo; ?></textarea></td>
      </tr>
      <tr>
        <td align="right">站点地址：</td>
        <td><input maxlength="200" style="width:390px;" class="input" value="<?php echo $blogurl; ?>" name="blogurl" /></td>
      </tr>
      <tr>
        <td align="right">每页显示：</td>
        <td><input maxlength="5" size="4" class="input" value="<?php echo $index_lognum; ?>" name="index_lognum" />篇文章</td>
      </tr>
	  <tr>
        <td valign="top" align="right">你所在时区：<br /></td>
        <td>
		<select name="timezone" style="width:390px;" class="input">
<?php
foreach($tzlist as $key=>$value):
$ex = $key==$timezone?"selected=\"selected\"":'';
?>
		<option value="<?php echo $key; ?>" <?php echo $ex; ?>><?php echo $value; ?></option>
<?php endforeach;?>
        </select>
            (当前时区对应的时间：<?php echo date('Y-m-d H:i:s'); ?>)
        </td>
      </tr>
      <tr>
        <td align="right" width="18%" valign="top">功能开关：<br /></td>
        <td width="82%">
        <input type="checkbox" style="vertical-align:middle;" value="y" name="login_code" id="login_code" <?php echo $conf_login_code; ?> />登录验证码<br />
        <input type="checkbox" style="vertical-align:middle;" value="y" name="isgzipenable" id="isgzipenable" <?php echo $conf_isgzipenable; ?> />Gzip压缩<br />
      	<input type="checkbox" style="vertical-align:middle;" value="y" name="isexcerpt" id="isexcerpt" <?php echo $conf_isexcerpt; ?> />自动摘要，截取文章的前
        <input type="text" name="excerpt_subnum" maxlength="3" value="<?php echo Option::get('excerpt_subnum'); ?>" class="input" style="width:25px;" />个字作为摘要<br />
        </td>
      <tr>
  </table>
  <div class="setting_line"></div>
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td align="right" width="18%">RSS：<br /></td>
        <td width="82%">
		输出<input maxlength="5" size="4" value="<?php echo $rss_output_num; ?>" class="input" name="rss_output_num" />篇文章（0为关闭），且输出
        <select name="rss_output_fulltext" class="input">
		<option value="y" <?php echo $ex1; ?>>全文</option>
		<option value="n" <?php echo $ex2; ?>>摘要</option>
        </select>
		</td>
      </tr>
  </table>
  <div class="setting_line"></div>
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td align="right" width="18%" valign="top">评论：<br /></td>
        <td width="82%">
        <input type="checkbox" style="vertical-align:middle;" value="y" name="iscomment" id="iscomment" <?php echo $conf_iscomment; ?> />开启评论，发表评论间隔<input maxlength="5" size="2" class="input" value="<?php echo $comment_interval; ?>" name=comment_interval />秒<br />
		<input type="checkbox" style="vertical-align:middle;" value="y" name="ischkcomment" id="ischkcomment" <?php echo $conf_ischkcomment; ?> />评论审核<br />
		<input type="checkbox" style="vertical-align:middle;" value="y" name="comment_code" id="comment_code" <?php echo $conf_comment_code; ?> />评论验证码<br />
		<input type="checkbox" style="vertical-align:middle;" value="y" name="isgravatar" id="isgravatar" <?php echo $conf_isgravatar; ?> />评论人头像<br />
		<input type="checkbox" style="vertical-align:middle;" value="y" name="comment_needchinese" id="comment_needchinese" <?php echo $conf_comment_needchinese; ?> />评论内容必须包含中文<br />
		<input type="checkbox" style="vertical-align:middle;" value="y" name="comment_paging" id="comment_paging" <?php echo $conf_comment_paging; ?> />评论分页，
		每页显示<input maxlength="5" size="4" class="input" value="<?php echo $comment_pnum; ?>" name="comment_pnum" />条评论，
		<select name="comment_order" class="input"><option value="newer" <?php echo $ex3; ?>>较新的</option><option value="older" <?php echo $ex4; ?>>较旧的</option></select>排在前面<br />
		</td>
      </tr>
  </table>
<div class="setting_line"></div>
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td align="right" width="18%" valign="top">附件：<br /></td>
        <td width="82%">
		附件上传最大限制 <input maxlength="10" size="8" class="input" value="<?php echo $att_maxsize; ?>" name="att_maxsize" />KB（上传文件还受到服务器空间PHP配置最大上传 <?php echo ini_get('upload_max_filesize'); ?> 限制）<br />
        允许上传的附件类型 <input maxlength="200" style="width:320px;" class="input" value="<?php echo $att_type; ?>" name="att_type" />（多个用半角逗号分隔）<br />
        <input type="checkbox" style="vertical-align:middle;" value="y" name="isthumbnail" id="isthumbnail" <?php echo $conf_isthumbnail; ?> />上传图片生成缩略图，最大尺寸：<input maxlength="5" size="4" class="input" value="<?php echo $att_imgmaxw; ?>" name="att_imgmaxw" />x<input maxlength="5" size="4" class="input" value="<?php echo $att_imgmaxh; ?>" name="att_imgmaxh" />（单位：像素）<br />
		</td>
      </tr>
  </table>
  <div class="setting_line"></div>
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td align="right">ICP备案号：</td>
        <td><input maxlength="200" style="width:390px;" class="input" value="<?php echo $icp; ?>" name="icp" /></td>
      </tr>
      <tr>
        <td align="right" width="18%" valign="top">首页底部信息：<br /></td>
        <td width="82%">
		<textarea name="footer_info" cols="" rows="6" class="textarea" style="width:386px;"><?php echo $footer_info; ?></textarea><br />
		(支持html，可用于添加流量统计代码)
		</td>
      </tr>
  </table>
  <div class="setting_line"></div>
  <table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
      <tr>
        <td align="center" colspan="2">
            <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
            <input type="submit" value="保存设置" class="button" />
        </td>
      </tr>
  </table>
</form>