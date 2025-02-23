<?php

namespace App\Http\Controllers\Tenant\Customer;

use App\Models\Customer\Customer;
use App\Services\Customer\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class PasswordController
{
    public function __construct(
        private readonly CustomerService $service
    ) {}
    
    public function edit(Customer $customer): View
    {
        return view('tenant.customers.password', [
            'customer' => $customer,
            'agent' => (object) $this->service->getAgent($customer),
        ]);
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $customer->update([
            'password' => $request->new_password
        ]);

        return redirect()
            ->route('customers.index')
            ->withSuccess("Senha <strong>atualizada</strong> com sucesso!");
    }
}
