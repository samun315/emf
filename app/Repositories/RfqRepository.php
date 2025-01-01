<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Str;

class RfqRepository
{

    public function makeRfqDataFormat($data)
    {
        $rfqData['rfq_code']               = strtoupper(Str::random(5));
        $rfqData['route_code']             = $data['route_code'];
        $rfqData['pick_up_point']          = $data['pick_up_point'];
        $rfqData['drop_off_point']         = $data['drop_off_point'];
        $rfqData['base_price']             = $data['base_price'];
        $rfqData['mode_of_transport']      = $data['mode_of_transport'];
        $rfqData['product']                = $data['product'];
        $rfqData['capacity']               = $data['capacity'];
        $rfqData['uom']                    = $data['uom'];
        $rfqData['terms_condiotions']      = $data['terms_condiotions'];
        $rfqData['validity_start_date']    = $data['validity_start_date'];
        $rfqData['validity_end_date']      = $data['validity_end_date'];
        $rfqData['created_by']             = session('logged_session_data.id');
        $rfqData['updated_by']             = session('logged_session_data.id');
        $rfqData['created_at']             = Carbon::now();

        return $rfqData;
    }
}
