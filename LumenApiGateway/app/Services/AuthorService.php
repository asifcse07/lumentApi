<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

Class AuthorService{

	use ConsumesExternalService;

	public $baseUri;
	public $secret;

	public function __construct(){
		$this->baseUri = config('services.authors.base_uri');
		$this->secret = config('services.authors.secret');
	}

	public function obtainAuthors(){
		return $this->performRequest('GET', '/authors');
	}

	public function createAuthor($data){
		return $this->performRequest('POST', '/authors', $data);
	}

	public function obtainAuthor($author){
		return $this->performRequest('GET', "/authors/{$author}");
	}


	public function updateAuthor($data, $author){
		return $this->performRequest('PUT', "/authors/{$author}", $data);
	}

	public function deleteAuthor($author){
		return $this->performRequest('DELETE', "/authors/{$author}");
	}
}