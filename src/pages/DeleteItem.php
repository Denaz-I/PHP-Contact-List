<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\RedirectResponse;
use Denib\Rubrica\Request;
use Denib\Rubrica\Response;
use Denib\Rubrica\App;
use Denib\Rubrica\repository\RepositoryContract;

class DeleteItem implements ActionContract{

    public function respond(Request $request): Response{

        $repository =  App::getService(RepositoryContract::class);

        $deleteId = $request->item;

        $repository->delete($deleteId);
    
        return new RedirectResponse("/");
    }

}