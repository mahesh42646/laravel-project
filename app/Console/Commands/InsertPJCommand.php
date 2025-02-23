<?php

namespace App\Console\Commands;

use App\Enums\Shared\ActiveEnum;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use Illuminate\Console\Command;

final class InsertPJCommand extends Command
{
    protected $signature = 'cultural:insertpj';
    protected $description = 'Verifica e insere os PJS nos projetos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $customers = Customer::query()
            ->where('type', 'PJ')
            ->where('is_active', ActiveEnum::ACTIVE)
            ->get();

        foreach ($customers as $customer) {
            $project = Project::firstWhere('customer_id', $customer->id);
            $project->update([
                'customer_company_name' => $customer->company_name,
                'customer_cnpj' => $customer->cnpj,
                'type_people' => 'PJ'
            ]);
        }

        $this->info('Alterações realizadas com sucesso!');

        return Command::SUCCESS;
    }
}
