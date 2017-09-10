<?php
namespace OCFram;

class test {
	public function __construct() {
		echo 'bonjou je vais bien je suis la page teste';
 // todo PHP7 n'est pas activer chez ovh genere un parse error
        var_dump('291' == '291'); // TRUE
        var_dump('ok' == 'omk'); // FALSE
	}
}

