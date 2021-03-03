<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Hospitalisation;
use App\Patient;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index()
    {
        //variable depuis la mise en place du système
        $nombrepatient=Patient::all()->count();
        $femme=Patient::where('sexe','2')->count();
        $homme=Patient::where('sexe','1')->count();
        $poucentagefemme=number_format($femme*100/$nombrepatient,2);
        $poucentagehomme=number_format(100-$poucentagefemme,2);

        $patienttotal=Patient::all();

        $inf5=0;
        $sup18=0;
        $compris518=0;
        $minage=1000;
        $maxage=0;
        $moyage=0;
        $variance=0;

        $nouveaupatient=0;
        $nouveauminage=1000;
        $nouveaumaxage=0;
        $nouveaumoyage=0;
        $nouveauinf5=0;
        $nouveausup18=0;
        $nouveaucompris518=0;
        $nouveaufemme=0;
        $nouveauhomme=0;
        $nouveauvariance=0;
        //fin variable de l'année en cour
        foreach ($patienttotal as $p )
        {
            $age=Carbon::parse($p->datenaissance)->age;

            //pour cette année
            $datecreate=date_parse($p->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y')) {
                $nouveaupatient++;
                if ($p->sexe=='1')
                {
                    $nouveauhomme++;
                }
                else
                {
                    $nouveaufemme++;
                }

                if($age <=5)
                {
                    $nouveauinf5++;
                }
                else
                {
                    if ($age >=18) {
                        $nouveausup18++;
                    }
                    else
                        $nouveaucompris518++;

                }

                if ($nouveaumaxage < $age) {
                    $nouveaumaxage=$age;
                }
                if ($nouveauminage > $age) {
                    $nouveauminage=$age;
                }
                $nouveaumoyage=$nouveaumoyage+$age;
            }

            //ensemble depuis la mise en place du système
            if($age <=5)
            {
                $inf5++;
            }
            else
            {
                if ($age >=18) {
                    $sup18++;
                }
                else
                    $compris518++;

            }

            if ($maxage < $age) {
                $maxage=$age;
            }
            if ($minage > $age) {
                $minage=$age;
            }
            $moyage=$moyage+$age;
            //fin depuis mise place système
        }

        $nombre518 = $compris518;

        //calcul de moyenne
        $moyage=number_format($moyage/$nombrepatient,2);
        $nouveaumoyage=number_format($nouveaumoyage/$nouveaupatient,2);
        //fin calcul de moyenne

        //calcul de pourcentage
        $pourcentageinf5=number_format($inf5*100/$nombrepatient,2);
        $pourcentagecompris518=number_format($compris518*100/$nombrepatient,2);
        $pourcentagesup18=number_format($sup18*100/$nombrepatient,2);
        $pourcentagenouveaufemme=number_format($nouveaufemme*100/$nouveaupatient,2);
        $pourcentagenouveauhomme=number_format($nouveauhomme*100/$nouveaupatient,2);
        $pourcentagenouveauinf5=number_format($nouveauinf5*100/$nouveaupatient,2);
        $pourcentagenouveausup18=number_format($nouveausup18*100/$nouveaupatient,2);
        $pourcentagenouveaucompris518=number_format($nouveaucompris518*100/$nouveaupatient,2);
        //fin calcul de pourcentage

        // debut calcul de variance
        foreach ($patienttotal as $p)
        {


            $age=Carbon::parse($p->datenaissance)->age;
            $datecreate=date_parse($p->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauvariance= $nouveauvariance+($age-$nouveaumoyage)*($age-$nouveaumoyage);
            }
            $variance= $variance+($age-$moyage)*($age-$moyage);
        }
        // fin calcul de variance

        // debut calcul ecart type
        $ecartype=number_format(sqrt($variance),2);
        $nouveauecartype=number_format(sqrt($nouveauvariance),2);
        //fin calcul ecart type


        // debut hospitalisation
        $nombrehospitalisation=Hospitalisation::all()->count();
        $nouveauhospitalisation=0;
        $totathospitalisation=Hospitalisation::all();
        foreach ($totathospitalisation as $hos) {
            $datecreate=date_parse($hos->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauhospitalisation++;
            }
        }
        //fin hospitalisation
        //debut de consultation
        $nouveauconsultation=0;
        $nombreconsultation=Consultation::all()->count();
        $totalconsultation=Consultation::all();
        foreach ($totalconsultation as $consultation ) {
            $datecreate=date_parse($consultation->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauconsultation++;
            }
        }
        //fin de la consultation
        $annee = date('Y');
        $year = array();
        $year[0]=date('Y');
        for ($i=1;$i<=4;$i++) {
            $year[$i] = date('Y') - $i;
        }

        $users = Patient::select(DB::raw("count(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $utili = json_encode($users);

        $donnee=[
            'nombrepatient'=>$nombrepatient,
            'femme'=>$femme,
            "homme"=>$homme,
            'poucentagefemme'=>$poucentagefemme,
            'poucentagehomme'=>$poucentagehomme,
            'sup18'=>$sup18,
            'inf5'=>$inf5,
            'compris518'=>$compris518,
            'pourcentageinf5'=>$pourcentageinf5,
            'pourcentagesup18'=>$pourcentagesup18,
            'pourcentagecompris518'=>$pourcentagecompris518,
            'maxage'=>$maxage,
            'minage'=>$minage,
            'moyage'=>$moyage,
            'nouveaupatient'=>$nouveaupatient,
            'nouveauminage'=>$nouveauminage,
            'nouveaumaxage'=>$nouveaumaxage,
            'nouveaumoyage'=>$nouveaumoyage,
            'nouveauinf5'=>$nouveauinf5,
            'nouveausup18'=>$nouveausup18,
            'nouveaucompris518'=>$nouveaucompris518,
            'nouveaufemme'=>$nouveaufemme,
            'nouveauhomme'=>$nouveauhomme,
            'pourcentagenouveauhomme'=>$pourcentagenouveauhomme,
            'pourcentagenouveaufemme'=>$pourcentagenouveaufemme,
            'pourcentagenouveauinf5'=>$pourcentagenouveauinf5,
            'pourcentagenouveausup18'=>$pourcentagenouveausup18,
            //'pourcentagecompris518'=>$pourcentagecompris518,
            'variance'=>$variance,
            'nouveauvariance'=>$nouveauvariance,
            'pourcentagenouveaucompris518'=>$pourcentagenouveaucompris518,
            'ecartype'=>$ecartype,
            'nouveauecartype'=>$nouveauecartype,
            'nombrehospitalisation'=>$nombrehospitalisation,
            'nouveauhospitalisation'=>$nouveauhospitalisation,
            'nouveauconsultation'=>$nouveauconsultation,
            'nombreconsultation'=>$nombreconsultation,
            'annee' => $annee,
            'nombre518' => $nombre518,
            'year' => $year,
            'user' => $utili,
        ];



        return view('medecin.statindex',$donnee);
    }

    public function create()
    {
        $nombrepatient=Patient::all()->count();
        $nombrehospitalisation=Hospitalisation::all()->count();
        $femme=Patient::where('sexe','2')->count();
        $homme=Patient::where('sexe','1')->count();
        $poucentagefemme=number_format($femme*100/$nombrepatient,2);
        $poucentagehomme=number_format(100-$poucentagefemme,2);

        $patienttotal=Patient::all();

        $inf5=0;
        $sup18=0;
        $compris518=0;
        $minage=1000;
        $maxage=0;
        $moyage=0;
        $variance=0;
        //fin variable depuis la mise  en place du système

        // variable de l'année en cour
        $nouveaupatient=0;
        $nouveauminage=1000;
        $nouveaumaxage=0;
        $nouveaumoyage=0;
        $nouveauinf5=0;
        $nouveausup18=0;
        $nouveaucompris518=0;
        $nouveaufemme=0;
        $nouveauhomme=0;
        $nouveauvariance=0;
        //fin variable de l'année en cour
        foreach ($patienttotal as $p )
        {
            $age=Carbon::parse($p->datenaissance)->age;

            //pour cette année
            $datecreate=date_parse($p->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y')) {
                $nouveaupatient++;
                if ($p->sexe=='1')
                {
                    $nouveauhomme++;
                }
                else
                {
                    $nouveaufemme++;
                }

                if($age <=5)
                {
                    $nouveauinf5++;
                }
                else
                {
                    if ($age >=18) {
                        $nouveausup18++;
                    }
                    else
                        $nouveaucompris518++;

                }

                if ($nouveaumaxage < $age) {
                    $nouveaumaxage=$age;
                }
                if ($nouveauminage > $age) {
                    $nouveauminage=$age;
                }
                $nouveaumoyage=$nouveaumoyage+$age;
            }

            //ensemble depuis la mise en place du système
            if($age <=5)
            {
                $inf5++;
            }
            else
            {
                if ($age >=18) {
                    $sup18++;
                }
                else
                    $compris518++;

            }

            if ($maxage < $age) {
                $maxage=$age;
            }
            if ($minage > $age) {
                $minage=$age;
            }
            $moyage=$moyage+$age;
            //fin depuis mise place système
        }

        //calcul de moyenne
        $moyage=number_format($moyage/$nombrepatient,2);
        $nouveaumoyage=number_format($nouveaumoyage/$nouveaupatient,2);
        //fin calcul de moyenne

        //calcul de pourcentage
        $pourcentageinf5=number_format($inf5*100/$nombrepatient,2);
        $pourcentagecompris518=number_format($compris518*100/$nombrepatient,2);
        $pourcentagesup18=number_format($sup18*100/$nombrepatient,2);
        $pourcentagenouveaufemme=number_format($nouveaufemme*100/$nouveaupatient,2);
        $pourcentagenouveauhomme=number_format($nouveauhomme*100/$nouveaupatient,2);
        $pourcentagenouveauinf5=number_format($nouveauinf5*100/$nouveaupatient,2);
        $pourcentagenouveausup18=number_format($nouveausup18*100/$nouveaupatient,2);
        $pourcentagenouveaucompris518=number_format($nouveaucompris518*100/$nouveaupatient,2);
        //fin calcul de pourcentage

        // debut calcul de variance
        foreach ($patienttotal as $p)
        {


            $age=Carbon::parse($p->datenaissance)->age;
            $datecreate=date_parse($p->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauvariance=$nouveauvariance+($age-$nouveaumoyage)*($age-$nouveaumoyage);
            }
            $variance=$variance+($age-$moyage)*($age-$moyage);
        }
        // fin calcul de variance

        // debut calcul ecart type

        $ecartype=number_format(sqrt($variance),2);
        $nouveauecartype=number_format(sqrt($nouveauvariance),2);
        //fin calcul ecart type

        // debut hospitalisation
        $nombrehospitalisation=Hospitalisation::all()->count();
        $nouveauhospitalisation=0;
        $totathospitalisation=Hospitalisation::all();
        foreach ($totathospitalisation as $hos) {
            $datecreate=date_parse($hos->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauhospitalisation++;
            }
        }
        //fin hospitalisation
        //debut de consultation
        $nouveauconsultation=0;
        $nombreconsultation=Consultation::all()->count();
        $totalconsultation=Consultation::all();
        foreach ($totalconsultation as $consultation ) {
            $datecreate=date_parse($consultation->created_at);
            $datecreate=$datecreate['year'];
            if ($datecreate == date('Y'))
            {
                $nouveauconsultation++;
            }
        }
        //fin de la consultation

        $donne=['nombrepatient'=>$nombrepatient,
            'femme'=>$femme,
            "homme"=>$homme,
            'poucentagefemme'=>$poucentagefemme,
            'poucentagehomme'=>$poucentagehomme,
            'sup18'=>$sup18,
            'inf5'=>$inf5,
            'compris518'=>$compris518,
            'pourcentageinf5'=>$pourcentageinf5,
            'pourcentagesup18'=>$pourcentagesup18,
            'pourcentagecompris518'=>$pourcentagecompris518,
            'maxage'=>$maxage,
            'minage'=>$minage,
            'moyage'=>$moyage,
            'nouveaupatient'=>$nouveaupatient,
            'nouveauminage'=>$nouveauminage,
            'nouveaumaxage'=>$nouveaumaxage,
            'nouveaumoyage'=>$nouveaumoyage,
            'nouveauinf5'=>$nouveauinf5,
            'nouveausup18'=>$nouveausup18,
            'nouveaucompris518'=>$nouveaucompris518,
            'nouveaufemme'=>$nouveaufemme,
            'nouveauhomme'=>$nouveauhomme,
            'pourcentagenouveauhomme'=>$pourcentagenouveauhomme,
            'pourcentagenouveaufemme'=>$pourcentagenouveaufemme,
            'pourcentagenouveauinf5'=>$pourcentagenouveauinf5,
            'pourcentagenouveausup18'=>$pourcentagenouveausup18,
            //'pourcentagecompris518'=>$pourcentagecompris518,
            'variance'=>$variance,
            'nouveauvariance'=>$nouveauvariance,
            'pourcentagenouveaucompris518'=>$pourcentagenouveaucompris518,
            'ecartype'=>$ecartype,
            'nouveauecartype'=>$nouveauecartype,
            'nombrehospitalisation'=>$nombrehospitalisation,
            'nouveauhospitalisation'=>$nouveauhospitalisation,
            'nouveauconsultation'=>$nouveauconsultation,
            'nombreconsultation'=>$nombreconsultation
        ];
        //return view('statistique.create',$donne);
        $pdf = PDF::loadView('medecin.createpdf',$donne);
        return $pdf->stream();
    }
}
