<?php

namespace App\Enums\Shared;

enum GenderEnum: int
{
    case MAN_CISGENDER = 1;
    case WOMAN_CISGENDER = 2;
    case MAN_TRANSGENDER = 3;
    case WOMAN_TRANSGENDER = 4;
    case PEOPLE_NOT_BINARY = 5;
    case OTHERS = 99;

    public function getName(): string
    {
        return match($this) {
            static::MAN_CISGENDER => 'Homem Cisgênero',
            static::WOMAN_CISGENDER => 'Mulher Cisgênero',
            static::MAN_TRANSGENDER => 'Homem Transgênero',
            static::WOMAN_TRANSGENDER => 'Mulher Transgênero',
            static::PEOPLE_NOT_BINARY => 'Pessoa Não Binária',
            static::OTHERS => 'Outros',
        };
    }

    public function getDescription(): string
    {
        return match($this) {
            static::MAN_CISGENDER => 'É uma pessoa de gênero correspondente ao sexo que lhe foi atribuído no nascimento',
            static::WOMAN_CISGENDER => 'É uma pessoa de gênero correspondente ao sexo que lhe foi atribuído no nascimento',
            static::MAN_TRANSGENDER => 'É uma pessoa que nasceu com sexo designado feminino, porém identifica-se como masculino',
            static::WOMAN_TRANSGENDER => 'É uma pessoa que nasceu com sexo designado masculino, porém identifica-se como feminino',
            static::PEOPLE_NOT_BINARY => 'É uma pessoa cuja identidade de gênero não se encaixa estritamente nas categorias tradicionais de masculino ou feminino',
            static::OTHERS => 'Se você não se identificar com nenhuma das opções acima, simplesmente selecione essa alternativa',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn ($gender) => [
            'id' => $gender->value,
            'name' => $gender->getName(),
        ], static::cases());
    }
}
