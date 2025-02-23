<?php

namespace App\Console\Commands;

use App\Enums\Shared\RoleEnum;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

final class ResetAppCommand extends Command
{
    protected $signature = 'reset:app';
    protected $description = 'Restaura a aplicação ao seu estado inicial';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // if (! App::environment('local')) {
        //     return $this->messageWarning();
        // }

        $this->clearDatabase();
        $this->createUser();
        $this->createSetting();
        $this->cacheClear();
        $this->clearStorageDirectory();

        return Command::SUCCESS;
    }

    private function clearDatabase()
    {
        $this->warn('Limpando a base de dados, aguarde...');
        $this->output->progressStart(1);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
            DB::statement("TRUNCATE TABLE customers");
            DB::statement("TRUNCATE TABLE customer_social_medias");
            DB::statement("TRUNCATE TABLE editals");
            DB::statement("TRUNCATE TABLE edital_documents");
            DB::statement("TRUNCATE TABLE edital_attachments");
            DB::statement("TRUNCATE TABLE migrations");
            DB::statement("TRUNCATE TABLE notifications");
            DB::statement("TRUNCATE TABLE notification_professionals");
            DB::statement("TRUNCATE TABLE projects");
            DB::statement("TRUNCATE TABLE project_documents");
            DB::statement("TRUNCATE TABLE companies");
            DB::statement("TRUNCATE TABLE tenants");
            DB::statement("TRUNCATE TABLE tenant_user");
            DB::statement("TRUNCATE TABLE users");
            DB::statement("TRUNCATE TABLE settings");
            DB::statement("TRUNCATE TABLE cities");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $this->output->progressFinish();
        $this->info('Base da dados limpa com sucesso!');
    }

    private function createUser(): void
    {
        $this->warn('Criando usuário principal, aguarde...');
        $this->output->progressStart(2);

        User::create([
            'name' => 'DevCactus Tecnologia',
            'gender_id' => 1,
            'email' => 'devcactustecnologia@gmail.com',
            'password' => bcrypt('admin@123456'),
            'role_id' => RoleEnum::MAIN,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->output->progressFinish();
        $this->info('Usuário principal criado com sucesso!');
    }

    private function createSetting(): void
    {
        $this->warn('Criando configurações iniciais do projeto cultura, aguarde...');
        $this->output->progressStart(3);

        Setting::create([
            'name' => 'E-Cultural',
            'cpf' => '000.000.000-00',
            'cnpj' => '00.000.000/0000-00',
        ]);

        $this->output->progressFinish();
        $this->info('Configurações do projeto cultura criadas com sucesso!');
    }

    private function cacheClear()
    {
        $this->warn('Limpando cache das views, configs, rotas e da Facade Cache, aguarde...');
        $this->output->progressStart(4);

        Artisan::call('view:clear');
        $this->output->progressAdvance();

        Artisan::call('config:clear');
        $this->output->progressAdvance();

        Artisan::call('route:clear');
        $this->output->progressAdvance();

        Artisan::call('cache:clear');
        $this->output->progressAdvance();

        $this->output->progressFinish();
        $this->info('Cache limpado com sucesso!');
    }

    private function clearStorageDirectory()
    {
        $this->warn('Limpando arquivos de teste dos diretórios, aguarde...');

        $file = new Filesystem();
        $directories = $file->directories(storage_path('app/public'));

        foreach ($directories as $directory) {
            $file->cleanDirectory($directory);
        }

        $this->info('Diretórios limpos com sucesso!');
    }

    private function messageWarning()
    {
        return $this->warn('Atenção! A restauração da aplicação só pode ser realizada em ambiente local!');
    }
}
