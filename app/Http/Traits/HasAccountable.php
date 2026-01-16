<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

/**
 * Trait for handling CRUD operations on models with polymorphic accounts.
 * Used by AdminController, TeacherController, and StudentController.
 */
trait HasAccountable
{
    /**
     * Store a new accountable model with its account.
     *
     * @param  Request  $request
     * @param  string  $modelClass
     * @param  array  $modelFields
     * @param  string  $successMessage
     * @param  string  $redirectRoute
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function storeAccountable(
        Request $request,
        string $modelClass,
        array $modelFields,
        string $successMessage,
        string $redirectRoute
    ) {
        $model = $modelClass::create($request->only($modelFields));
        $model->account()->create($request->only('email', 'password'));

        toast($successMessage, 'success');

        return redirect()->route($redirectRoute);
    }

    /**
     * Update an accountable model and its account.
     *
     * @param  Request  $request
     * @param  mixed  $model
     * @param  array  $modelFields
     * @param  string  $successMessage
     * @param  string  $redirectRoute
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updateAccountable(
        Request $request,
        $model,
        array $modelFields,
        string $successMessage,
        string $redirectRoute
    ) {
        $model->update($request->only($modelFields));
        $model->account->update($request->only('email'));

        if ($request->filled('password')) {
            $model->account->update(['password' => $request->input('password')]);
        }

        toast($successMessage, 'success');

        return redirect()->route($redirectRoute);
    }

    /**
     * Delete an accountable model and its account.
     *
     * @param  mixed  $model
     * @param  string  $successMessage
     * @param  string  $redirectRoute
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyAccountable(
        $model,
        string $successMessage,
        string $redirectRoute
    ) {
        $model->account->delete();
        $model->delete();

        toast($successMessage, 'success');

        return redirect()->route($redirectRoute);
    }
}
