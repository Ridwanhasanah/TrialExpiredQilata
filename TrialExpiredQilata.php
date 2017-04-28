<?php
/**
 * Plugin Name: Trial Expired Qilata
 * Plugin URI: http://www.facebook.com/ridwan.hasanah3
 * Description: Trial Expired Qilata
 * Version: 1.0.0
 * Author: Ridwan Hasanah
 * Author URI: http://www.facebook.com/ridwan.hasanah3
 * License: GPL-3.0+
 * License URI: http://www.facebook.com/ridwan.hasanah3
 */

/*========== Nottice Expired Trial ==========*/

add_action( 'admin_notices', 'rhnotice' );
function rhnotice() {

	$blogs_id = get_current_blog_id();
	$user_id  = get_current_user_id();
	$atau = 13 || $user_id == 1;

	global $wpdb;
	$table = $wpdb->prefix."blogs";

	$users = $wpdb->get_results("SELECT registered FROM wp_blogs WHERE blog_id = $blogs_id ");

	if ($blogs_id == 36 ||$blogs_id == 37||$blogs_id == 39 ||$blogs_id == 40||$blogs_id == 41||$blogs_id == 42||$blogs_id == 43||$blogs_id == 44||$blogs_id == 45||$blogs_id == 46||$blogs_id == 47) {
		?>
		<div id="message" class="error notice notice-error is-dismissible">
			<p><?php _e( 'Ini WEBSITE QILATA.', 'sample-text-domain' ); ?></p>
		</div>
		<?php
	}else{

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
					<p><?php _e( 'Masa Trial Anda '.$selisih.' lagi dan  akan berakhir pada tanggal ' . $trial2 . '.', 'sample-text-domain' ); ?></p>
				</div>
				<?php
			}

		} else
		echo 'gagal';
		

	}
}
?>