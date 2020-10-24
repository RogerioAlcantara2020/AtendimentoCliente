<?php 

interface IDAO{
    public function insert(AtendenteVO $dados);
    public function update(AtendenteVO $dados);
    public function delete(AtendenteVO $dados);
    public function getById($id);
    public function getAll();
}