<?php

declare(strict_types=1);

namespace App\Config;

use RuntimeException;

/**
 * Leitor de arquivo .env sem dependência externa.
 *
 * Não sobrescreve variável que já exista no ambiente real (getenv/$_ENV/$_SERVER):
 * assim o container ou o CI podem injetar valor sem editar o arquivo.
 */
final class Ambiente
{
    /** @var array<string, string> */
    private static array $valores = [];

    private static bool $carregado = false;

    /**
     * Carrega o arquivo uma única vez. Ausência do arquivo não é erro — o
     * ambiente pode vir todo de variável exportada.
     */
    public static function carregar(string $arquivo): void
    {
        if (self::$carregado) {
            return;
        }

        self::$carregado = true;

        if (!is_readable($arquivo)) {
            return;
        }

        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($linhas === false) {
            return;
        }

        foreach ($linhas as $linha) {
            $linha = trim($linha);

            if ($linha === '' || str_starts_with($linha, '#') || !str_contains($linha, '=')) {
                continue;
            }

            [$chave, $valor] = explode('=', $linha, 2);

            $chave = trim($chave);
            $valor = trim($valor);

            // Aspas envolvendo o valor são delimitador, não conteúdo.
            if (strlen($valor) >= 2 && ($valor[0] === '"' || $valor[0] === "'") && $valor[-1] === $valor[0]) {
                $valor = substr($valor, 1, -1);
            }

            if ($chave !== '') {
                self::$valores[$chave] = $valor;
            }
        }
    }

    /** Valor da chave, ou o default quando ausente/vazia. */
    public static function obter(string $chave, ?string $default = null): ?string
    {
        foreach ([$_ENV, $_SERVER] as $fonte) {
            if (isset($fonte[$chave]) && is_scalar($fonte[$chave]) && (string) $fonte[$chave] !== '') {
                return (string) $fonte[$chave];
            }
        }

        $doSistema = getenv($chave);

        if (is_string($doSistema) && $doSistema !== '') {
            return $doSistema;
        }

        return self::$valores[$chave] ?? $default;
    }

    /** Igual a obter(), mas estoura quando a chave não está definida. */
    public static function obrigatorio(string $chave): string
    {
        $valor = self::obter($chave);

        if ($valor === null || $valor === '') {
            throw new RuntimeException(
                sprintf('Variável de ambiente %s não definida. Copie .env.example para .env e preencha.', $chave)
            );
        }

        return $valor;
    }
}
