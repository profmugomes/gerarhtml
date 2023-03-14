<?php
/**
 * Gerar HTML - Gera códigos HTML com facilidade
 * PHP Version 8.
 *
 * @see https://github.com/profmugomes/gerarhtml/ The GerarHTML GitHub project
 *
 * @author Murilo Gomes <contatoprofmugomes@gmail.com>
 * @copyright 2023 Murilo Gomes
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU GENERAL PUBLIC LICENSE
 * @note This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace GerarHTML;

class gerarhtml
{
    /* Tags que não fecham */
    private $naofecha = ['meta', 'input', 'br'];
    private $atributosemvalor = ['required'];

    public function __call($elemento, $argumentos)
    {
        /* Armazena o Conteudo */
        $sArgumento = '';
        $sAtributos = '';
        foreach ($argumentos as $conteudo) {
            if (is_array($conteudo)) {
                foreach ($conteudo as $atributo => $valor) {
                    if ($this->procurarValores($atributo, $this->atributosemvalor)) {
                        $sAtributos .= ' ' . $atributo;
                    } else {
                        $sAtributos .= ' ' . $atributo . '="' . $valor . '"';
                    }
                }
            } else {
                $sArgumento .= $conteudo . "\n";
            }
        }

        /* Procura se o elemento não fecha */
        if ($this->procurarValores($elemento, $this->naofecha) !== false) {
            /* Retorna esse código caso o elemento não possa ser fechado */
            return '<' . $elemento . $sAtributos . '>' . $sArgumento . "\n";
        } else {
            /* Retorna esse código caso o elemento possa ser fechado */
            return '<' . $elemento . $sAtributos . '>' . $sArgumento . '</' . $elemento . '>' . "\n";
        }
    }

    /* Retorna o DOCTYPE HTML5 */
    public function doctype() {
        return '<!DOCTYPE html>' . "\n";
    }

    /* Procura os Valores do Array */
    private function procurarValores(string $palavra, mixed $itens): bool
    {
        if (!is_array($itens)) {
            $aItens = array($itens);
        } else {
            $aItens = $itens;
        }

        foreach ($aItens as $valor) {
            if (strpos($palavra, $valor, 0) !== false) {
                /* Retorna o primeiro resultado e encerra a procura */
                return true;
            }
        }
        return false;
    }
}