<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Mockery\Exception;


class FController
{
    public function Search(Request $request)
    {

        if ($request->isMethod('post')) {
            $domain = $request->get('search-domain');
            $domain_split=explode('www.',$domain);
            if (count($domain_split)==1){
                $domain=$domain_split[0];
            }
            else{
                $domain=$domain_split[1];
            }

            if (@dns_get_record($domain, DNS_A)){
                $dns_report = dns_get_record($domain, DNS_A);
            }
            else{
                $output=" ";
                $ip="No IP Found";
                return view('show',compact(['output','ip']));
            }

            $ip = $dns_report[0]['ip'];
//          dd(dns_get_record($domain, DNS_NS));
//            $output = get_whois($ip);
//            echo $ip;
//            dd($output);
//            echo "<pre>$output</pre>";
            $server = "whois.crsnic.net";
            $port=43;

            if(($whoisinfo = fsockopen($server,$port)) == true)
            {
                $output = "";
                fputs($whoisinfo,"$domain\r\n");
                while(!feof($whoisinfo))
                    $output .= fgets($whoisinfo,128);
                fclose($whoisinfo);
//                $output->paginate(10);
                $output=explode('\r\n',$output);

                return view('show',compact(['output','ip']));
            }

        }

        }


}

