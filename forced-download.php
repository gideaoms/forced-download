<?php
class ForcedDownload {

	function __construct() {
		$arquivo = filter_input(INPUT_GET, 'file_name', FILTER_DEFAULT);
		if ($arquivo && file_exists($arquivo)) :		    
		    $this->setHeaders();
			$this->readFile($arquivo);
		else :
		    echo 'Arquivos não encontrado';
		endif;
	}

	private function setHeaders() {
		header("Content-Type: application/octet-stream");
	    header("Content-Length: " . filesize($arquivo));
	    header("Content-Disposition: attachment; filename=" . basename($arquivo));
	}

	private function readFile($file) {
		readfile($file);
	}
}

new ForcedDownload();