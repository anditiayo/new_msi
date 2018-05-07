<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

					<div class="auth_choice">
						<div class="auth_user">
							<h3>{user_fullname}</h3>
						</div>

						<?php
							echo anchor('backend', 'Dashboard');
							echo anchor('auth/logout', 'Log Out');
							//echo anchor('/', 'Site Web');
						?>
					</div>
