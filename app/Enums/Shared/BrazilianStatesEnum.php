<?php

namespace App\Enums\Shared;

enum BrazilianStatesEnum: int
{
    case AC = 12;
    case AL = 27;
    case AP = 16;
    case AM = 13;
    case BA = 29;
    case CE = 23;
    case DF = 53;
    case ES = 32;
    case GO = 52;
    case MA = 21;
    case MT = 51;
    case MS = 50;
    case MG = 31;
    case PA = 15;
    case PB = 25;
    case PR = 41;
    case PE = 26;
    case PI = 22;
    case RJ = 33;
    case RN = 24;
    case RS = 43;
    case RO = 11;
    case RR = 14;
    case SC = 42;
    case SP = 35;
    case SE = 28;
    case TO = 17;

    public function getName(): string
    {
        return match($this) {
            static::AC => 'Acre',
            static::AL => 'Alagoas',
            static::AP => 'Amapá',
            static::AM => 'Amazonas',
            static::BA => 'Bahia',
            static::CE => 'Ceará',
            static::DF => 'Distrito Federal',
            static::ES => 'Espírito Santo',
            static::GO => 'Goiás',
            static::MA => 'Maranhão',
            static::MT => 'Mato Grosso',
            static::MS => 'Mato Grosso do Sul',
            static::MG => 'Minas Gerais',
            static::PA => 'Pará',
            static::PB => 'Paraíba',
            static::PR => 'Paraná',
            static::PE => 'Pernambuco',
            static::PI => 'Piauí',
            static::RJ => 'Rio de Janeiro',
            static::RN => 'Rio Grande do Norte',
            static::RS => 'Rio Grande do Sul',
            static::RO => 'Rondônia',
            static::RR => 'Roraima',
            static::SC => 'Santa Catarina',
            static::SP => 'São Paulo',
            static::SE => 'Sergipe',
            static::TO => 'Tocantins',
        };
    }

    public function getShortName(): string
    {
        return match($this) {
            static::AC => 'AC',
            static::AL => 'AL',
            static::AP => 'AP',
            static::AM => 'AM',
            static::BA => 'BA',
            static::CE => 'CE',
            static::DF => 'DF',
            static::ES => 'ES',
            static::GO => 'GO',
            static::MA => 'MA',
            static::MT => 'MT',
            static::MS => 'MS',
            static::MG => 'MG',
            static::PA => 'PA',
            static::PB => 'PB',
            static::PR => 'PR',
            static::PE => 'PE',
            static::PI => 'PI',
            static::RJ => 'RJ',
            static::RN => 'RN',
            static::RS => 'RS',
            static::RO => 'RO',
            static::RR => 'RR',
            static::SC => 'SC',
            static::SP => 'SP',
            static::SE => 'SE',
            static::TO => 'TO',
        };
    }

    public function getRegion(): string
    {
        return match($this) {
            static::AC => 'Norte',
            static::AL => 'Nordeste',
            static::AP => 'Norte',
            static::AM => 'Norte',
            static::BA => 'Nordeste',
            static::CE => 'Nordeste',
            static::DF => 'Centro-Oeste',
            static::ES => 'Sudeste',
            static::GO => 'Centro-Oeste',
            static::MA => 'Nordeste',
            static::MT => 'Centro-Oeste',
            static::MS => 'Centro-Oeste',
            static::MG => 'Sudeste',
            static::PA => 'Norte',
            static::PB => 'Nordeste',
            static::PR => 'Sul',
            static::PE => 'Nordeste',
            static::PI => 'Nordeste',
            static::RJ => 'Sudeste',
            static::RN => 'Nordeste',
            static::RS => 'Sul',
            static::RO => 'Norte',
            static::RR => 'Norte',
            static::SC => 'Sul',
            static::SP => 'Sudeste',
            static::SE => 'Nordeste',
            static::TO => 'Norte',
        };
    }
}
