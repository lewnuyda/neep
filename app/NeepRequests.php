<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class NeepRequests extends Model
{
    //
    protected $connection = 'mysql1';
    

    public static function get_all_neep_requests()
    {

        //SELECT *,n.date_created as date_received FROM `tblneep_requests` n INNER JOIN dbskms_development.tblpersonal_profiles ON dbskms_development.tblpersonal_profiles.pp_usr_id = n.neep_req_usr_id LEFT JOIN dbskms_development.tblregions ON dbskms_development.tblregions.region_id = n.neep_req_inst_region LEFT JOIN dbskms_development.tblprovinces ON dbskms_development.tblprovinces.province_id = n.neep_req_inst_province LEFT JOIN dbskms_development.tblcities ON dbskms_development.tblcities.city_id = n.neep_req_inst_city ORDER BY date_received DES
       // $query = DB::table('database1.table1 as dt1')->leftjoin('database2.table2 as dt2', 'dt2.ID', '=', 'dt1.ID');

        $query=DB::table('tblneep_requests as t1')->join('dbskms_development.tblpersonal_profiles as t2', 't2.pp_usr_id', '=', 't1.neep_req_usr_id')->leftjoin('dbskms_development.tblregions as t3', 't3.region_id', '=', 't1.neep_req_inst_region')->leftjoin('dbskms_development.tblprovinces as t4', 't4.province_id', '=', 't1.neep_req_inst_province')->leftjoin('dbskms_development.tblcities as t5', 't5.city_id', '=', 't1.neep_req_inst_city');
        $output = $query->select(['t1.*','t1.date_created as date_received','t2.*','t3.*','t4.*','t5.*'])->get();
        return $output;
    }


    public static function get_usr_neep_request($id)
    {
        //'SELECT *,n.date_created as date_received FROM `tblneep_requests` n INNER JOIN dbskms_development.tblpersonal_profiles ON dbskms_development.tblpersonal_profiles.pp_usr_id = n.neep_req_usr_id LEFT JOIN dbskms_development.tblregions ON dbskms_development.tblregions.region_id = n.neep_req_inst_region LEFT JOIN dbskms_development.tblprovinces ON dbskms_development.tblprovinces.province_id = n.neep_req_inst_province LEFT JOIN dbskms_development.tblcities ON dbskms_development.tblcities.city_id = n.neep_req_inst_city WHERE n.neep_req_id='.$neep_req_id.''
        $query=DB::table('tblneep_requests as t1')->join('dbskms_development.tblpersonal_profiles as t2', 't2.pp_usr_id', '=', 't1.neep_req_usr_id')->leftjoin('dbskms_development.tblregions as t3', 't3.region_id', '=', 't1.neep_req_inst_region')->leftjoin('dbskms_development.tblprovinces as t4', 't4.province_id', '=', 't1.neep_req_inst_province')->leftjoin('dbskms_development.tblcities as t5', 't5.city_id', '=', 't1.neep_req_inst_city')->leftjoin('dbskms_development.tbltitles as t6', 't6.title_id', '=', 't2.pp_title')->leftjoin('dbskms_development.tblsex as t7', 't7.s_id', '=', 't2.pp_sex')->where('t1.neep_req_id', $id);
        $output = $query->select(['t1.*','t1.date_created as date_received','t2.*','t3.*','t4.*','t5.*','t6.*','t7.*'])->get();
        return $output;
    }

    public static function get_expert_list($spc)
    {
        //SELECT * FROM `tblmembership_profiles` WHERE FIND_IN_SET("'.$spc.'",mpr_specific_specialization) GROUP BY mpr_usr_id
        $query =DB::connection('mysql1')->table('tblmembership_profiles as t1')->join('tblpersonal_profiles as t2', 't2.pp_usr_id', '=', 't1.mpr_usr_id')->join('tbltitles as t3', 't3.title_id', '=', 't2.pp_title')->join('tblusers as t4', 't4.usr_id', '=', 't2.pp_usr_id')->whereRaw('FIND_IN_SET("'.$spc.'",t1.mpr_specific_specialization)')->where('t4.usr_grp_id', 3);
        $output = $query->select(['t1.*','t2.*','t3.*','t4.*'])->get();
        return $output;


    }

    public static function get_expert_profile($id)
    {
        //SELECT * FROM `tblmembership_profiles` WHERE FIND_IN_SET("'.$spc.'",mpr_specific_specialization) GROUP BY mpr_usr_id
        $query =DB::connection('mysql1')->table('tblpersonal_profiles as t1')->join('tbltitles as t2', 't2.title_id', '=', 't1.pp_title')->join('tblsex as t3', 't3.s_id', '=', 't1.pp_sex')->join('tblmembership_profiles as t4', 't4.mpr_usr_id', '=', 't1.pp_usr_id')->join('tbldivisions as t5', 't5.div_id', '=', 't4.mpr_div_id')->join('tbldivision_sections as t6', 't6.ds_id', '=', 't4.mpr_div_section_id')->where('t1.pp_usr_id', $id);
        $output = $query->select(['t1.*','t2.*','t3.*','t4.*','t5.*','t6.*'])->get();
        return $output;


    }
}
