<?php

use Illuminate\Database\Seeder;
use SGH\Models\Diagnostico;

class DiagnosticosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lista=array(
            ['DIAG_CODIGO'=>'A00','DIAG_DESCRIPCION'=>'Cólera'],
            ['DIAG_CODIGO'=>'A000','DIAG_DESCRIPCION'=>'Cólera debido a Vibrio cholerae 01, biotipo cholerae'],
            ['DIAG_CODIGO'=>'A001','DIAG_DESCRIPCION'=>'Cólera debido a Vibrio cholerae 01, biotipo El Tor'],
            ['DIAG_CODIGO'=>'A009','DIAG_DESCRIPCION'=>'Cólera, no especificado'],
            ['DIAG_CODIGO'=>'A01','DIAG_DESCRIPCION'=>'Fiebres tifoidea y paratifoidea'],
            ['DIAG_CODIGO'=>'A010','DIAG_DESCRIPCION'=>'Fiebre tifoidea'],
            ['DIAG_CODIGO'=>'A011','DIAG_DESCRIPCION'=>'Fiebre paratifoidea A'],
            ['DIAG_CODIGO'=>'A012','DIAG_DESCRIPCION'=>'Fiebre paratifoidea B'],
            ['DIAG_CODIGO'=>'A013','DIAG_DESCRIPCION'=>'Fiebre paratifoidea C'],
            ['DIAG_CODIGO'=>'A014','DIAG_DESCRIPCION'=>'Fiebre paratifoidea, no especificada'],
            ['DIAG_CODIGO'=>'A02','DIAG_DESCRIPCION'=>'Otras infecciones debidas a Salmonella'],
            ['DIAG_CODIGO'=>'A020','DIAG_DESCRIPCION'=>'Enteritis debida a Salmonella'],
            ['DIAG_CODIGO'=>'A021','DIAG_DESCRIPCION'=>'Septicemia debida a Salmonella'],
            ['DIAG_CODIGO'=>'A022','DIAG_DESCRIPCION'=>'Infecciones localizadas debidas a Salmonella'],
            ['DIAG_CODIGO'=>'A028','DIAG_DESCRIPCION'=>'Otras infecciones especificadas como debidas a Salmonella'],
            ['DIAG_CODIGO'=>'A029','DIAG_DESCRIPCION'=>'Infección debida a Salmonella, no especificada'],
            ['DIAG_CODIGO'=>'A03','DIAG_DESCRIPCION'=>'Shigelosis'],
            ['DIAG_CODIGO'=>'A030','DIAG_DESCRIPCION'=>'Shigelosis debida a Shigella dysenteriae'],
            ['DIAG_CODIGO'=>'A031','DIAG_DESCRIPCION'=>'Shigelosis debida a Shigella flexneri'],
            ['DIAG_CODIGO'=>'A032','DIAG_DESCRIPCION'=>'Shigelosis debida a Shigella boydii'],
            ['DIAG_CODIGO'=>'A033','DIAG_DESCRIPCION'=>'Shigelosis debida a Shigella sonnei'],
            ['DIAG_CODIGO'=>'A038','DIAG_DESCRIPCION'=>'Otras shigelosis'],
            ['DIAG_CODIGO'=>'A039','DIAG_DESCRIPCION'=>'Shigelosis de tipo no especificado'],
            ['DIAG_CODIGO'=>'A04','DIAG_DESCRIPCION'=>'Otras infecciones intestinales bacterianas'],
            ['DIAG_CODIGO'=>'A040','DIAG_DESCRIPCION'=>'Infección debida a Escherichia coli enteropatógena'],
            ['DIAG_CODIGO'=>'A041','DIAG_DESCRIPCION'=>'Infección debida a Escherichia coli enterotoxígena'],
            ['DIAG_CODIGO'=>'A042','DIAG_DESCRIPCION'=>'Infección debida a Escherichia coli enteroinvasiva'],
            ['DIAG_CODIGO'=>'A043','DIAG_DESCRIPCION'=>'Infección debida a Escherichia coli enterohemorrágica'],
            ['DIAG_CODIGO'=>'A044','DIAG_DESCRIPCION'=>'Otras infecciones intestinales debidas a Escherichia coli'],
            ['DIAG_CODIGO'=>'A045','DIAG_DESCRIPCION'=>'Enteritis debida a Campylobacter'],
            ['DIAG_CODIGO'=>'A046','DIAG_DESCRIPCION'=>'Enteritis debida a Yersinia enterocolitica'],
            ['DIAG_CODIGO'=>'A047','DIAG_DESCRIPCION'=>'Enterocolitis debida a Clostridium difficile'],
            ['DIAG_CODIGO'=>'A048','DIAG_DESCRIPCION'=>'Otras infecciones intestinales bacterianas especificadas'],
            ['DIAG_CODIGO'=>'A049','DIAG_DESCRIPCION'=>'Infección intestinal bacteriana, no especificada'],
            ['DIAG_CODIGO'=>'A05','DIAG_DESCRIPCION'=>'Otras intoxicaciones alimentarias bacterianas'],
            ['DIAG_CODIGO'=>'A050','DIAG_DESCRIPCION'=>'Intoxicación alimentaria estafilocócica'],
            ['DIAG_CODIGO'=>'A051','DIAG_DESCRIPCION'=>'Botulismo'],
            ['DIAG_CODIGO'=>'A052','DIAG_DESCRIPCION'=>'Intoxicación alimentaria debida a Clostridium perfringens [Clostridium welchii]'],
            ['DIAG_CODIGO'=>'A053','DIAG_DESCRIPCION'=>'Intoxicación alimentaria debida a Vibrio parahaemolyticus'],
            ['DIAG_CODIGO'=>'A054','DIAG_DESCRIPCION'=>'Intoxicación alimentaria debida a Bacillus cereus'],
            ['DIAG_CODIGO'=>'A058','DIAG_DESCRIPCION'=>'Otras intoxicaciones alimentarias debidas a bacterias especificadas'],
            ['DIAG_CODIGO'=>'A059','DIAG_DESCRIPCION'=>'Intoxicación alimentaria bacteriana, no especificada'],
            ['DIAG_CODIGO'=>'A06','DIAG_DESCRIPCION'=>'Amebiasis'],
            ['DIAG_CODIGO'=>'A060','DIAG_DESCRIPCION'=>'Disentería amebiana aguda'],
            ['DIAG_CODIGO'=>'A061','DIAG_DESCRIPCION'=>'Amebiasis intestinal crónica'],
            ['DIAG_CODIGO'=>'A062','DIAG_DESCRIPCION'=>'Colitis amebiana no disentérica'],
            ['DIAG_CODIGO'=>'A063','DIAG_DESCRIPCION'=>'Ameboma intestinal'],
            ['DIAG_CODIGO'=>'A064','DIAG_DESCRIPCION'=>'Absceso amebiano del hígado'],
            ['DIAG_CODIGO'=>'A065','DIAG_DESCRIPCION'=>'Absceso amebiano del pulmón (J99.8*)'],
            ['DIAG_CODIGO'=>'A066','DIAG_DESCRIPCION'=>'Absceso amebiano del cerebro (G07*)'],
            ['DIAG_CODIGO'=>'A067','DIAG_DESCRIPCION'=>'Amebiasis cutánea'],
            ['DIAG_CODIGO'=>'A068','DIAG_DESCRIPCION'=>'Infección amebiana de otras localizaciones'],
            ['DIAG_CODIGO'=>'A069','DIAG_DESCRIPCION'=>'Amebiasis, no especificada'],
            ['DIAG_CODIGO'=>'A07','DIAG_DESCRIPCION'=>'Otras enfermedades intestinales debidas a protozoarios'],
            ['DIAG_CODIGO'=>'A070','DIAG_DESCRIPCION'=>'Balantidiasis'],
            ['DIAG_CODIGO'=>'A071','DIAG_DESCRIPCION'=>'Giardiasis [lambliasis]'],
            ['DIAG_CODIGO'=>'A072','DIAG_DESCRIPCION'=>'Criptosporidiosis'],
            ['DIAG_CODIGO'=>'A073','DIAG_DESCRIPCION'=>'Isosporiasis'],
            ['DIAG_CODIGO'=>'A078','DIAG_DESCRIPCION'=>'Otras enfermedades intestinales especificadas debidas a protozoarios'],
            ['DIAG_CODIGO'=>'A079','DIAG_DESCRIPCION'=>'Enfermedad intestinal debida a protozoarios, no especificada'],
            ['DIAG_CODIGO'=>'A08','DIAG_DESCRIPCION'=>'Infecciones intestinales debidas a virus y otros organismos especificados'],
            ['DIAG_CODIGO'=>'A080','DIAG_DESCRIPCION'=>'Enteritis debida a rotavirus'],
            ['DIAG_CODIGO'=>'A081','DIAG_DESCRIPCION'=>'Gastroenteropatía aguda debida al agente de Norwalk'],
            ['DIAG_CODIGO'=>'A082','DIAG_DESCRIPCION'=>'Enteritis debida a adenovirus'],
            ['DIAG_CODIGO'=>'A083','DIAG_DESCRIPCION'=>'Otras enteritis virales'],
            ['DIAG_CODIGO'=>'A084','DIAG_DESCRIPCION'=>'Infección intestinal viral, sin otra especificación'],
            ['DIAG_CODIGO'=>'A085','DIAG_DESCRIPCION'=>'Otras infecciones intestinales especificadas'],
                        );
            
        foreach ($lista as $CIE10) {
            Diagnostico::create($CIE10);
        };
        
    }
}
