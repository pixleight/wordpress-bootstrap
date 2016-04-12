<?php
class EEDB {
    public $link;
    public $query = 'SELECT * FROM EmployeeContactInfo';
    private $queryResults;

    public function __construct() {
        $this->link = $this->dbConnect();
        mssql_select_db('pchc', $this->link);
    }

    public function query($clause = '') {
        if( $clause ) {
            $clause = ' ' . $clause;
        }

        $this->queryResults = mssql_query($this->query . $clause, $this->link, 1000);
    }

    public function results($clause = '') {
        $this->query($clause);
        echo '<div class="table-responsive"><table class="table table-striped table-hover">';
        echo '<thead><tr>';
        //echo '<th>Eenumber</th>';
        echo '<th>Last Name</th>';
        echo '<th>First Name</th>';
        echo '<th>Extension</th>';
        echo '<th>Alternate Extension</th>';
        echo '<th>Email Address</th>';
        echo '<th>Location</th>';
        echo '<th>Position</th>';
        //echo '<th>HomePhone</th>';
        //echo '<th>WorkPhone</th>';
        //echo '<th>CellPhone</th>';
        //echo '<th>PagerPhone</th>';
        echo '</tr></thead><tbody>';
        $this->employees();
        echo '</tbody></table></div>';
    }

    public function allLocations() {
        $locationsResults = mssql_query('SELECT DISTINCT BranchName FROM EmployeeContactInfo');
        while( $location = mssql_fetch_array($locationsResults) ) {
            $locations[] = $location[0];
        }
        return $locations;
    }

    public function locations($locationFilter = '') {
        if($locationFilter) {
            $allLocations[] = $locationFilter;
        } else {
            $allLocations = $this->allLocations();
        }
        foreach( $allLocations as $location ){
            echo '<h2>' . $location . '</h2>';
            $this->results('WHERE BranchName="' . $location . '" ORDER BY LN, FN');
        }
    }

    public function search($search = '') {
        $this->results('WHERE LN LIKE "%' . $search . '%" OR FN LIKE "%' . $search . '%" ORDER BY LN, FN');
    }

    protected function employees() {
        while( $employee = mssql_fetch_assoc($this->queryResults) ) {
            echo '<tr>';
                //echo '<td>' . $employee['Eenumber'] . '</td>';
                echo '<td>' . $employee['LN'] . '</td>';
                echo '<td>' . $employee['FN'] . '</td>';
                echo '<td>' . $employee['Ext1'] . '</td>';
                echo '<td>' . $employee['Ext2'] . '</td>';
                echo '<td><a href="mailto:' . $this->filterEmail($employee['EmailAddress']) . '">' . $this->filterEmail($employee['EmailAddress']) . '</a></td>';
                echo '<td>' . $employee['BranchName'] . '</td>';
                echo '<td>' . $employee['Position'] . '</td>';
                //echo '<td>' . $employee['HomePhone'] . '</td>';
                //echo '<td>' . $employee['WorkPhone'] . '</td>';
                //echo '<td>' . $employee['CellPhone'] . '</td>';
                //echo '<td>' . $employee['PagerPhone'] . '</td>';
            echo '</tr>';
        }
    }

    protected function filterEmail($email) {
        $email = str_replace('@pchcbangor.org', '@pchc.com', $email);
        return $email;
    }

    protected function dbConnect() {
        /** The name of the database */
        $EE_DB_NAME = 'pchc';

        /** SQL database username */
        $EE_DB_USER = 'Intranet';

        /** SQL database password */
        $EE_DB_PASSWORD = 'Intranet';

        /** SQL hostname */
        $EE_DB_HOST = 'ps-daily-rpt.pchc.local';
        $EE_DB_HOST_IP = '10.1.2.35';

        // Connect to MSSQL
        $link = mssql_connect($EE_DB_HOST, $EE_DB_USER, $EE_DB_PASSWORD);
        return $link;
    }
}
