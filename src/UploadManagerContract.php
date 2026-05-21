<?php

namespace Denib\Rubrica;

interface UploadManagerContract {
	/**
	 * @param Request $request
	 *
	 * @return string|null
	 */
	public function manage( Request $request ): ?string;
}