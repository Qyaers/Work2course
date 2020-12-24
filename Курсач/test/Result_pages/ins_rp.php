<?php
		$enum_right_ansvers = $DB->getEnumRightAnsvers($user,$ins_th);
		$db_inser_rp = $DB->setResultsPeoples($id_user,$ins_th,$enum_right_ansvers);
		echo $enum_right_ansvers;
		header('location: Result_test1.php');
		?>