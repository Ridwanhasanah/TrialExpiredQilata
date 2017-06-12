<?php
add_action( 'admin_notices', 'rhnotice' );
function rhnotice() {

	$blogs_id = get_current_blog_id();
	$user_id  = get_current_user_id();
	
	global $wpdb;
	$table = $wpdb->prefix."blogs";
	//menamplikan data di field upgrade
	$upgradeid = $wpdb->get_results("SELECT upgrade FROM wp_blogs WHERE blog_id = $blogs_id ");
	
	$upgrade = $upgradeid[0]->upgrade;/*menampilkan data dari array object*/
	$qilata = 'qilata';

	$users = $wpdb->get_results("SELECT registered FROM wp_blogs WHERE blog_id = $blogs_id ");
	/*$id = $blogs_id == 1|| $blogs_id == 3 || $blogs_id == 36 ||$blogs_id == 37||$blogs_id == 39 ||$blogs_id == 40||$blogs_id == 41||$blogs_id == 42||$blogs_id == 43||$blogs_id == 44||$blogs_id == 45||$blogs_id == 46||$blogs_id == 47||$blogs_id ==54 ||$blogs_id == 55||$blogs_id ==56 ||$blogs_id == 57 ||$blogs_id == 58 ||$blogs_id == 59;*/
	//require_once ( plugin_dir_path(__FILE__ ) . 'Id.php');

	if ($upgrade != $qilata) { //check field upgrade

		if (!empty($users)){

			//$datenow = date("d-m-Y H:i:s"); //tanggal sekarang
			$tgl=$users[0]->registered; //tanggal awal register
			$trial = date('Y-m-d H:i:s',strtotime ( '+14 day' , strtotime ( $tgl ) )) ; //menambah tanggal registered 
			$trial2 = date('d-m-Y', strtotime($trial )); //mengubah format tanggal
			$akhir = new DateTime($trial);
			$awal = new DateTime();
			$selisih =  $akhir->diff($awal)->format("%d hari"); //menampilkan selisih tanggal
			//$selisih = date_diff( $z, $x );
			/*$tanggal = DateTime::createFromFormat('Y-m-d H:i:s', $tgl);
			$tgl2 = new DateTime('-14 days'); 
			$x = $tgl2->setTime(0,0,0); */

			if ($awal > $akhir ) {
				$pass = substr( md5(rand()), 0, 10);
				$update = $wpdb->get_results("UPDATE wp_users SET user_pass='$pass' WHERE ID = '$user_id' ");
				if ($update) {
					echo '';
				}
				?>
				<div id="message" class="error notice notice-error is-dismissible">
					<p><?php _e( 'Masa Trial Anda sudah berakhir.', 'sample-text-domain' ); ?></p>
				</div>
				<?php

			}else{
				?>
				<div id="message" class="error notice notice-error is-dismissible">
					<p><strong><a href="http://localhost/https:/qilata/upgrade/" target="_blank"><?php _e( 'Masa Trial Anda '.$selisih.' lagi, Upgrade sekarang Klik di sini !!! .', 'sample-text-domain' ); ?></a></strong></p>
				</div>
				<?php
			}

		} else
		echo 'user tak terdekteksi';
		

	}
}
?>