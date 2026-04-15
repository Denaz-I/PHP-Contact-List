<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\entity\Contact;
use Denib\Rubrica\repository\RepositoryContract;
use Denib\Rubrica\App;
use Denib\Rubrica\Response;
use Denib\Rubrica\RedirectResponse;
use Denib\Rubrica\Request;

class ProcessForm implements ActionContract{

    public function respond(Request $request): Response {

        $repository = App::getService(RepositoryContract::class);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->surname = $request->lastname;
        $contact->email = $request->email;

        $repository->save($contact);

        return new RedirectResponse("/");
    }
}