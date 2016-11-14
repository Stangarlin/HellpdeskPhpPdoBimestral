<?php

namespace classes\dao;

/**
 *
 * @author Aluno
 */
interface CrudGenerico {

    function buscar($chave);

    function listarTodos();

    function inserir($objeto);

    function alterar($objeto);

    function excluir($chave);
}
