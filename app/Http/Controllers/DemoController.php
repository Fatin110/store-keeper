<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function insertProduct(Request $request)
    {

        DB::table('products')->insert([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    function showTableForUpdate()
    {
        $allProducts = DB::table('products')->get();
        return view('update_product')->with('products', $allProducts);
    }

    function showTransactionHistory()
    {
        $allTransactions = DB::table('sales')->get();
        return view('transaction_history')->with('allTransactions', $allTransactions);
    }

    function deleteProduct($productId)
    {
        DB::table('products')->where('id', $productId)->delete();
        return redirect()->back()->with('delete', 'Product deleted successfully!');
    }

    function updateSpecificProduct($productId)
    {
        $specificProduct = DB::table('products')->where('id', $productId)->first();

        return view('update_specific_product')->with('specificProduct', $specificProduct);
    }

    function saveSpecificProduct(Request $request)
    {
        DB::table('products')
            ->where('id', $request->input('id'))
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
            ]);


        return redirect()->route('update_product')->with('updated', 'Product updated successfully!');;
    }

    function productSold($productId)
    {
        $soldProduct = DB::table('products')->where('id', $productId)->first();

        return view('product_sold')->with('soldProduct', $soldProduct);
    }

    function soldAmount(Request $request)
    {
        //update the quantity
        $currentAmount = DB::table('products')
            ->where('id', $request->input('id'))
            ->value('quantity');

        $soldAmount = $request->input('quantity');
        $newAmount = $currentAmount - $soldAmount;

        DB::table('products')
            ->where('id', $request->input('id'))
            ->update([
                'quantity' => $newAmount,
            ]);

        //storing the transaction
        $price = DB::table('products')
            ->where('id', $request->input('id'))
            ->value('price');

        $salesForThisProduct = $price * $request->input('quantity');

        DB::table('sales')->insert([
            'product_id' => $request->input('id'),
            'quantity' => $request->input('quantity'),
            'productSales' => $salesForThisProduct,
        ]);

        //calculating total sales
        $currentSales = DB::table('sales')->where('product_id', $request->input('id'))->sum('productSales');



        DB::table('products')
            ->where('id', $request->input('id'))
            ->update([
                'total_sales' => $currentSales,
            ]);


        return redirect()->route('update_product')->with('sold', 'Sold Product updated successfully!');
    }

    function totalSalesOnDashboard()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        $firstDayOfThisMonth = date('Y-m-01');

        $firstDayOfLastMonth = date('Y-m-01', strtotime('-1 month'));
        $lastDayOfLastMonth = date('Y-m-t', strtotime('-1 month'));

        $totalSalesToday = DB::table('sales')->whereDate('updated_at', $today)->sum('productSales');


        $totalSalesYesterday = DB::table('sales')->whereDate('updated_at', $yesterday)->sum('productSales');

        $totalSalesThisMonth = DB::table('sales')->whereBetween('updated_at', [$firstDayOfThisMonth, date('Y-m-d')])->sum('productSales');

        $totalSalesLastMonth = DB::table('sales')->whereBetween('updated_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->sum('productSales');



        // $totalSalesThisMonth = DB::table('sales')
        //     ->selectRaw('SUM(productSales) as total_sales_this_month')
        //     ->whereBetween('updated_at', [$firstDayOfThisMonth, date('Y-m-d')])
        //     ->first();

        // $totalSalesLastMonth = DB::table('sales')
        //     ->selectRaw('SUM(productSales) as total_sales_last_month')
        //     ->whereBetween('updated_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
        //     ->first();


            return view('dashboard', [
                'totalSalesToday' => $totalSalesToday,
                'totalSalesYesterday' => $totalSalesYesterday,
                'totalSalesThisMonth' => $totalSalesThisMonth,
                'totalSalesLastMonth' => $totalSalesLastMonth
            ]);
    }
}
