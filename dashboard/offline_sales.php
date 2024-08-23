<?php
include "header.php";
setcookie("edit_Id", "", time() - 3600);
setcookie("view_Id", "", time() - 3600);

if (isset($_REQUEST["flg"]) && $_REQUEST["flg"] == "del") {
    $id = $_REQUEST['sr_no'];

    try {
        $stmt_del = $obj->con1->prepare("DELETE FROM `offline_sales` WHERE sr_no=?");
        $stmt_del->bind_param("i",$id);
        $Resp = $stmt_del->execute();
        if (!$Resp) {
            throw new Exception("Problem in deleting! " . strtok($obj->con1->error, '('));
        }
        $stmt_del->close();
    } catch (\Exception $e) {
        setcookie("sql_error", urlencode($e->getMessage()), time() + 3600, "/");
    }

    if ($Resp) {
        setcookie("msg", "data_del", time() + 3600, "/");
    }
    header("location:offline_sales.php");
}
?>
<div class='p-6 animate__animated' x-data='pagination'>
    <h1 class="dark:text-white-dar  pb-8 text-3xl font-bold">Offline Sales</h1>
    <div class="panel mt-6 flex items-center  justify-between relative">

        <button type="button" class="p-2 btn btn-primary m-1 add-btn" onclick="javascript:add_data()">
            <i class="ri-add-line mr-1"></i> Add Sales</button>

        <table id="myTable" class="table-hover whitespace-nowrap w-full"></table>
    </div>

</div>
<script type="text/javascript">
checkCookies();
eraseCookie("edit_id");
eraseCookie("view_id");

function getActions(id) {
    return `<ul class="flex items-center gap-4">
            <li>
            <a href="javascript:viewdata(` + id + `);" class='text-xl' x-tooltip="View">
            <i class="ri-eye-line text-primary"></i>
            </a>
            </li>
            <li>
            <a href="javascript:editdata(` + id + `);" class='text-xl' x-tooltip="Edit">
            <i class="ri-pencil-line text text-success"></i>
            </a>
            </li>
            <li>
            <a href="javascript:showAlert(` + id + `);" class='text-xl' x-tooltip="Delete">
            <i class="ri-delete-bin-line text-danger"></i>
            </a>
            </li>
            </ul>`
}
document.addEventListener('alpine:init', () => {
    Alpine.data('pagination', () => ({
        datatable: null,
        init() {
            this.datatable = new simpleDatatables.DataTable('#myTable', {
                data: {
                    headings: ['Sr.No.', 'Costmer Name', 'Agent Name', 'Commission Amount',
                        'Product', 'Date', 'Detail', 'Product Service Provided',
                        'Money Charged', 'Cost to Company', 'Commission Paid', 'Action'
                    ],
                    data: [
                        <?php
                            $stmt = $obj->con1->prepare("SELECT * FROM `offline_sales` ");
                            $stmt->execute();
                            $Resp = $stmt->get_result();
                            $i = 1;
                            while ($row = mysqli_fetch_array($Resp)) {
                            ?>[
                            <?php echo $i; ?>,

                            '<?php echo addslashes($row["customer_name"]); ?>',
                            '<?php echo addslashes($row["agent_name"]); ?>',
                            '<?php echo addslashes($row["commission_amount"]); ?>',
                            '<?php echo addslashes($row["product"]); ?>',
                            '<?php echo addslashes($row["date"]); ?>',
                            '<?php echo addslashes($row["detail"]); ?>',
                            '<?php echo addslashes($row["product_service_provided"]); ?>',
                            '<?php echo addslashes($row["money_charged"]); ?>',
                            '<?php echo addslashes($row["cost_to_company"]); ?>',
                            `<span class="badge badge-outline-<?php echo $row["commission_paid"] == "yes" ? 'success' : 'danger'?>">
                                <?php echo ucfirst($row["commission_paid"]); ?>
                            </span>`,
                           
                            getActions(<?php echo $row["sr_no"]; ?>, )
                        ],
                        <?php $i++;
                            }
                            ?>
                    ],
                },
                perPage: 10,
                perPageSelect: [10, 20, 30, 50, 100],
                columns: [{
                    select: 0,
                    sort: 'asc',
                }, ],
                firstLast: true,
                firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                labels: {
                    perPage: '{select}',
                },
                layout: {
                    top: '{search}',
                    bottom: "<div class='flex items-center gap-4'>{info}{select}</div>{pager}",
                },
            });
        },

        // exportTable(eType) {
        //     var data = {
        //         type: eType,
        //         image: 'table',
        //         download: true,
        //     };

        //     if (data.type === 'csv') {
        //         data.lineDelimiter = '\n';
        //         data.columnDelimiter = ';';
        //     }
        //     this.datatable.export(data);
        // },

        printTable() {
            this.datatable.print();
        },

        formatDate(date) {
            if (date) {
                const dt = new Date(date);
                const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                    1;
                const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                return day + '/' + month + '/' + dt.getFullYear();
            }
            return '';
        },
    }));
})

function add_data() {
    eraseCookie("edit_id");
    eraseCookie("view_id");
    window.location = "add_offline_sales.php";
}

function editdata(id) {
    createCookie("edit_id", id, 1);
    window.location = "add_offline_sales.php";
}

function viewdata(id) {
    createCookie("view_id", id, 1);
    window.location = "add_offline_sales.php";
}

async function showAlert(id) {
    new window.Swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em',
    }).then((result) => {
        if (result.isConfirmed) {
            var loc = "offline_sales.php?flg=del&sr_no=" + id;
            window.location = loc;
        }
    });
}
</script>
<?php
include "footer.php";
?>