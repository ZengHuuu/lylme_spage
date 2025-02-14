<?php 
$title = '网站设置';
include './head.php';
function uploadimg($arr,$uppath,$uptype) {
	if((($arr["type"]=="image/jpeg") ||($arr["type"]=="image/jpg") ||($arr["type"]=="image/png")) && $arr["size"] < 10485760 ) {
		copy($arr["tmp_name"],ROOT.$uppath);
		saveSetting($uptype,'/'.$uppath);
	} else if ($arr["size"]==0) {
	} else {
		echo '<script>alert("上传的图片大小超过10MB或类型不符！");history.go(-1);</script>';
	}
}
$set=isset($_GET['set'])?$_GET['set']:null;
if($set=='save') {
	$title=$_POST['title'];
	$logo=$_POST['logo'];
	$background=$_POST['background'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$copyright=$_POST['copyright'];
	$icp=$_POST['icp'];
	$yan=$_POST['yan'];
	$tq=$_POST['tq'];
	$wztj=$_POST['wztj'];
	$template=$_POST['template'];
	$apply=$_POST['apply'];
	$cdnpublic=$_POST['cdnpublic'];
	$home_title= $_POST['home-title'];
	if($yan=='true') {
		saveSetting('yan','true');
	} else {
		saveSetting('yan','false');
	}
	if($tq=='true') {
		saveSetting('tq','true');
	} else {
		saveSetting('tq','false');
	}
	saveSetting('title',$title);
	saveSetting('logo',$logo);
	saveSetting('background',$background);
	saveSetting('keywords',$keywords);
	saveSetting('description',$description);
	saveSetting('copyright',$copyright);
	saveSetting('icp',$icp);
	saveSetting('wztj',$wztj);
	saveSetting('apply',$apply);
	saveSetting('template',$template);
	saveSetting('cdnpublic',$cdnpublic);
	saveSetting('home-title',$home_title);
	uploadimg($_FILES["logoimg"],'assets/img/logo.png','logo');
	uploadimg($_FILES["backgroundimg"],'assets/img/background.jpg','background');
	echo '<script>alert("修改成功！");window.location.href="./set.php";</script>';
} else {
	?>
	  <script>
	function updatetext(check) {
		document.getElementById(check).innerHTML="重新选择";
	}
	</script>
	    <!--页面主要内容-->
	    <main class="lyear-layout-content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="tab-content">
	                <div class="tab-pane active">
	                  <form action="set.php?set=save" method="post" name="edit-form" class="edit-form"  enctype="multipart/form-data">
	                    <div class="form-group">
	                      <label for="web_site_title">网站标题</label>
	                      <input class="form-control" type="text" id="web_site_title" name="title" value="<?php echo $conf['title']?>" placeholder="请输入站点标题" required >
	                       </div>
	                    <div class="form-group">
	                      <label for="web_site_logo">网站LOGO</label>
	                      <div class="input-group">
	                        <input type="text" class="form-control" name="logo" id="web_site_logo" value="<?php echo $conf['logo']?>" />
	                           <div class="input-group-btn">
	                              <label  class="btn btn-default" for="logoimg" id="checklogo" type="button">选择图片</label > 
	                               <input type="file" style="display:none" accept=".png,.jpeg,.jpg" id="logoimg" name="logoimg"  onclick = "updatetext('checklogo');"/>
	                                </div>
	                      </div>
	                    <small class="help-block">填写图片的URL，默认值：<code>./assets/img/logo.png</code>或<code><?php echo siteurl()?>/assets/img/logo.png</code>或从<code>本地上传</code></small>
	                      </div>
	                     <div class="form-group">
	                      <label for="web_site_background">网站背景</label>
	                      <div class="input-group">
	                        <input type="text" class="form-control" name="background" accept="image/png,image/jpeg" id="web_site_background" value="<?php echo $conf['background']?>" />
	                        <div class="input-group-btn">
	                              <label  class="btn btn-default" id="checkbackground" for="backgroundimg" type="button">选择图片</label > 
	                               <input type="file" style="display:none" accept="image/png,image/jpeg" id="backgroundimg" name="backgroundimg" onclick = "updatetext('checkbackground');"/>
	                             </div></div>
	                              <small class="help-block">填写图片的URL，留空默认值：<code>./assets/img/background.jpg</code>，或<code><?php echo siteurl()?>/assets/img/background.jpg</code>或从<code>本地上传</code><br>设置Bing每日壁纸：<a href="https://blog.lylme.com/archives/lylme_spage.html#bing" target="_blank">查看教程</a></small>
	                     </div>
	                    <div class="form-group">
	                      <label for="web_site_keywords">站点关键词</label>
	                      <input class="form-control" type="text" id="web_site_keywords" name="keywords" value="<?php echo $conf['keywords']?>" placeholder="请输入站点关键词" >
	                      <small class="help-block">网站搜索引擎关键字</small>
	                    </div>
	                    <div class="form-group">
	                      <label for="web_site_description">站点描述</label>
	                      <textarea class="form-control" id="web_site_description" rows="5" name="description" placeholder="请输入站点描述" ><?php echo $conf['description']?></textarea>
	                      <small class="help-block">网站描述，有利于搜索引擎抓取相关信息</small>
	                    </div>
	                    <div class="form-group" id='apply'>
	                      <label class="btn-block" for="web_yan_status">申请收录</label>
	                      <label class="lyear-switch switch-solid switch-cyan">
	                    <select class="form-control" name="apply">';
                        <option <?php if($conf['apply'] == 0) echo 'selected="selected"'; ?> value="0">开启-需要审核</option>
                        <option <?php if($conf['apply'] == 1) echo 'selected="selected"'; ?> value="1">开启-无需审核</option>
                        <option <?php if($conf['apply'] == 2) echo 'selected="selected"'; ?> value="2">关闭-关闭申请</option>
                    </select>  
                      </label>
                      <small class="help-block">申请收录开关，地址：<code><?php echo siteurl()?>/apply</code>前往<a href="/apply" target="_blank">申请收录</a>提交页</small>
                    </div>                   
                   <div class="form-group">
                      <label for="web_site_home-title">首页提示语</label>
                      <textarea type="text" class="form-control" name="home-title" placeholder="请输入首页提示语，支持HTML代码"><?php echo $conf['home-title']?></textarea>
               <small class="help-block">首页提示语，<code>支持HTML代码</code> <a href="https://blog.lylme.com/archives/lylme_spage.html#hometitle" target="_blank">查看效果演示</a></small>
                    </div>    
                    <div class="form-group">
                      <label for="web_site_copyright">底部版权</label>
                      <textarea type="text" class="form-control" name="copyright" placeholder="请输入版权信息，支持HTML代码"><?php echo $conf['copyright']?></textarea>
               <small class="help-block">显示在首页底部的版权提示，<code>支持HTML代码</code></small>
                    </div>
                 <div class="form-group">
                      <label for="web_site_wztj">统计代码</label>
                      <textarea type="text" class="form-control" name="wztj" placeholder="请输入网站统计代码，支持HTML代码"><?php echo $conf['wztj']?></textarea>
               <small class="help-block">网站统计代码，<code>支持HTML代码</code> <a href="https://blog.lylme.com/archives/lylme_spage.html#wztj" target="_blank">查看教程</a></small>
                    </div>    
                    <div class="form-group">
                      <label for="web_site_icp">备案号</label>
                      <input class="form-control" type="text" id="web_site_icp" name="icp" value="<?php echo $conf['icp']?>" placeholder="请输入备案号，留空首页不显示备案信息" >
                    </div>
	                    <div class="form-group">
	                      <label class="btn-block" for="web_yan_status">模板设置</label>
	                      <label class="lyear-switch switch-solid switch-cyan">
	                    <select class="form-control" name="template">';
                        <option <?php if($conf['template'] == 'default') echo 'selected="selected"';?> value="default">default</option>
                        <option <?php if($conf['template'] == 'lylme') echo 'selected="selected"'; ?> value="lylme">lylme</option>
                    </select>  
                      </label>
                    </div> 
                    <div class="form-group">
                      <label class="btn-block" for="web_yan_status">随机一言开关</label>
                      <label class="lyear-switch switch-solid switch-cyan">
                        <input type="checkbox" <?php if($conf['yan']!='false')echo 'checked="checked"';?> name="yan" value="true">
                        <span></span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="btn-block" for="web_tq_status">天气显示开关</label>
                      <label class="lyear-switch switch-solid switch-primary">
                        <input type="checkbox" <?php if($conf['tq']!='false')echo 'checked="checked"';?> name="tq" value="true">
                        <span></span>
                      </label>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">保 存</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--End 页面主要内容-->
<?php 
}
include './footer.php';
?>