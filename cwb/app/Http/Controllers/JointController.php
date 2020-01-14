<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class JointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::select('customer.*','customer.id as cid','trk.*')->where('customer.account_type', 'joint')->join('track_reviews as trk','trk.customer_id','=','customer.id')->orderBy('customer.id','DESC')->paginate(10);
       // ->join('regions', 'regions.id', '=', 'branch.region_id')
        
        return view('accounts.joint.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $datas = Customer::join('account as ac','ac.id','=','customer.account_id')
        ->join('branch as br','br.id','=','customer.branch_id')
        ->join('address as add','add.id','=','customer.address_id')
        ->join('dao as d','d.id','=','customer.dao_id')
        ->join('broker as bk','bk.id','=','customer.broker_id')
        ->join('loan_lending as lo','lo.id','=','customer.loan_lending_id')
        ->join('metrics as ms','ms.id','=','customer.metrics_id')
        ->join('joint as jnt','jnt.id','=','customer.account_type_id')
        ->join('residence as res','res.id','=','jnt.residence_id')
        ->join('review as rw','rw.id','=','jnt.review_id')
        ->join('joint_review as jntr','jntr.id','=','jnt.joint_review_id')
        ->join('pefp_pep as pfp','pfp.id','=','jnt.pefp_pep_id')
        ->join('employer as emp','emp.id','=','jnt.employer_id')
        ->join('occupation as occ','occ.id','=','jnt.occupation_id')
        ->join('noc as nc','nc.id','=','jnt.noc_id')
        ->join('identification as idnt','idnt.id','=','jnt.identification_id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','ac.account_number','br.*','add.*','d.*','bk.*','lo.*','ms.*','jnt.*','ac.*','res.*','rw.*','jntr.*','pfp.*','emp.*','occ.*','nc.*','idnt.*')
        ->where('customer.account_type', 'joint')
        ->where('customer.id', $id)->first();

       //print_r($datas);
        if($datas['line_1_address_legal'] == $datas['cp_address'] )
            $addressline1check = "True";
        else 
            $addressline1check = "False";

        if($datas['customer_city_name_legal'] == $datas['cp_city'] )
            $customercitynamelegal = "True";
        else 
            $customercitynamelegal = "False";

        if($datas['postal_code_legal'] == $datas['cp_postal_code'] )
            $postalcodelegal = "True";
        else 
            $postalcodelegal = "False";

        if($datas['province_state_code_legal'] == $datas['cp_province'] )
            $provincestatecodelegal = "True";
        else 
            $provincestatecodelegal = "False";

        if($datas['total_account_count'] == $datas['total_loan_count'] )
            $totalaccountcount = "YES";
        else 
            $totalaccountcount = "NO";

    
        //exit;   
        return view('accounts.joint.edit',compact('datas','addressline1check','customercitynamelegal','postalcodelegal','provincestatecodelegal','totalaccountcount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //print_r($request->all());exit;
        
        switch ($request['action']) {
        case 'address':
           $np_track = 0;
            $npr_track = 0;
            if($request['address_def_comm'])
            {
                $np_track = \DB::table('residence')->where('id',$request['residence_id'])->update(
                    array(
                        'address_def_comm'=>$request['address_def_comm']
                    ));

            }
            if($request['address_review'])
            {
                $npr_track = \DB::table('review')->where('id',$request['review_id'])->update(array('address_review'=>$request['address_review']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('address_review_track'=>'1'));
            }
            break;

        case 'ids':
            $np_track = 0;
            $npr_track = 0;
            if($request['id_deficiency_comments'])
            {
                $npr_track = \DB::table('identification')->where('id',$request['identification_id'])->update(array('id_deficiency_comments'=>$request['id_deficiency_comments']));

            }

            if($npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('id_review_track'=>'1'));
            }
            break;

        case 'noc':
            $np_track = 0;
            $npr_track = 0;
            if($request['noc_def_comm'] )
            {
                $np_track = \DB::table('noc')->where('id',$request['noc_id'])->update(
                    array(
                        'noc_def_comm'=>$request['noc_def_comm']
                    ));

            }
            if($request['noc_r'])
            {
                $npr_track = \DB::table('joint_review')->where('id',$request['joint_review_id'])->update(array('noc_r'=>$request['noc_r']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('noc_review_track'=>'1'));
            }
            break;

        case 'occupation':
            $np_track = 0;
            $npr_track = 0;
            if($request['occupation_def_comm'] )
            {
                $np_track = \DB::table('occupation')->where('id',$request['occupation_id'])->update(
                    array(
                        'occupation_def_comm'=>$request['occupation_def_comm']
                    ));

            }
            if($request['occupation_review'])
            {
                $npr_track = \DB::table('joint_review')->where('id',$request['joint_review_id'])->update(array('occupation_review'=>$request['occupation_review']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('occupation_review_track'=>'1'));
            }
            break;
        case 'employer':
            $np_track = 0;
            $npr_track = 0;
            if($request['employer_def_comm'] )
            {
                $np_track = \DB::table('employer')->where('id',$request['employer_id'])->update(
                    array(
                        'employer_def_comm'=>$request['employer_def_comm']
                    ));

            }
            
            if($np_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('employer_review_track'=>'1'));
            }
            break;

        case 'pefp_pep':
            $np_track = 0;
            $npr_track = 0;
            if($request['pefp_pep_def_comm'] )
            {
                $np_track = \DB::table('pefp_pep')->where('id',$request['pefp_pep_id'])->update(
                    array(
                        'pefp_pep_def_comm'=>$request['pefp_pep_def_comm']
                    ));

            }
            if($request['pefp_review'] || $request['pep_review'] )
            {
                $npr_track = \DB::table('joint_review')->where('id',$request['joint_review_id'])->update(array('pefp_review'=>$request['pefp_review'],'pep_review'=>$request['pep_review']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('pefp_pep_review_track'=>'1'));
            }
            break;

        case 'dob':
           $np_track = 0;
            $npr_track = 0;
            if($request['dob_def_comm'] )
            {
                $np_track = \DB::table('joint')->where('id',$request['account_type_id'])->update(
                    array(
                        'dob_def_comm'=>$request['dob_def_comm']
                    ));

            }
            if($request['dob_review'])
            {
                $npr_track = \DB::table('joint_review')->where('id',$request['joint_review_id'])->update(array('dob_review'=>$request['dob_review']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('dob_review_track'=>'1'));
            }
            break;
        case 'role':
        $np_track = 0;
            $npr_track = 0;
            if($request['type_def_comm'] || $request['role_def_comm'] )
            {
                $np_track = \DB::table('joint')->where('id',$request['account_type_id'])->update(
                    array(
                        'type_def_comm'=>$request['type_def_comm'],
                        'role_def_comm'=>$request['role_def_comm']
                    ));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('role_review_track'=>'1'));
            }
            break;

            case 'cwb':
            
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('cwb_review_track'=>'1'));
            break;
        }
        //print_r("In Main Edit");
        //print_r($request->all());
        return redirect()->route('joint.index')
                        ->with('success_msg','review saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function editThisTableData($table,$columns,$values,$id){
       //print_r();
        $data = array_combine($columns, $values);
        $id = \DB::table($table)->where('id',$id)->update($data);
        return $id;
    }


    function csvToArray($filename = '', $delimiter = ',')
        {
            if (!file_exists($filename) || !is_readable($filename))
                return false;

            $header = null;
            $data = array();
            $i = 0;
            if (($handle = fopen($filename, 'r')) !== false)
            {
                
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
                {
                    $num = count($row);
                        if($i == 0){
                            $i++;
                            continue; 
                         }
                   /* if (!$header)
                        $header = $row;
                    else
                        $data[] = $row;
                        // $data[] = array_combine($header, $row);*/
                    for ($c=0; $c < $num; $c++) {
                    $data[$i][] = $row [$c];
                 }
                 $i++;
                }
                fclose($handle);
            }
           // print_r($data);
           // exit;
            return $data;
        }
    public function getJDeficiency()
    {
        
        //address review
        $rating1 = \DB::table('joint')
                 ->join('review as rv','rv.id','=','joint.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 1')
                 ->get();
        $rating2 = \DB::table('joint')
                 ->join('review as rv','rv.id','=','joint.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 2')
                 ->get();
        $rating3 = \DB::table('joint')
                 ->join('review as rv','rv.id','=','joint.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 3')
                 ->get();
        $address_review_rating1=0;
        $address_review_rating2=0;
        $address_review_rating3=0;
        if(count($rating1)>0)
            $address_review_rating1 = $rating1[0]->address_review_total;
        if(count($rating2)>0)
            $address_review_rating2 = $rating2[0]->address_review_total;
        if(count($rating3)>0)
            $address_review_rating3 = $rating3[0]->address_review_total;

        //ID review
        $id_rating1 = \DB::table('joint_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 1')
                 ->get();
        $id_rating2 = \DB::table('joint_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 2')
                 ->get();
        $id_rating3 = \DB::table('joint_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 3')
                 ->get();
        $id_review_rating1=0;
        $id_review_rating2=0;
        $id_review_rating3=0;
        if(count($id_rating1)>0)
            $id_review_rating1 = $id_rating1[0]->id_review_total;
        if(count($id_rating2)>0)
            $id_review_rating2 = $id_rating2[0]->id_review_total;
        if(count($id_rating3)>0)
            $id_review_rating3 = $id_rating3[0]->id_review_total;

        //noc review
        $noc_rating1 = \DB::table('joint_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 1')
                 ->get();
        $noc_rating2 = \DB::table('joint_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 2')
                 ->get();
        $noc_rating3 = \DB::table('joint_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 3')
                 ->get();
        $noc_review_rating1=0;
        $noc_review_rating2=0;
        $noc_review_rating3=0;
        if(count($noc_rating1)>0)
            $noc_review_rating1 = $noc_rating1[0]->noc_review_total;
        if(count($noc_rating2)>0)
            $noc_review_rating2 = $noc_rating2[0]->noc_review_total;
        if(count($noc_rating3)>0)
            $noc_review_rating3 = $noc_rating3[0]->noc_review_total;      
       // print_r($id_rating1);exit;

        //occupation review
        $occupation_rating1 = \DB::table('joint_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 1')
                 ->get();
        $occupation_rating2 = \DB::table('joint_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 2')
                 ->get();
        $occupation_rating3 = \DB::table('joint_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 3')
                 ->get();
        $occupation_review_rating1=0;
        $occupation_review_rating2=0;
        $occupation_review_rating3=0;
        if(count($occupation_rating1)>0)
            $occupation_review_rating1 = $occupation_rating1[0]->occupation_review_total;
        if(count($occupation_rating2)>0)
            $occupation_review_rating2 = $occupation_rating2[0]->occupation_review_total;
        if(count($occupation_rating3)>0)
            $occupation_review_rating3 = $occupation_rating3[0]->occupation_review_total;

        //pefp review
        $pefp_rating1 = \DB::table('joint_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 1')
                 ->get();
        $pefp_rating2 = \DB::table('joint_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 2')
                 ->get();
        $pefp_rating3 = \DB::table('joint_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 3')
                 ->get();
        $pefp_review_rating1=0;
        $pefp_review_rating2=0;
        $pefp_review_rating3=0;
        if(count($pefp_rating1)>0)
            $pefp_review_rating1 = $pefp_rating1[0]->pefp_review_total;
        if(count($pefp_rating2)>0)
            $pefp_review_rating2 = $pefp_rating2[0]->pefp_review_total;
        if(count($pefp_rating3)>0)
            $pefp_review_rating3 = $pefp_rating3[0]->pefp_review_total;

        //pep review
        $pep_rating1 = \DB::table('joint_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 1')
                 ->get();
        $pep_rating2 = \DB::table('joint_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 2')
                 ->get();
        $pep_rating3 = \DB::table('joint_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 3')
                 ->get();
        $pep_review_rating1=0;
        $pep_review_rating2=0;
        $pep_review_rating3=0;
        if(count($pep_rating1)>0)
            $pep_review_rating1 = $pep_rating1[0]->pep_review_total;
        if(count($pep_rating2)>0)
            $pep_review_rating2 = $pep_rating2[0]->pep_review_total;
        if(count($pep_rating3)>0)
            $pep_review_rating3 = $pep_rating3[0]->pep_review_total;

        //dob review
        $dob_rating1 = \DB::table('joint_review')
                 ->select('dob_review', \DB::raw('count(*) as dob_review_total'))
                 ->groupBy('dob_review')
                 ->havingRaw('dob_review = 1')
                 ->get();
        $dob_rating2 = \DB::table('joint_review')
                 ->select('dob_review', \DB::raw('count(*) as dob_review_total'))
                 ->groupBy('dob_review')
                 ->havingRaw('dob_review = 2')
                 ->get();
        $dob_rating3 = \DB::table('joint_review')
                 ->select('dob_review', \DB::raw('count(*) as dob_review_total'))
                 ->groupBy('dob_review')
                 ->havingRaw('dob_review = 3')
                 ->get();
        $dob_review_rating1=0;
        $dob_review_rating2=0;
        $dob_review_rating3=0;
        if(count($dob_rating1)>0)
            $dob_review_rating1 = $dob_rating1[0]->dob_review_total;
        if(count($dob_rating2)>0)
            $dob_review_rating2 = $dob_rating2[0]->dob_review_total;
        if(count($dob_rating3)>0)
            $dob_review_rating3 = $dob_rating3[0]->dob_review_total;

        //role review
        $role_rating1 = \DB::table('joint_review')
                 ->select('role_review', \DB::raw('count(*) as role_review_total'))
                 ->groupBy('role_review')
                 ->havingRaw('role_review = 1')
                 ->get();
        $role_rating2 = \DB::table('joint_review')
                 ->select('role_review', \DB::raw('count(*) as role_review_total'))
                 ->groupBy('role_review')
                 ->havingRaw('role_review = 2')
                 ->get();
        $role_rating3 = \DB::table('joint_review')
                 ->select('role_review', \DB::raw('count(*) as role_review_total'))
                 ->groupBy('role_review')
                 ->havingRaw('role_review = 3')
                 ->get();
        $role_review_rating1=0;
        $role_review_rating2=0;
        $role_review_rating3=0;
        if(count($role_rating1)>0)
            $role_review_rating1 = $role_rating1[0]->role_review_total;
        if(count($role_rating2)>0)
            $role_review_rating2 = $role_rating2[0]->role_review_total;
        if(count($role_rating3)>0)
            $role_review_rating3 = $role_rating3[0]->role_review_total;

        //incorrect_signing_authority review
        $incorrect_signing_authority_rating1 = \DB::table('joint_review')
                 ->select('incorrect_signing_authority', \DB::raw('count(*) as incorrect_signing_authority_review_total'))
                 ->groupBy('incorrect_signing_authority')
                 ->havingRaw('incorrect_signing_authority = 1')
                 ->get();
        $incorrect_signing_authority_rating2 = \DB::table('joint_review')
                 ->select('incorrect_signing_authority', \DB::raw('count(*) as incorrect_signing_authority_review_total'))
                 ->groupBy('incorrect_signing_authority')
                 ->havingRaw('incorrect_signing_authority = 2')
                 ->get();
        $incorrect_signing_authority_rating3 = \DB::table('joint_review')
                 ->select('incorrect_signing_authority', \DB::raw('count(*) as incorrect_signing_authority_review_total'))
                 ->groupBy('incorrect_signing_authority')
                 ->havingRaw('incorrect_signing_authority = 3')
                 ->get();
        $incorrect_signing_authority_review_rating1=0;
        $incorrect_signing_authority_review_rating2=0;
        $incorrect_signing_authority_review_rating3=0;
        if(count($incorrect_signing_authority_rating1)>0)
            $incorrect_signing_authority_review_rating1 = $incorrect_signing_authority_rating1[0]->incorrect_signing_authority_review_total;
        if(count($incorrect_signing_authority_rating2)>0)
            $incorrect_signing_authority_review_rating2 = $incorrect_signing_authority_rating2[0]->incorrect_signing_authority_review_total;
        if(count($incorrect_signing_authority_rating3)>0)
            $incorrect_signing_authority_review_rating3 = $incorrect_signing_authority_rating3[0]->incorrect_signing_authority_review_total;



        return view('accounts.joint.joint_deficiency',compact('address_review_rating1','address_review_rating2','address_review_rating3','id_review_rating1','id_review_rating2','id_review_rating3','noc_review_rating1','noc_review_rating2','noc_review_rating3','occupation_review_rating1','occupation_review_rating2','occupation_review_rating3','pefp_review_rating1','pefp_review_rating2','pefp_review_rating3','pep_review_rating1','pep_review_rating2','pep_review_rating3','dob_review_rating1','dob_review_rating2','dob_review_rating3','role_review_rating1','role_review_rating2','role_review_rating3','incorrect_signing_authority_review_rating1','incorrect_signing_authority_review_rating2','incorrect_signing_authority_review_rating3'));
    }
}
