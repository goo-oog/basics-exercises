<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

use Registry\App\Services\AppMainService;

class AppController
{
    private AppMainService $personsService;

    public function __construct(AppMainService $personsService)
    {
        $this->personsService = $personsService;
    }

    public function showMainPage(): string
    {
        return $this->personsService->showMainPage();
    }

    public function showEditAddressForm(): string
    {
        return $this->personsService->showEditAddressForm();
    }

    public function editAddress(): void
    {
        $this->personsService->editAddress();
    }

    public function showEditNoteForm(): string
    {
        return $this->personsService->showEditNoteForm();
    }

    public function editNote(): void
    {
        $this->personsService->editNote();
    }

    public function deletePerson(): void
    {
        $this->personsService->deletePerson();
    }

    public function showAddPersonForm(): string
    {
        return $this->personsService->showAddPersonForm();
    }

    public function addPerson(): void
    {
        $this->personsService->addPerson();
    }

    public function login(): string
    {
        return $this->personsService->login();
    }

    public function logout(): void
    {
        $this->personsService->logout();
    }

    public function loginVerify(): void
    {
        $this->personsService->loginVerify();
    }

    public function dashboard(): string
    {
        return $this->personsService->dashboard();
    }
}