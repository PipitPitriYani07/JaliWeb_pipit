<?php namespace App\Libraries;
class Indotime
{
    /*format type:
      1 = 10-10-2022
      2 = 10/10/2022
      3 = 10 Okt 2022
      4 = 10 Oktober 2022
    */
    public function convertDate($originalDate,$format=null)
    {
        if ($format!=null)
        {
            $indo_date  = date("d-m-Y", strtotime($originalDate));
            $split_date = explode('-',$indo_date);
            $tanggal    = $split_date[0];
            $bulan      = $split_date[1];
            $tahun      = $split_date[2];

            switch($format)
            {
                case 1:
                    return $tanggal.'-'.$bulan.'-'.$tahun;
                    break;
                case 2:
                    return $tanggal.'/'.$bulan.'/'.$tahun;
                    break;
                case 3:
                    return $tanggal.' '.$this->findMonth($originalDate,1).' '.$tahun;
                    break;
                case 4:
                    return $tanggal.' '.$this->findMonth($originalDate,2).' '.$tahun;
                    break;
            }
        }else 
        {
            $indo_date = date("d-m-Y", strtotime($originalDate));
        }
        
        return $indo_date;
    }
    /*
    format type:
    1 = Jan
    2 = Januari
    */
    public function findMonth($date,$format)
    {
        $getMonth = (int)date("m", strtotime($date));
        
        $bulanPendek = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des');
        $bulanPanjang = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

        if ($format == 1)
        {
            return $bulanPendek[$getMonth];
        }else 
        {
            return $bulanPanjang[$getMonth];
        }
    }
    /*
    Untuk mengubah jam, sesuai dengan kebutuhan
    format : 
    1. JJ:MM (24 Jam)
    */
    public function convertTime($oldTime, $format)
    {
        switch($format)
        {
            case 1:
                return date("h:i", strtotime($oldTime));
                break;
            default:
                return date("h:i", strtotime($oldTime));
                break;
        }
    }
    function convertDateTime($originalDate, $format = null)
    {
        if ($format != null) {
            $indo_date  = date("d-m-Y", strtotime($originalDate));
            $time       = date('H:i', strtotime($originalDate));
            $split_date = explode('-', $indo_date);
            $tanggal    = $split_date[0];
            $bulan      = $split_date[1];
            $tahun      = $split_date[2];

            switch ($format) {
                case 1:
                    return $tanggal . '-' . $bulan . '-' . $tahun . ' ' . $time;
                    break;
                case 2:
                    return $tanggal . '/' . $bulan . '/' . $tahun . ' ' . $time;
                    break;
                case 3:
                    return $tanggal . ' ' . $this->findMonth($originalDate, 1) . ' ' . $tahun . ' ' . $time;
                    break;
                case 4:
                    return $tanggal . ' ' . $this->findMonth($originalDate, 2) . ' ' . $tahun . ' ' . $time;
                    break;
            }
        } else {
            $indo_date = date("d-m-Y H:i", strtotime($originalDate));
        }

        return $indo_date;
    }
}
