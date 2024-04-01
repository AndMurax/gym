                    <?php foreach ($options as $option) : ?>
								<?php 
									$optionID = $option["ID"];
									$optionNome = $option["Nome"];
									$selected = isset($option["ID"]) && $option["ID"] == $optionID ? 'selected': '';
								?>
								<option value="<?= $optionID ?>" <?= $selected ?>><?= $optionNome ?></option>
					<?php endforeach; ?>