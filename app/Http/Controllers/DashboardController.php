<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::select("SELECT
            items.name,
            ROUND( STDDEV( orders.qty ), 3 ) AS s_order,
            ROUND( AVG( orders.qty ), 3 ) AS mean_order,
            ROUND( STDDEV( productions.qty ), 3 ) AS s_demand,
            ROUND( AVG( productions.qty ), 3 ) AS mean_demand,
            ROUND( ( STDDEV( orders.qty ) / AVG( orders.qty ) ), 3 ) AS cv_order,
            ROUND( ( STDDEV( productions.qty ) / AVG( productions.qty ) ), 3 ) AS cv_demand,
            ROUND( ( ( STDDEV( orders.qty ) / AVG( orders.qty ) ) / ( STDDEV( productions.qty ) / AVG( productions.qty ) ) ), 3 ) AS BE,
            productions.lead_time,
            ROUND(
                (
                    1 + (( 2 * productions.lead_time ) / 30 ) + ( ( 2 * productions.lead_time ^ 2 ) / ( 30 ^ 2 ) ) 
                ),
                3 
            ) AS parameter,
            ROUND(
                ( ( STDDEV( orders.qty ) / AVG( orders.qty ) ) / ( STDDEV( productions.qty ) / AVG( productions.qty ) ) ) > 1 + (( 2 * productions.lead_time ) / 30 ) + ( ( 2 * productions.lead_time ^ 2 ) / ( 30 ^ 2 ) ),
                3 
            ) AS Bullwhip_Effect 
        FROM
            items
            INNER JOIN orders ON orders.item_id = items.item_id
            INNER JOIN productions ON productions.order_id = orders.order_id 
        GROUP BY
            items.name,
            productions.lead_time");

        return view('manager.index')->with('data', $data);
    }

    public function chart(Request $request)
    {
        $data = DB::select("SELECT
            items.name,
            ROUND( STDDEV( orders.qty ), 3 ) AS s_order,
            ROUND( AVG( orders.qty ), 3 ) AS mean_order,
            ROUND( STDDEV( productions.qty ), 3 ) AS s_demand,
            ROUND( AVG( productions.qty ), 3 ) AS mean_demand,
            ROUND( ( STDDEV( orders.qty ) / AVG( orders.qty ) ), 3 ) AS cv_order,
            ROUND( ( STDDEV( productions.qty ) / AVG( productions.qty ) ), 3 ) AS cv_demand,
            ROUND( ( ( STDDEV( orders.qty ) / AVG( orders.qty ) ) / ( STDDEV( productions.qty ) / AVG( productions.qty ) ) ), 3 ) AS BE,
            productions.lead_time,
            ROUND(
                (
                    1 + (( 2 * productions.lead_time ) / 30 ) + ( ( 2 * productions.lead_time ^ 2 ) / ( 30 ^ 2 ) ) 
                ),
                3 
            ) AS parameter,
            ROUND(
                ( ( STDDEV( orders.qty ) / AVG( orders.qty ) ) / ( STDDEV( productions.qty ) / AVG( productions.qty ) ) ) > 1 + (( 2 * productions.lead_time ) / 30 ) + ( ( 2 * productions.lead_time ^ 2 ) / ( 30 ^ 2 ) ),
                3 
            ) AS Bullwhip_Effect 
        FROM
            items
            INNER JOIN orders ON orders.item_id = items.item_id
            INNER JOIN productions ON productions.order_id = orders.order_id 
        GROUP BY
            items.name,
            productions.lead_time");

        return view('manager.chart')->with('DaftarBE', $data);
    }
}
