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


	$dbemail = $wpdb->get_results("SELECT * FROM wp_upgrade WHERE user_email = '$umail';");
		
/*========== Menampilkan User dan Email Custoomer =========*/
	if ($user_id) {

    ?>
    <p><b>User Name  : <?= $ulog;?></b></p>
    <p><b>User Email : <?= $umail; ?></b></p>
    <br>
    <?php
	}
/* ======= include file PageUpgrade.php ========*/
require_once 'template/PageUpgrade.php';
	
	if (isset($_POST['upgrade'])) {
  		global $wpdb;

  		$hp = $_POST['hp'];
  		$harga=$_POST['rd'];


  		if (!empty($dbemail)) {
  			echo "<b>Anda Telah menupgrade sebelumnya</b>";
  		}elseif(strlen($hp) == 0 ){
  			?>
  			
  			<p><strong> Maaf Nomor Handphone belum di isi. </strong></p>
  			
  			<?php
  		}elseif(strlen($hp) < 11){
        ?><p><strong> Maaf Nomor Handphone Tidak Valid. </strong></p><?php
      }else{


  			if (isset($harga)){

  				
				//require_once '/template/emailtemplate.php';
				//global $message;

				$datenow = date_default_timezone_set('Asia/Jakarta');
				$datenow = date("d F Y");
  				$ID = substr( md5(rand()), 0, 10);
          
  				$subject = "Pembayaran Upgrade Paket Qilata";

  				/*==================== Content Email =========================*/
  				$body = 
  				'
<html>
   <head>
      <style>
         .banner-color {
         background-color: #eb681f;
         }
         .title-color {
         color: #0066cc;
         }
         .button-color {
         background-color: #0066cc;
         }
         @media screen and (min-width: 500px) {
         .banner-color {
         background-color: #0066cc;
         }
         .title-color {
         color: #eb681f;
         }
         .button-color {
         background-color: #eb681f;
         }
         }
      </style>
   </head>
   <body>
      <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
         <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <center style="width:100%">
                        <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
                                    <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="left" valign="middle" width="50%"><span style="margin:0;color:#f00;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px"><b>ID Konfirmasi : '.$ID.'</b></span></td>
                                             <td valign="middle" width="50%" align="right" style="padding:0 0 0 10px"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">'.$datenow.'</span></td>
                                             <td width="1">&nbsp;</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <tbody>
                                          <tr>
                                             <td width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%">
                                                                        <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px"><b>UPGRADE PAKET QILATA</b></h1>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td align="center" style="padding:20px 0 10px 0">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                        <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">Hi '.$ulog.',</h3>
                                                                        <p style="margin: 20px 0 30px 0;font-size: 15px;text-align: left;"> Terima kasih anda telah melakukan upgrade paket. Tinggal selangkah lagi anda bisa memiliki website yang Elegant dan Profesional. 
  				Silahkan lakukan pembayaran sejumlah:
  				'.$harga.'
  				Transfer ke rekening bank berikut:<br><br>
  				<b>a.n ERDINI ENGGAR SETYAWATY<br>
  				BNI<br></b>
  				<a href="#"><b>035-838-1432</b></a><br><br>
  				Silahkan klik tombol untuk konfirmasi</p>
                                                                        <div style="font-weight: 200; text-align: center; margin: 25px;"><a target="_blank" href="http://www.qilata.com/confirm/" style="padding:0.6em 1em;border-radius:600px;color:#ffffff;font-size:14px;text-decoration:none;font-weight:bold" class="button-color">Konfirmasi</a></div>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td align="left">
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="center" width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px">Regards,
                                                            <br><b>Qilata Team</b>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td align="center" width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </center>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </body>
</html>
';

  				$headers[] = 'Billing@qilata.com <qilata@gmail.com>';
  				$headers[] = "Content-Type: text/html; charset=UTF-8";

  				wp_mail($umail, $subject, $body, $headers);

  				/*======= Input data ke database =======*/
  				$table = $wpdb->prefix."upgrade";
  				$wpdb->query("INSERT INTO wp_upgrade ( user_name,user_email,hp,id_confirm,registered) 
  					VALUES ('$ulog','$umail','$hp','$ID','');");
  				?>
          <script type="text/javascript">
              alert('Silahkan Periksa Email Anda, Kami telah mengirim email Upgrade untuk Anda.');
              window.location ="http://www.qilata.com";
          </script>
          <?php
  			}
  		}
	}
}

add_shortcode('paket','rh_pilih_paket' );

add_action( 'phpmailer_init', 'sent_mail' );
function sent_mail( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true; // Force it to use Username and Password to authenticate
    $phpmailer->Port = 587;
    $phpmailer->Username = 'qilata@gmail.com';
    $phpmailer->Password = 'adminqilata17';

    // Additional settings…
    $phpmailer->SMTPSecure = "tls"; // Choose SSL or TLS, if necessary for your server
    // $phpmailer->From = "you@yourdomail.com";
    $phpmailer->FromName = "QILATA";
}


?>