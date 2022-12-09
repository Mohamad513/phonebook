<?php

namespace App\Models\Contract;
use App\Models\Contract\BaseModel;

class JsonBaseModel extends BaseModel{

    private $db_folder ;
    private $table_filepathe;

    public function __construct(){
        
        $this->db_folder = BASEPATH . "/storage/jsondb/";
        $this->table_filepathe = $this->db_folder . $this->table . ".json";

    }

    public function read_table() : array{
        $table_data = json_decode(file_get_contents($this->table_filepathe));
        return $table_data ;

    }

    public function write_table(array $data){

        $data_json = json_encode($data);
        file_put_contents($this->table_filepathe,$data_json);

    }

        #create (insert)
    public function create(array $new_data) : int {

        $table_data = $this->read_table();
        $table_data [] = $new_data ;
        $this->write_table($table_data);
        return $new_data[$this->primarykey];

    }

    #read (select) single | multiple
    public function find($id) : object {

        $table_data = $this->read_table();
        foreach($table_data as $row){
            if($row->{$this->primarykey} == $id)
                return $row;

        }


        return (object)[];

    }
    public function get(array $columns,array $where) : array {

        return [];

    }

    #update
    public function update(array $data,array $where) : int {

        return 1;

    }

    #delete
    public function delete(array $where) : int {

        return 1;

    }


}

