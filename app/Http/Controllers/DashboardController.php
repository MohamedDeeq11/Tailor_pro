<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function company()
  {
    return view('company.company.company');
  }
  public function branch()
  {
    return view('company.Branch.Branch');
  }
  public function invocing()
  {
    return view('Billing.invocing.invocing');
  }
  public function payment_processing()
  {
    return view('Billing.Payment_Processing.payment_processing');
  }
  public function employee()
  {
    return view('HR.Employee.employee');
  }
  public function client_details()
  {
    return view('Client.Client_Details.client_details');
  }
  public function order_history()
  {
    return view('Client.Order_History.order_history');
  }
  public function product_details()
  {
    return view('Product.Product_Details.product_details');
  }
  public function  product_categories()
  {
    return view('Product.Product_Categories.product_categories');
  }
  public function orders_order_history()
  {
    return view('orders.Order_History.order_history');
  }
  public function order_tracking()
  {
    return view('orders.Order_Tracking.order_tracking');
  }
  public function expenses()
  {
    return view('Finance.Expenses.expenses');
  }
  public function revenue()
  {
    return view('Finance.Revenue.revenue');
  }
  public function profit()
  {
    return view('Finance.Profit.profit');
  }
}
