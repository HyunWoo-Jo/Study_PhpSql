<?php
namespace Hanbit;
class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;

    
    public function __construct(\PDO $pdo,string $table,string $primaryKey){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }
    /// 쿼리 실행
    private function query($sql, $parameters = []){
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);

        return $query;
    }
    ///테이블 전체 로우 개수
    public function total(){
        $query = $this->query('SELECT COUNT(*) FROM `'. $this->table .'`');
        $row = $query->fetch();

        return $row[0];
    }
    // ID로 테이블 데이터 가져오기
    public function findById($value){
        $sql = 'SELECT * FROM `'.$this->table.'` WHERE `'.$this->primaryKey.'` = :value';

        $parameters = ['value' => $value];

        $query = $this->query($sql, $parameters);
        
        return $query->fetch();
    }
    // 데이터 삽입
    private function insert($fields){
        $sql = 'INSERT INTO `'.$this->table.'` (';
        foreach($fields as $key => $value){
            $sql .= '`'. $key . '`,';
        }
        $sql = rtrim($sql, `,`);

        $sql .= ') VALUES (';

        foreach($fields as $key => $value){
            $sql .= ':' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ')';

        $fileds = $this->processDates($fields);
        $this->query($sql, $fields);
    }
    // 데이터 수정
    private function update($fields){
        $sql = 'UPDATE `' . $this->table . '` SET ';
        foreach ($fields as $key => $value){
            $sql .= '`' . $key . '` = :' . $key . ','; 
        }

        $sql = rtrim($sql, ',');

        $sql .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

        $fields['primaryKey'] = $fields['id'];
        
        $fields = $this->processDates($fields);
        
        $this->query($sql, $fields);
    }
    //데이터 삭제
    public function delete($id){
        $parameters = [':id' => $id];
        $this->query('DELETE FROM`'. $this->table . '` WHERE `'. $this->primaryKey . '` = :id', $parameters);
    }
    //모든 데이터 가져오기
    public function findAll(){
        $sql = 'SELECT * FROM `'. $this->table. '`';
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    //날짜 형식 처리
    private function processDates($fields){
        foreach ($fields as $key => $value){
            if($value instanceof DateTime){
                $fields[$key] = $value->format('Y-m-d H:i:s');
            }
        }
        return $fields;
    }

    public function save($record){
        try{
            if($record[$this->primaryKey] == '') {
                $record[$this->primaryKey] = null;
            }
            $this->insert($this->table, $record);
        } catch(PDOException $e){
            $this->update($this->table, $this->primaryKey, $record);
        }
    }
}
