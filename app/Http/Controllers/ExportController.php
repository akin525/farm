<?php


namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;

class ExportController
{
    function usersGenerator() {
        foreach (User::cursor() as $user) {
            yield $user;
        }
    }

 function exportusers()
 {
     $users = User::all();

// Export all users
     $header_style = (new Style())->setFontBold();

     $rows_style = (new Style())
         ->setFontSize(11)
         ->setShouldWrapText()
         ->setBackgroundColor("EDEDED");

     return (new FastExcel($users))
         ->headerStyle($header_style)
         ->rowsStyle($rows_style)
         ->download('Users.xlsx');

//     (new FastExcel($this->usersGenerator()))->export('test.xlsx');

 }
 function exportpaymentstatetment($request)
 {
     foreach ($request as $row) {
         $id=$row['id'];
         $username=$row['username'];
         $amount=$row['amount'];
         $refid=$row['refid'];
         $date=$row['created_at'];
         $status=$row['status'];
         $list = collect([
             ['Id' => $id, 'Username' => $username,
                 'Amount'=>$amount, 'Refid'=>$refid, 'Status'=>$status,
                 'Date'=>$date
             ],
         ]);
     }
     $header_style = (new Style())->setFontBold();

     $rows_style = (new Style())
         ->setFontSize(11)
         ->setShouldWrapText()
         ->setBackgroundColor("EDEDED");

     return (new FastExcel($list))
         ->headerStyle($header_style)
         ->rowsStyle($rows_style)
         ->download('Payments.xlsx');
 }
    function exportalllpayment()
    {
        $pay = Payment::all();

// Export all users
        $header_style = (new Style())->setFontBold();

        $rows_style = (new Style())
            ->setFontSize(11)
            ->setShouldWrapText()
            ->setBackgroundColor("EDEDED");

        return (new FastExcel($pay))
            ->headerStyle($header_style)
            ->rowsStyle($rows_style)
            ->download('Payments.csv');

//     (new FastExcel($this->usersGenerator()))->export('test.xlsx');

    }
    function exportalllpurchase()
    {
        $pay = Purchase::all();

// Export all users
        $header_style = (new Style())->setFontBold();

        $rows_style = (new Style())
            ->setFontSize(11)
            ->setShouldWrapText()
            ->setBackgroundColor("EDEDED");

        return (new FastExcel($pay))
            ->headerStyle($header_style)
            ->rowsStyle($rows_style)
            ->download('Purchase.csv');

//     (new FastExcel($this->usersGenerator()))->export('test.xlsx');

    }
    function exportalllsales()
    {
        $pay = Sale::all();

// Export all users
        $header_style = (new Style())->setFontBold();

        $rows_style = (new Style())
            ->setFontSize(11)
            ->setShouldWrapText()
            ->setBackgroundColor("EDEDED");

        return (new FastExcel($pay))
            ->headerStyle($header_style)
            ->rowsStyle($rows_style)
            ->download('Sales.csv');

//     (new FastExcel($this->usersGenerator()))->export('test.xlsx');

    }

}
