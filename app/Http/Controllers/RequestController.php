<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewRequest;
use App\Models\Requests;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class RequestController extends Controller
{
    /**
     * Render form create request
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('RequestForm', []);
    }

    /**
     * Store new request
     * @param CreateNewRequest $createNewRequest
     * @return RedirectResponse
     */
    public function store(CreateNewRequest $createNewRequest): RedirectResponse
    {
        $validate = $createNewRequest->validated();

        Requests::createRequest($validate);

        return to_route('request.list');
    }

    /**
     * List requests
     * @return Response
     */
    public function list(): Response
    {
        $requests = Requests::all()
            ->sortByDesc('created_at')
            ->values();

        return Inertia::render('RequestsList', [
            'requests' => $requests
        ]);
    }
}
