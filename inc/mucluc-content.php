<?php
// dua muc luc vao content
function Mucluc_tobot_add_content($content) {
global $mucluc_options;
if(is_singular('post')) {
ob_start();
?>
<div id="mucluc-content" class="mucluc-content <?php echo $mucluc_options['theme']; ?>">
<div class="anhien"><div class="td-tocbot <?php echo $mucluc_options['theme']; ?>"><?php if($mucluc_options['title-name'] == ""){ echo __('Table of Contents','muc-luc'); } else { echo $mucluc_options['title-name'];} ?></div><div class="nutanhien"><a id="nuttocbot" class="nuttocbot <?php echo $mucluc_options['theme']; ?>" onclick="muclucan()"><?php echo __('Hide','muc-luc'); ?> <img title="" class="muiten" style="margin:0px;padding:0px;border:0px;display:initial;max-width:15px;width:15px;vertical-align: revert;" src="<?php echo plugins_url('img/mucluc-an.svg', __FILE__); ?>" width="15px" /></a><a id="nuttocbot2" class="nuttocbot2 <?php echo $mucluc_options['theme']; ?>" style="display:none" onclick="mucluchien()"><?php echo __('Show','muc-luc'); ?> <img title="" class="muiten" style="margin:0px;padding:0px;border:0px;display:initial;max-width:15px;width:15px;vertical-align: revert;" src="<?php echo plugins_url('img/mucluc-hien.svg', __FILE__); ?>" width="15px" /></a></div></div>
<aside id="tocbottren" class="toc"></aside>
</div>
<!-- menu toc danh muc o bai viet -->
<?php if($mucluc_options['enable'] == false) { ?>
<div id="mucluc-icon" class="mucluc-icon <?php echo $mucluc_options['theme']; ?>">
<button id="menutoc" style="display:none"><img title="" style="vertical-align: revert;margin:0px;padding:0px;border:0px;display:initial;max-width:30px;" src="<?php echo plugins_url('img/mucluc_list.png', __FILE__); ?>" width="30px" /></button>
<div id="hientoc" class="toccao">
	<div class="toccao-content <?php echo $mucluc_options['theme']; ?>">
		<div class="td-and-close"><div class="td-tocbot <?php echo $mucluc_options['theme']; ?>"><?php if($mucluc_options['title-name'] == ""){ echo __('Table of Contents','muc-luc'); } else { echo $mucluc_options['title-name'];} ?></div><div style="text-align: right;" class="menuclose">&times;</div></div>
		<div class="baotocbot"><aside id="tocbot" class="tocbot"></aside></div>
	</div>
 </div>
</div>
<?php } ?>
<?php
$mucluc_showmenu = ob_get_clean();
return $mucluc_showmenu . "<div class='noidungtoc'>" . $content . "</div>";
}else {
return $content;
}
}
add_filter('the_content', 'Mucluc_tobot_add_content');
