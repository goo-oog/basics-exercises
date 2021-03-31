<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

use Registry\App\Services\PersonsDataManagementService;

class AppController
{
    private PersonsDataManagementService $personsService;

    public function __construct(PersonsDataManagementService $personsService)
    {
        $this->personsService = $personsService;
    }

    public function showMainPage(): void
    {
        $this->personsService->showMainPage();
    }

    public function showEditAddressForm(): void
    {
        $this->personsService->showEditAddressForm();
    }

    public function editAddress(): void
    {
        $this->personsService->editAddress();
    }

    public function showEditNoteForm(): void
    {
        $this->personsService->showEditNoteForm();
    }

    public function editNote(): void
    {
        $this->personsService->editNote();
    }

    public function deletePerson(): void
    {
        $this->personsService->deletePerson();
    }

    public function showAddPersonForm(): void
    {
        $this->personsService->showAddPersonForm();
    }

    public function addPerson(): void
    {
        $this->personsService->addPerson();
    }
}