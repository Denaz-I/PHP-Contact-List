<?php

namespace Denib\Rubrica\repository\json;

use Denib\Rubrica\repository\RepositoryContract;

class ContactRepository implements RepositoryContract {

    private string $fileName = "contacts.json";

    private string $folderPath = __DIR__ . '/data/';

    private string $filePath;

    public function __construct()
    {
        $this->filePath = $this->folderPath . $this->fileName;
    }


	public function createContainer(): void {

        if(!file_exists($this->folderPath)) {
            mkdir($this->folderPath, permissions:0777, recursive:true);
        }
            
        if(!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode(new \stdClass()));
        }

	}

	public function save( $data ): void {
	}

	public function delete( mixed $id ): void {
	}

	public function get( mixed $id ) {
	}

	public function all(): array {
	}

	public function search( callable $predicate ): array {
	}
	private function getCollection(): mixed {
	}
	public function updateCollection( mixed $collection ): void {
	}
    
}