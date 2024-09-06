<?php
class Model{
    protected $id;
    protected $table;
    protected $bd;

    public function __construct(
        $id,
        $table,
        PDO $connection
    ) {
        $this->id = $id;
        $this->table = $table;
        $this->bd = $connection;
    }

    public function getAll() {
        $stm = $this->bd->prepare("select * from {$this->table}");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function getId($id) 
    {
        $stm = $this->bd->prepare("select * from {$this->table} where id = :id");
        $stm->bindValue(':id', $id);
        $stm->execute();
        return $stm->fetch();
    }

    public function store($data) {
        // var_dump($data);

        $sql = "insert into {$this->table} (";
        foreach ($data as $key => $value) {
            // echo ($key."<br>");
            $sql .= "{$key},";
        }
        //Eliminamos el ultimo caracter de la cadena
        $sql = trim($sql, ",");
        $sql .= ") VALUES (";
        
        foreach ($data as $key => $value) {
            $sql .= ":{$key},";
        }

        //Eliminamos el ulrimo caracter de la cadena 
        $sql = trim($sql, ",");
        $sql .= ")";

        $stm = $this->bd->prepare($sql);

        foreach ($data as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }
        $stm->execute();
    }
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET ";
        foreach ($data as $key => $value) {
            $sql.= "{$key} = :{$key},";
        }

        $sql = trim($sql, ' , ');
        $sql.= " WHERE id = :id";
        
        $stm = $this->bd->prepare($sql);

        foreach ($data as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }
        $stm->bindValue(':id', $id);
        var_dump($id, $data);
        var_dump($stm);
        $stm->execute();
    }
    public function delete($id)
    {
        $stm = $this->bd->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stm->bindValue(':id', $id);
        $stm->execute();
    }
}
?>