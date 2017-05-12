<?php
wp_enqueue_style('style', get_template_directory_uri() . 'css/style.css' );



/*===== Kirim Harga Paket =====*/
function rh_pilih_paket(){
	/*===== Menampilkan email =====*/
	global $wpdb;
	$user_id  = get_current_user_id();

	$user_email = $wpdb->get_results("SELECT user_email FROM wp_users WHERE ID = $user_id");
	$umail = $user_email[0]->user_email;
	$user_login = $wpdb->get_results("SELECT user_login FROM wp_users WHERE ID = $user_id");
	$ulog = $user_login[0]->user_login;

	

	if ($user_id) {
		echo 'Nama user : ' . $ulog;
		echo '<br>';
		echo 'Email : ' . $umail;
	}


	?>
	
	<form class="form" action="#" method="post">
		
			
				<legend>Pilih Paket</legend>
				<label>Paket Starter Rp 700.000,- </label><br>
				<input type="radio" value=" Rp 700.000,- " class="form-radio"  name="rd">
			
			
			
				<label>Paket Profesional Rp 2jt </label><br>
				<input type="radio" class="form-radio" checked="checked" value=" Rp 2.000.000,- " name="rd">
			
			
			
				<label>Paket Bisnis Rp 4jt </label><br>
				<input type="radio" class="form-radio" value=" Rp 4.000.000,- " name="rd">
				<br>
				<label>Masukan Nomor Telepon </label>
				<input type="number" name="hp" value="">
			
		<br>
		<input type="submit" name="upgrade">
	</form>

	<?php
	
	if (isset($_POST['upgrade'])) {
  		global $wpdb;
		if (isset($_POST['rd'])){

			$hp = $_POST['hp'];
			$harga=$_POST['rd'];
			echo "Berhasil paket starter";
			//$to =  $_POST['email'];
			$ID = substr( md5(rand()), 0, 10);
			$subject = "Selamat datang di Qilata";
			$body = "
			ID : ".$ID."
			Halo, ".$ulog."
			Terima kasih anda telah melakukan upgrade paket. Tinggal selangkah lagi anda bisa memiliki website yang Kerrren. 
			Silahkan lakukan pembayaran sejumlah:
			".$harga."
			Transfer ke salah satu rekening bank berikut:
			Bank Mandiri
			a.n Heri P
			000 000 0000 0000
			-- atau --
			Bank BCA
			a.n Wahyu Putra
			000 000 0000 0000
			-- atau --
			Bank BNI
			a.n Wahyu Putra
			000 000 0000 0000
			Klik link berikut untuk konfirmasi pembayaran:
			http://www.qilata.com/confirm/
			Kami tunggu anda bergabung dalam keluarga besar Qilata. 
			Bangga menjadi partner digital anda untuk mencapai kesuksesan secara online :)

			Salam sukses, Qilata Team.";

			$headers = 'Billing@qilata.com <qilata@gmail.com>';

			wp_mail($umail, $subject, $body, $headers);
		}
		/*$table = $wpdb->prefix."upgrade";
		$wpdb->query("INSERT INTO wp_upgrade (user_name,user_email,id_confirm) VALUES ('$ulog','$token');");
*/
	}
}

add_shortcode('paket','rh_pilih_paket' );

add_action( 'phpmailer_init', 'sent_mail' );
function sent_mail( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true; // Force it to use Username and Password to authenticate
    $phpmailer->Port = 587;
    $phpmailer->Username = 'sun.rieagain@gmail.com';
    $phpmailer->Password = 'rjnlrdinm';

    // Additional settings…
    $phpmailer->SMTPSecure = "tls"; // Choose SSL or TLS, if necessary for your server
    // $phpmailer->From = "you@yourdomail.com";
    $phpmailer->FromName = "QILATA";
}
?>