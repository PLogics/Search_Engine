<?php

class articles
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "search_engine";

    public $result;
    private $conn;
    var $text1;

    function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn) {
            return $this->conn;
        } else {
            echo "Not connected";
        }
    }

    public function search()
    {
        if (isset($_REQUEST['search_keyword'])) {
            $searchname = $_REQUEST['search_keyword'];
            if ($searchname == "") {
                echo "Enter text to search.";
                exit();
            } else {
                $str_array = explode(" ", $searchname);
                $data = array();
                foreach ($str_array as $text) {
                    if ($text) {
                        $query = "select distinct id,title,description from data where title like '%$text%' or description like '%$text%'";
                    } else {
                        $str_array = explode("-", $searchname);
                        $query = "select distinct id,title,description from data where title like '%$text[0]%' or description like '%$text[0]%'";
                    }

                    $result = $this->conn->query($query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                }
                $data = array_values(array_unique($data, SORT_REGULAR));
                foreach ($data as $d) {
                    echo "<br>" . $d['title'] . "<br>" . " " . "<br>" . $d['description']  . "<br>";
                }
            }
        }
    }
}
