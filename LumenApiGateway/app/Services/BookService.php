<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

Class BookService{

	use ConsumesExternalService;

	public $baseUri;
	public $secret;

	public function __construct(){
		$this->baseUri = config('services.books.base_uri');
		$this->secret = config('services.books.secret');
	}

	


	public function obtainBooks(){
		return $this->performRequest('GET', '/books');
	}

	public function createBook($data){
		return $this->performRequest('POST', '/books', $data);
	}

	public function obtainBook($book){
		return $this->performRequest('GET', "/books/{$book}");
	}


	public function updateBook($data, $book){
		return $this->performRequest('PUT', "/books/{$book}", $data);
	}

	public function deleteBook($book){
		return $this->performRequest('DELETE', "/books/{$book}");
	}
}