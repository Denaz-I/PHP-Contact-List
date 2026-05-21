<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\App;
use Denib\Rubrica\Response;
use Denib\Rubrica\RedirectResponse;
use Denib\Rubrica\Request;
use Denib\Rubrica\UploadManagerContract;
use Denib\Rubrica\entity\Contact;
use Denib\Rubrica\repository\RepositoryContract;

class ProcessForm implements ActionContract{

    public function respond(Request $request): Response{

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->surname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->additionalInfo = $request->additionalInfo;
        $contact->company = $request->company;

		// USO IL SERVIZIO!!!
	    $uploadManager =  App::getService(UploadManagerContract::class);
	    $picture = $uploadManager->manage($request);
		$contact->picture = $picture;
        
        $repository =  App::getService(RepositoryContract::class);
        $repository->save($contact);
    
        return new RedirectResponse("/");
    }
}