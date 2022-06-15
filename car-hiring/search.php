<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
        	<!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div>
                                    Your Searches
                                    <div class="page-title-subheading">Every Search tokens are deducted, while every addition attracts free search tokens
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="<?php echo $_SESSION['business_type']?>" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>    
                        </div>
                    </div>            
                     <!-- DASHEBOARD -->
                    <span class="Dashboard" id="Dashboard"></span>           
                    <!-- DASHEBOARD -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header"><span class="search_modal">Search Client</span>
                                    <div class="btn-actions-pane-right">
                                        
                                        <button class="btn btn-primary search_modal" type="button">Search Client</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="fetch_result"></div>
                                </div>
                                <div class="d-flex justify-content-between card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->    
            </div>
        </div>
    </div>
    <script>
    	$(function(){
    		$("#customersTable").DataTable();
            $(".search_modal").click(function(){
                $("#searchModal").modal('show');
            });

            $("#searchForm").submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url:'includes/searchResult',
                    method:"post",
                    data:formData,
                    beforeSend:function(){

                    },
                    success:function(data){
                        $("#fetch_result").html(data);
                        $("#searchModal").modal('hide');
                        callDashBoard();
                    }
                })
            })
    	})
        callDashBoard();

        function getSearches(){
            var getSearches = 'getSearches';
            $.ajax({
                url:'includes/getSearches',
                method:"post",
                data:{getSearches:getSearches},
                beforeSend:function(){

                },
                success:function(data){
                    $("#fetch_result").html(data);
                    $("#searchModal").modal('hide');
                    callDashBoard();
                }
            })
        }
        getSearches();
    </script>
</body>
</html>
<?php include "modal.php" ?>
