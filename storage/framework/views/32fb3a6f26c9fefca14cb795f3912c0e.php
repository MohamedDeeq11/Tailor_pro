Sidebar start
***********************************-->

<style>
    /* Target the scrollbar of the dlabnav-scroll div */
    .dlabnav-scroll {
        overflow-y: scroll;
        height: 500px;
        scrollbar-color: grey; /* Set the color of the scrollbar (only works in Firefox) */
    }

    /* Target the scrollbar thumb and track for WebKit browsers (Chrome, Safari, etc.) */
    .dlabnav-scroll::-webkit-scrollbar {
        width: 3px;
    }

    .dlabnav-scroll::-webkit-scrollbar-thumb {
        background-color: grey;
        border-radius: 10px;
    }

    /* Target the scrollbar thumb and track for Firefox browsers */
    .dlabnav-scroll::-moz-scrollbar {
        width: 8px;
    }

    .dlabnav-scroll::-moz-scrollbar-thumb {
        background-color: white;
        border-radius: 10px;
    }
    
</style>

<div class="dlabnav" style="background-color: #cf9f17">
    <div class="dlabnav-scroll"  id="scroll-area"> 	
        <ul class="metismenu" id="menu">
            <hr>
            <span class="nav-text" style="margin-left:40px;color:white"><strong>Basics</strong></span>
           <br>
           <li>
            <a class="has-arrow <?php if(Request::is('dashboard') || Request::is('private')): ?> active <?php endif; ?>" href="javascript:void(0);">
                <i class="material-symbols-outlined">home</i>
                <span class="nav-text active">Dashboard</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(url('/private')); ?>">Private</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('student') || Request::is('student-detail')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text" style="margin-right: 1px"> My Account </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="student.html">My Profile</a></li>
                <li><a href="student-detail.html">Security</a></li>
                <li><a href="student-detail.html">Payment Method</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('companys') || Request::is('branchs') || Request::is('teacher-detail')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">apartment</i>
                <span class="nav-text">Manage Company</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/companys')); ?>">Manage Company</a></li>
                <li><a href="<?php echo e(url('/branchs')); ?>">Manage Branches</a></li>
                <li><a href="teacher-detail.html">Bank Account</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('invoicings') || Request::is('payment_processings')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">price_change</i>
                <span class="nav-text">Manage Billing</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/invoicings')); ?>">Invoicing</a></li>
                <li><a href="<?php echo e(url('/payment_processings')); ?>">Payment Processing</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('employees')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons">groups</i>	
                <span class="nav-text">Manage HR</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/employees')); ?>">Employee Details</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('clients') || Request::is('order_historys')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons">person</i>
                <span class="nav-text">Manage Client</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/clients')); ?>">Client Details</a></li>
                <li><a href="<?php echo e(url('/order_historys')); ?>">Order History</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('products') || Request::is('product_categories')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> inventory </i>
                <span class="nav-text">Manage Product</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/products')); ?>">Product details</a></li>
                <li><a href="<?php echo e(url('/product_categories')); ?>">product categories</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('order_details') || Request::is('order_trackings')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> list_alt </i>
                <span class="nav-text">Manage Orders</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/order_details')); ?>">Order Details</a></li>
                <li><a href="<?php echo e(url('/order_trackings')); ?>">Order Tracking</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('expenses') || Request::is('revenues') || Request::is('profits')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> payments</i>
                <span class="nav-text">Manage Finance</span>
            </a>
            <ul aria-expanded="false">
                <li><a  class="has-arrow" href="javascript:void(0);">Expenses</a></li>
                <li><a href="<?php echo e(url('/revenues')); ?>">Expense Category</a></li>
                <li><a href="<?php echo e(url('/revenues')); ?>">New Expense </a></li>
                <li><a href="<?php echo e(url('/revenues')); ?>">Revenue</a></li>
                <li><a href="<?php echo e(url('/profits')); ?>">Profit</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow <?php if(Request::is('widget-chart') || Request::is('widget-card') || Request::is('widget-list')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> report </i>
                <span class="nav-text">Manage Reports</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="<?php echo e(url('/order_history_report')); ?>">Order history</a></li>
                <li><a href="./widget-card.html">Sales</a></li>
                <li><a href="<?php echo e(url('/expenses_report')); ?>">Expenses</a></li>
                <li><a href="<?php echo e(url('/revenue_report')); ?>">Revenue</a></li>
                    <li><a href="<?php echo e(url('/profit_report')); ?>">Profit </a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow <?php if(Request::is('form-element')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons"> support_agent </i>
                    <span class="nav-text">Support Center</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./form-element.html">Support</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow <?php if(Request::is('form-element')): ?> active <?php endif; ?>" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons"> settings </i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(url('backup')); ?>">Backup</a></li>
                    <li><a href="./form-element.html">Notification</a></li>
                    <li><a href="./form-element.html">Appearance</a></li>
                </ul>
            </li>
        </ul>
                
          
           
   
    </div>
</div>





    <?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>