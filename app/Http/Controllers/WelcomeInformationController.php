<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWelcomeInformationRequest;
use App\Models\WelcomeInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WelcomeInformationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateWelcomeInformationRequest $updateWelcomeInformationRequest): RedirectResponse
    {
        $welcome = WelcomeInformation::findOrFail(1);

        $welcome->update($updateWelcomeInformationRequest->validated());

        alert()->success('Information Updated Successfully!');

        return redirect()->route('profile.show');
    }
}
