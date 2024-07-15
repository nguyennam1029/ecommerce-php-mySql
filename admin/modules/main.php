<div class="clear"></div>
<div class="main">
    <?php
    error_reporting(0);
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    // Kiểm tra và include các file tương ứng
    if ($tam == 'quanlidanhmucsanpham' && $query == 'them') {
        include("modules/quanlidanhmucsp/them.php");
        include("modules/quanlidanhmucsp/lietke.php");
    } elseif ($tam == 'quanlidanhmucsp' && $query == 'sua') {
        include("modules/quanlidanhmucsp/sua.php");
    } elseif ($tam == 'quanlisanpham' && $query == 'them') {
        include("modules/quanlisanpham/them.php");
        include("modules/quanlisanpham/lietke.php");
    } elseif ($tam == 'quanlisanpham' && $query == 'sua') {
        include('modules/quanlisanpham/sua.php');
    } elseif ($tam == 'quanlidonhang' && $query == 'lietke') {
        include('modules/quanlidonhang/lietke.php');
    } elseif ($tam == 'donhang' && $query == 'xemdonhang') {
        include('modules/quanlidonhang/xemdonhang.php');
    } elseif ($tam == 'quanlikhachhang' && $query == 'lietke') {
        include('modules/quanlikhachhang/them.php');
        include('modules/quanlikhachhang/lietke.php');
    } elseif ($tam == 'quanlikhachhang' && $query == 'sua') {
        include('modules/quanlikhachhang/sua.php');
    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>

<!-- Kiểm tra nếu có tham số success thì hiển thị toast -->
<?php if (isset($_GET['success'])) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showSuccessToast('<?php echo $_GET['success']; ?>');
        });
    </script>
<?php } ?>
<style>
    /* CSS cho toast notification */
    #toast-success {
        /* Thiết lập vị trí và animation */
        transform: translateX(100%);
        animation: slideIn 0.5s forwards;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(0);
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(100%);
        }
    }
</style>

<!-- Toast Notification HTML -->
<div id="toast-success" class="fixed top-16 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 hidden" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal" id="toast-message"></div>
    <button type="button" onclick="hideToast()" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

<script>
    function showSuccessToast(message) {
        document.getElementById('toast-message').textContent = message;
        document.getElementById('toast-success').classList.remove('hidden');
        setTimeout(function() {
            hideToast();
        }, 2000); // 2000 milliseconds = 2 seconds
    }

    function hideToast() {
        document.getElementById('toast-success').classList.add('animate__animated', 'animate__slideOutRight');
        setTimeout(function() {
            document.getElementById('toast-success').classList.add('hidden');
            document.getElementById('toast-success').classList.remove('animate__animated', 'animate__slideOutRight');
        }, 500); // Wait for animation to complete (0.5s)
    }
</script>