<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\CreateUser\CreateUserInputPort;
use App\Domain\UseCases\CreateUser\CreateUserRequestModel;
use App\Http\Requests\CreateUserRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateUserController extends Controller
{
    private CreateUserInputPort $interactor;
    public function __construct(CreateUserInputPort $interactor) //injeksi AppServiceProvider line 28 "->needs(UseCases\CreateUser\CreateUserInputPort::class)"
    {
        $this->interactor = $interactor;
    }

    public function __invoke(CreateUserRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createUser( //
            new CreateUserRequestModel($request->validate())
        );

        if ($viewModel instanceof HttpResponseViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}