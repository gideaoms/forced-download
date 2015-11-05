<?php
class ForcedDownload {

	function __construct() {
		$arquivo = filter_input(INPUT_GET, 'file_name', FILTER_DEFAULT);
		if ($arquivo && file_exists($arquivo)) :		    
		    $this->setHeaders($arquivo);
			$this->readFile($arquivo);
		else :
		    echo 'Arquivos nao encontrado';
		endif;
	}

	private function setHeaders($file) {
		header("Content-Type: application/octet-stream");
	    header("Content-Length: " . filesize($file));
	    header("Content-Disposition: attachment; filename=" . basename($file));
	}

	private function readFile($file) {
		readfile($file);
	}
}

new ForcedDownload();