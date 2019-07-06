<?php
namespace app\pdo;

class MyPdo
{
    private $pdo;
    public $table;
    public $field = '*';
    public $where;
    public $limit;
    public $sql;

    /**
     * MyPdo constructor.
     * @param $dsn  数据源
     * @param $user  数据库用户名
     * @param $userpasswd
     * @throws \Exception
     */
    public function __construct($dsn, $user, $userpasswd)
    {
        try {
            $this->pdo = new \PDO($dsn, $user, $userpasswd);
            $this->pdo->exec('SET NAMES UTF8');
        } catch (\Exception $e) {
            throw new \Exception('connect fail. ' . $e->getMessage());
        }
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function field($fields = '*')
    {
        $this->field = $fields;
        return $this;
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * 查多条数据
     *
     * @return array
     */
    public function select()
    {
        $this->createSql();
        $pdostmt = $this->pdo->prepare($this->sql);
        $result = $pdostmt->execute();
        $pdostmt->setFetchMode(\PDO::FETCH_BOTH);
        $rows  = $pdostmt->fetchAll();
        return $rows;
    }

    /**
     * 查询单条数据
     */
    public function find()
    {
        $this->createSql();
        $pdostmt = $this->pdo->prepare($this->sql);
        $result = $pdostmt->execute();
        $pdostmt->setFetchMode(\PDO::FETCH_BOTH);
        $row = $pdostmt->fetch();
        return $row;
    }

    /**
     * 拼接SQL
     */
    public function createSql()
    {
        $this->sql = "SELECT " . $this->field . " FROM " . $this->table;

        if (!empty($this->where)) {
            $this->sql .= " WHERE " . $this->where;
        }

        if (!empty($this->limit)) {
            $this->sql .= " LIMIT " . $this->limit;
        }

    }

}
