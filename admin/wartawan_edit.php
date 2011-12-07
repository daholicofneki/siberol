<html>
	<head>
		<title>Wartawan - Edit Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
		<script src="../public/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

	</head>
	<body>
<?php
require_once ('../library/config.php');

if ($_POST)
{
	//if ( $_POST['action'] == 'update' )
	//{
		$DB->query ('UPDATE berita SET
				judul		= "'.$_POST['_judul'].'",
				isi		= "'.$_POST['_isi'].'",
				kategori	= "'.$_POST['cboKategori'].'",
				id_wartawan	= "'.$_SESSION['ID'].'"
			       WHERE idx = '. $_GET['idx']
			      );
	/*}
	else if ( $_POST['action'] == 'delete' )
	{
		$DB->query ('DELETE FROM berita WHERE idx = '. $_GET['idx']);
	}*/
	header( 'Location:wartawan.php' );
}

$data = $DB->get ('SELECT * FROM berita WHERE idx = '. $_GET['idx'] , 'one');
?>

<?php require_once('../library/admin_menu.php') ?>

<div class="container">

	<div class="content">
		<div class="page-header">
			<?php echo TITLE ?>
		</div>
		<div class="row">
			<div class="span12">
				<h2>Edit Berita</h2>
				<form name="berita" action="" method="post">
					<input type="hidden" name="action">
					<ul>
						<li>
							<input type="text" name="_judul" style="width:100%; height:50px" placeholder="Judul berita" value="<?php echo $data->judul ?>">
						</li>
						<li>
							<label>Kategori Berita</label>
							<select name="cboKategori" id="cboKategori">
								<option value="Umum"<?php echo ($data->kategori == 'Umum') ? ' selected': '' ?>>Umum</option>
								<option value="Hidup Sehat"<?php echo ($data->kategori == 'Hidup Sehat') ? ' selected': '' ?>>Hidup Sehat</option>
								<option value="Diabetes"<?php echo ($data->kategori == 'Diabetes') ? ' selected': '' ?>>Diabetes</option>
								<option value="Hipertensi"<?php echo ($data->kategori == 'Hipertensi') ? ' selected': '' ?>>Hipertensi</option>
								<option value="Ibu & Anak"<?php echo ($data->kategori == 'Ibu & Anak') ? ' selected': '' ?>>Ibu & Anak</option>
							</select>
						</li>
						<li>
							<textarea id="elm1" name="_isi" rows="25" style="width: 80%"><?php echo $data->isi ?></textarea>
						</li>
					</ul>
					<div align="center">
						<input type="submit" class="btn primary" value="Update Berita">
						<input type="submit" class="btn danger" value="Hapus">
						<a href="wartawan.php" class="btn">Kembali</a>
					</div>
				</form>
			</div>
			<div class="span4">
				<h3>Menu</h3>
				<ul>
					<li><a href="wartawan_input.php">Input Berita Baru</a></li>
					<li><a href="wartawan.php">Daftar Berita</a></li>
				</ul>
			</div>
		</div>

		<footer>
			<p><?php echo FOOTER ?></p>
		</footer>
	</div>

</div>

	</body>
</html>