<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="password-reset" class="nav-link">
                            <i class="bi bi-lock"></i>&nbsp; Password Reset
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="submit-new-client" class="nav-link">
                            <i class=" bi bi-plus-circle"></i>&nbsp; Add & Earn Tokens
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="search" class="nav-link">
                            <i class="bi bi-search"></i>&nbsp; Check Client
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../signout" class="nav-link">
                            <div class="badge badge-danger mr-1 ml-0">
                                Sign Out
                            </div>
                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/adminJs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    function successNow(msg){
        toastr.success(msg);
        toastr.options.progressBar = true;
        toastr.options.positionClass = "toast-top-center";
        toastr.options.showDuration = 1000;
    }

    function errorNow(msg){
        toastr.error(msg);
        toastr.options.progressBar = true;
        toastr.options.positionClass = "toast-top-center";
        toastr.options.showDuration = 1000;
    }

    $(function(){
        $(document).on("click", ".our_clients", function(){
            var parent_id = $(this).attr("id");
            // successNow(parent_id);
            window.location = './';
        })
    })
    function callDashBoard(){
        $.ajax({
            url:"dash",
            method:"post",
            data:"navigation=navigation",
            
            success:function(data){
                $("#Dashboard").html(data);
            }
        })
    }
    callDashBoard();
</script>