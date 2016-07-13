<?php get_header(); ?>
<?php require_once('library/EEDB.class.php'); ?>
            
            <div id="content" class="clearfix row">
            
                <div id="main" class="col col-lg-12 clearfix" role="main">

                    <h1>Employee Directory</h1>

                    <?php
                    $EEDB = new EEDB;
                    ?>

                    <div class="clearfix row">
                        <div class="col col-sm-6">
                            <form method="get" class="form-inline">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Search by first or last name</h3>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" name="search" id="search" placeholder="Search" value="<?php echo !empty($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control">
                                        
                                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"> Search</span></button>
                                        <?php if( !empty($_GET['search']) ) {
                                            echo ' <a href="?"><span class="glyphicon glyphicon-remove"></span> Clear</a>';
                                        } ?>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col col-sm-6">
                            <form method="get" class="form-inline">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Filter by location</h3>
                                    </div>
                                    <div class="panel-body">
                                        <select name="BranchName" class="form-control">
                                            <option value="">- Select Location -</option>
                                            <?php
                                                $allLocations = $EEDB->allLocations();
                                                foreach($allLocations as $location) { ?>
                                                    <option value="<?php echo $location; ?>" <?php echo ($_GET['BranchName'] == $location) ? 'selected' : ''; ?>><?php echo $location; ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                       <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-filter"> Filter</span></button>
                                        <?php if( !empty($_GET['BranchName']) ) {
                                            echo ' <a href="?"><span class="glyphicon glyphicon-remove"></span> Clear</a>';
                                        } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p>
                        <a href="?sortby=name" role="button" class="btn btn-sm btn-primary <?php echo ($_GET['sortby'] == 'name') ? 'disabled' : ''; ?>"><span class="glyphicon glyphicon-sort"></span> Sort by Last Name</a>
                        <a href="?sortby=location" role="button" class="btn btn-sm btn-primary <?php echo ($_GET['sortby'] == 'location' || empty($_GET['sortby'])) ? 'disabled' : ''; ?>"><span class="glyphicon glyphicon-sort"></span> Sort by Location Name</a>
                    </p>

                    <?php
                    //$EEDB->locations($_GET['BranchName']);
                    //$EEDB->results('ORDER BY LN, FN');
                    if( !empty($_GET['search']) ) {
                        echo '<h4>Search results for: <em>'.$_GET['search'].'</em></h4>';
                        $EEDB->search($_GET['search']);
                    } else {
                        if( empty($_GET['sortby']) || $_GET['sortby'] == 'location' ) {
                            $locationFilter = !empty($_GET['BranchName']) ? $_GET['BranchName'] : '';
                            $EEDB->locations($locationFilter);
                        } else if( $_GET['sortby'] == 'name' ) {
                            $EEDB->results('ORDER BY LN, FN');
                        } 
                    }

                    // Good afternoon, Chris.
                    //
                    // The SQL Server name is: ps-daily-rpt
                    // The database name is: pchc
                    // The view name is: EmployeeContactInfo
                    // User name is: Intranet
                    // Password is: Intranet
                    //
                    // Please let me know how you make out.  Thanks!  -Derek

                    ?>
            
                </div> <!-- end #main -->
    
            </div> <!-- end #content -->

<?php get_footer(); ?>